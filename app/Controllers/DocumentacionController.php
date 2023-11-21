<?php

namespace App\Controllers;

use App\Models\DenunciaModel;
use App\Models\DocumentoModel;
use App\Models\EntidadesModel;
use App\Models\UserModel;
use App\Models\TipoDocumentacionModel;
use App\Models\EstadoDocumentacionModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class DocumentacionController extends BaseController
{

    public function insertarDocumentacion()
    {
        $usuarioModel = new UserModel();
        $documentoModel = new DocumentoModel();
        $request = \Config\Services::request();
        $entidadModel = new EntidadesModel();
        $tipoDocumentacionModel = new TipoDocumentacionModel();
        $estadoDocumentacion = new EstadoDocumentacionModel();

        $idUsuario = $usuarioModel->recuperarIdPorEmail($_POST['usuario_seleccionado']);
        $idEntidad = $entidadModel->recuperarIdPorNombreEntidad($_POST['nombreEntidad']);
        $idTipoDocumentacion = $tipoDocumentacionModel->obtenerIdPorNombre($_POST['tipoDocumentacion']);
        $idEstadoDocumentacion = $estadoDocumentacion->obtenerIdPorEstado("Activo");

        $data = [
            'nombre' => $request->getPost('nombre'),
            'numero' => $request->getPost('numero'),
            'fecha_emision' => $request->getPost('fecha_emision'),
            'fecha_vencimiento' => $request->getPost('fecha_vencimiento'),
            'id_estado_documentacion' => $idEstadoDocumentacion,
            'id_usuario' => $idUsuario,
            'id_tipo_documentacion' => $idTipoDocumentacion,
            'id_entidad' => $idEntidad
        ];
        try {
            $documentoModel->insert($data);
        } catch (\Exception $e) {

            log_message('error', $e->getMessage());
            echo json_encode(["msg" => "Error al crear el registro"]);
        }

        return redirect()->to('/forms/formDocumentacion');
    }

    public function formularioDocumentacion()
    {
        $usuarios = new UserModel();
        $entidades = new EntidadesModel();
        $tipoDocumentos = new TipoDocumentacionModel();
        $data['data'] = [
            'usuarios' => $usuarios->findAll(),
            'entidades' => $entidades->findAll(),
            'tipoDocumentacion' => $tipoDocumentos->findAll()
        ];

        return view('/forms/formDocumentacion', $data);
    }

    public function listarDocumentacion($id = null): string
    {
        $documentacion = new DocumentoModel();
        $tipoDocumentacion = new TipoDocumentacionModel();
        $tipoEntidad = new EntidadesModel();
        $documentacion = $documentacion->obtenerDocumentacionPorUsuario($id);
        $i = 0;

        if ($documentacion != null) {
            foreach ($documentacion as $documento) {
                $data['data'][$i]['id'] = $documento['id'];
                $data['data'][$i]['numero'] = $documento['numero'];
                $data['data'][$i]['fecha_vencimiento'] = $documento['fecha_vencimiento'];
                $data['data'][$i]['id_usuario'] = $documento['id_usuario'];
                $data['data'][$i]['id_entidad'] = $documento['id_entidad'];
                $data['data'][$i]['id_tipo_documentacion'] = $documento['id_tipo_documentacion'];
                $data['data'][$i]['nombre'] = $documento['nombre'];
                $data['data'][$i]['fecha_emision'] = $documento['fecha_emision'];
                $data['data'][$i]['nombreEntidad'] = $tipoEntidad->recuperarNombreEntidadPorId($documento['id_entidad']);
                $data['data'][$i]['nombreTipoDocumentacion'] = $tipoDocumentacion->obtenerNombrePorId($documento['id_tipo_documentacion']);
                $i++;
            }

            return view('forms/listaDocumentacionDeUsuario', $data);
        } else {
            //retornar mensaje con "no hay documentacion para administrar
            //    return view('forms/listaDocumentacionDeUsuario', $data);
            //}
            return view('seccionDocumentacion/sinDocumentacion');
        }
    }

    public function modificarDocumentacion($id = null)
    {
        $documentoModel = new DocumentoModel();
        $entidadModel = new EntidadesModel();
        $tipoDocumentoModel = new TipoDocumentacionModel();
        if ($_POST) {

            $request = \Config\Services::request();

            $idEntidad = $entidadModel->recuperarIdPorNombreEntidad($_POST['nombreEntidad']);
            $idTipoDocumentacion = $tipoDocumentoModel->obtenerIdPorNombre($_POST['tipoDocumentacion']);

            $data = [
                "nombre" => $request->getPost('nombre'),
                "numero" => $request->getPost('numero'),
                "fecha_emision" => $request->getPost('fecha_emision'),
                "fecha_vencimiento" => $request->getPost('fecha_vencimiento'),
                "id_tipo_documentacion" => $idTipoDocumentacion,
                "id_entidad" => $idEntidad,


            ];
            try {
                // Insertar datos en la base de datos
                $documentoModel->update($request->getPost('id'), $data);
                echo json_encode(["msg" => "creado"]);
            } catch (\Exception $e) {
                // Manejar el error, por ejemplo, loguearlo y mostrar un mensaje al usuario
                log_message('error', $e->getMessage());
                echo json_encode(["msg" => "Error al crear el registro"]);
            }
            return redirect()->to('/forms/formDocumentacion');
        }
        $data['documentacion'] = $documentoModel->find($id);
        $data['data'] = [
            'documentacion' => $documentoModel->find($id),
            'entidades' => $entidadModel->findAll(),
            'tipoDocumentacion' => $tipoDocumentoModel->findAll()
        ];

        return view('forms/editarDocumentacion', $data);
    }

    public function eliminarDocumentacion(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj'    => 'Error en el back',
            'url'    =>  base_url('/login')
        ];
        var_dump($_POST);
        try {
            if (isset($_POST)) {
                $documentoModel = new DocumentoModel();
                $documentoModel->delete($_POST['id_eliminar']);

                $retorno['estado'] = 'ok';
                $retorno['msj'] = 'Se elimino la documentacion con exito!';
            }
            return $this->response->setJSON($retorno);
        } catch (Exception $e) {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
    public function miDocumentacion($id = null): String
    {
        $documentacionModel = new DocumentoModel();
        $tipoDocumentacion = new TipoDocumentacionModel();
        $tipoEntidad = new EntidadesModel();
        $documentacion = $documentacionModel->obtenerDocumentacionPorUsuario($id);
        $i = 0;

        if ($documentacion != null) {
            $data = ['data' => []];
            foreach ($documentacion as $documento) {
                if ($documentacionModel->obtenerEstadoDocumentoPorNombre("Activo") == $documento['id_estado_documentacion']) {
                    $data['data'][$i]['id'] = $documento['id'];
                    $data['data'][$i]['numero'] = $documento['numero'];
                    $data['data'][$i]['fecha_vencimiento'] = $documento['fecha_vencimiento'];
                    $data['data'][$i]['id_usuario'] = $documento['id_usuario'];
                    $data['data'][$i]['id_entidad'] = $documento['id_entidad'];
                    $data['data'][$i]['id_tipo_documentacion'] = $documento['id_tipo_documentacion'];
                    $data['data'][$i]['nombre'] = $documento['nombre'];
                    $data['data'][$i]['fecha_emision'] = $documento['fecha_emision'];
                    $data['data'][$i]['nombreEntidad'] = $tipoEntidad->recuperarNombreEntidadPorId($documento['id_entidad']);
                    $data['data'][$i]['nombreTipoDocumentacion'] = $tipoDocumentacion->obtenerNombrePorId($documento['id_tipo_documentacion']);
                    //Pasos de recuperacion
                    $data['data'][$i]['pasos_recuperacion'] = $tipoDocumentacion->obtenerPasosPorIdTipoDocumentacion($documento['id_tipo_documentacion']);
                    $i++;
                }
            }

            if (!empty($data['data'])) {
                return view('seccionDocumentacion/miDocumentacion', $data);
            } else {
                return view('seccionDocumentacion/sinDocumentacion');
            }
        } else {
            //retornar mensaje con "no hay documentacion para administrar
            //    return view('forms/listaDocumentacionDeUsuario', $data);
            //}
            return view('seccionDocumentacion/sinDocumentacion');
        }
    }

    public function cambiarEstadoDocumentacion()
    {
        if ($_POST) {
            $estadoDocumentacion = new EstadoDocumentacionModel();
            $denunciaModel = new DenunciaModel();
            $documentoModel = new DocumentoModel();
            $data = [
                'id_estado_documentacion' => $estadoDocumentacion->obtenerIdPorEstado($_POST['estado'])
            ];
            $documentoModel->update($_POST['id_documentacion'], $data);

            //Una vez que se cambia el estado de la documentacion, se verifica si se debe cambiar el estado de la denuncia

            $documentacion = $documentoModel->documentacionDeUnaDenuncia($_POST['id_denuncia']);

            foreach ($documentacion as $documento) {

                $estados = array_column($documentacion, 'estado');

                if (in_array('En recuperacion', $estados)) {
                    // Existe al menos un documento en estado "En recuperacion"
                    $estadoDenuncia = "En curso";
                } elseif (in_array('Denunciado', $estados) && in_array('Recuperado', $estados)) {
                    // Existen al menos un documento en estado "Denunciado" y uno en estado "Recuperado"
                    $estadoDenuncia = "En curso";
                } elseif ($documento['estado'] == 'Denunciado' && array_count_values($estados)['Denunciado'] === count($estados)) {
                    // Todos los documentos están en estado "Denunciado"
                    $estadoDenuncia = "Iniciada";
                } elseif ($documento['estado'] == 'Recuperado' && array_count_values($estados)['Recuperado'] === count($estados)) {
                    // Todos los documentos están en estado "Recuperado"
                    $estadoDenuncia = "Finalizado";
                }
                //Cambio el estado de la denuncia si corresponde
                $idNuevoEstadoDenuncia = $denunciaModel->obtenerIdEstadoDenunciaPorNombre($estadoDenuncia);
                $data2 = [
                    'id_estado_denuncia' => $idNuevoEstadoDenuncia
                ];
                $denunciaModel->update($_POST['id_denuncia'], $data2);
            }


            return redirect()->to('/seleccionarUsuarioDenuncia');
        }
    }
}

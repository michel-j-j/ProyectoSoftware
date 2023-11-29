<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\DenunciaModel;
use App\Models\DocumentoModel;
use App\Models\EstadoDocumentacionModel;
use App\Models\EstadoDenunciaModel;
use App\Models\TipoDocumentacionModel;
use App\Models\EntidadesModel;
use App\Models\DenunciaDocumentacionModel;
use CodeIgniter\HTTP\ResponseInterface;


class DenunciaController extends BaseController
{

    public function modificarEstadoDocumentoDenuncia()
    {
        $usuario = new UserModel();
        if ($_POST) {

            //Compruebo si el dni ya existe
            $dniACargar = $_POST['dni'];
            $dniDesdeBaseDeDatos = $usuario->select('dni')->getWhere(['dni' => $dniACargar])->getRow();

            if (!($dniDesdeBaseDeDatos == $dniACargar)) {
                $nombre_rol = $_POST["rol"];
                // Obtener el ID del rol a partir del nombre
                $rolModel = new RoleModel();
                $rol = $rolModel->select('id')->getWhere(['rol' => $nombre_rol])->getRow();
                $rol_id = $rol->id;

                $data = ([
                    "nombre" => $_POST['nombre'],
                    "apellido" => $_POST['apellido'],
                    "email" => $_POST['email'],
                    "contrasena" => $_POST['contrasena'],
                    "dni" => $_POST['dni'],
                    "fecha_nacimiento" => $_POST['fecha_nacimiento'],
                    "localidad" => $_POST['localidad'],
                    "direccion" => $_POST['direccion'],
                    "nacionalidad" => $_POST['nacionalidad'],
                    "rol" => $rol_id,
                ]);
                $usuario->insert($data);
            }
        }
        return view('forms/form_user');
    }

    public function seleccionarUsuarioDenuncia()
    {
        $usuarios = new UserModel();
        $data['usuarios'] = $usuarios->findAll();
        return view('seccionDenuncias/seleccionarUsuarioDenuncias', $data);
    }

    //A partir de un email/nombre de usuario, devuelve el historial de denuncias de un usuario.
    //Desde la vista, solo se podra modificar la documentacion de denuncias activas.
    public function administrarDenunciasActivas()
    {
        $usuarioModel = new UserModel();
        $idUsuario = $usuarioModel->recuperarIdPorEmail($_POST['email']);
        $denunciaModel = new DenunciaModel();
        $estadoDenunciaModel = new EstadoDenunciaModel();

        // Si tiene denuncias -->
        if (count($denunciaModel->obtenerDenunciasPorIdUsuario($idUsuario)->getResultArray()) > 0) {

            if ($_POST) {
                //Inicializo los modelos
                $documentoModel = new DocumentoModel();
                $estadoDocumentacionModel = new EstadoDocumentacionModel();
                $indice = 0;

                $activas = count($denunciaModel->obtenerDenunciasActivas($idUsuario));


                //Si tiene denuncias activas (Iniciada o En curso) -->
                if ($activas > 0) {

                    $denunciaDelUsuarioActivas = $denunciaModel->obtenerDenunciasActivas($idUsuario);
                    foreach ($denunciaDelUsuarioActivas as $row) {

                        // Si es "En curso" o "Iniciada" guardamos la denuncia
                        // 1 loop por denuncia

                        //Convertimos el estado numerico del "id_estado_denuncia" en su nombre real para mostrar en la view
                        if ($estadoDocumentacionModel->isEnCurso($row)) {
                            $estado = "En curso";
                        }
                        if ($estadoDocumentacionModel->isIniciada($row)) {
                            $estado = "Iniciada";
                        }
                        if ($denunciaModel->isFinalizado($row['id_estado_denuncia'])) {
                            $estado = "Finalizado";
                        }
                        if ($estadoDocumentacionModel->isCancelado($row)) {
                            $estado = "Cancelado";
                        }

                        $idDenuncia = $row['id'];

                        //Documentacion asociada a la denuncia del loop
                        $documentosAsociados = $documentoModel->documentacionDeUnaDenuncia($idDenuncia);
                        $indiceDocumentacion = 0;

                        //Seteamos el arreglo vacio, para evitar inconsistencias
                        $documentacion = array();

                        //Generamos un arreglo con los documentos denunciados o en curso
                        // --Inicio loop documentacion--
                        foreach ($documentosAsociados as $rowDocumento) {
                            if ($documentoModel->obtenerEstadoDocumento($rowDocumento['id_estado_documentacion']) == "Denunciado" || $documentoModel->obtenerEstadoDocumento($rowDocumento['id_estado_documentacion']) == "En recuperacion") {
                                $documentacion[$indiceDocumentacion] = [
                                    'id' => $rowDocumento['id'],
                                    'numero' => $rowDocumento['numero'],
                                    'fecha_vencimiento' => $rowDocumento['fecha_vencimiento'],
                                    'id_usuario' => $rowDocumento['id_usuario'],
                                    'id_entidad' => $rowDocumento['id_entidad'],
                                    'id_tipo_documentacion' => $rowDocumento['id_tipo_documentacion'],
                                    'nombre' => $rowDocumento['nombre'],
                                    'id_estado_documentacion' => $rowDocumento['id_estado_documentacion'],
                                    'estado' => $rowDocumento['estado']

                                ];
                            }
                            $indiceDocumentacion++;
                        }
                        // --Fin loop documentacion--

                        //Almacenamos la denuncia activa, ya sea "En curso" o "Iniciada"
                        if (isset($documentacion)) {
                            $denunciasActivas[$indice] =
                                [
                                    'id' => $row['id'],
                                    'id_usuario' => $row['id_usuario'],
                                    'estado' => $estado,
                                    'documentacion' => $documentacion
                                ];
                        }

                        $indice++;
                    }

                } else {
                    return view('seccionDenuncias/sinDenuncias');
                }

            }

            return view('seccionDenuncias/administrarDenuncias', ['denunciasActivas' => $denunciasActivas]);
        } else {
            return view('seccionDenuncias/sinDenuncias');
        }
    }

    //Devuelve los estados de la denuncia
    //Denuncia: id, id_usuario, estado(string)
    //Denuncia['documentacion'] devuelve: nombre, apellido, email, nombre_documentacion. numero, entidad (nombre de la entidad)
    /* public function listadoDenuncias()
    {
        $denunciaModel = new DenunciaModel();
        $denuncias = $denunciaModel->findAll();
        $indice = 0;
        $data = [''];
        foreach ($denuncias as $denuncia) {
            $datosDenuncia = $denunciaModel->datosDeLaDenuncia($denuncia['id']);
            $data['data'][$indice] = [
                'id' => $denuncia['id'],
                'id_usuario' => $denuncia['id_usuario'],
                'estado' => $denunciaModel->obtenerEstadoPorId($denuncia['id_estado_denuncia']),
                'documentacion' => $datosDenuncia
            ];
            $indice++;
        }
        return view('seccionDenuncias/listadoDenuncias', $data);
    }*/
    public function listadoDenuncias()
    {
        $denunciaModel = new DenunciaModel();
        $denuncias = $denunciaModel->findAll();
        $indice = 0;
        $data = [''];
        foreach ($denuncias as $denuncia) {
            $datosDenuncia = $denunciaModel->datosDeLaDenuncia($denuncia['id']);
            $data['data'][$indice] = [
                'id' => $denuncia['id'],
                'id_usuario' => $denuncia['id_usuario'],
                'estado' => $denunciaModel->obtenerEstadoPorId($denuncia['id_estado_denuncia']),
                'documentacion' => $datosDenuncia
            ];
            $indice++;
        }

        return view('seccionDenuncias/listadoDenuncias', $data);
    }

    public function documentacionAsociada($id = null): string
    {
        $documentacionModel = new DocumentoModel();
        $documentacion = new DocumentoModel();
        $tipoDocumentacion = new TipoDocumentacionModel();
        $tipoEntidad = new EntidadesModel();
        $documentacion = $documentacion->obtenerDocumentacionPorDenuncia($id);
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
                $data['data'][$i]['estadoDocumentacion'] = $documentacionModel->obtenerEstadoDocumento($documento['id_estado_documentacion']);

                $i++;
            }

            return view('seccionDenuncias/documentosDeDenuncia', $data);
        } else {
            //retornar mensaje con "no hay documentacion para administrar
            //    return view('forms/listaDocumentacionDeUsuario', $data);
            //}
            return view('seccionDocumentacion/sinDocumentacion');
        }
    }
    public function denunciarDocumentacion()
    {
        if ($_POST) {

            $documentacionModel = new DocumentoModel();
            $denunciaDocumentacionModel = new DenunciaDocumentacionModel();
            $estadoDocumentacionModel = new EstadoDocumentacionModel();
            $denunciaModel = new DenunciaModel();
            //Inserto nueva denuncia
            $idUsuario = $_SESSION['id'];
            $denuncia = [
                "id_usuario" => $idUsuario,
                "id_estado_denuncia" => $denunciaModel->obtenerIdEstadoDenunciaPorNombre("Iniciada"),
            ];
            //Las 'opciones' son los ID de los documentos
            $documentacionDenunciada = $_POST['opciones'];
            $denunciaModel->insert($denuncia);
            //Obtengo el ultimo ID de la denuncia para relacionar los documentos y actualizar sus estados
            $idDenuncia = $denunciaModel->insertID();
            foreach ($documentacionDenunciada as $idDocumento) {
                $documentoEstadoActualizado = [
                    "id_estado_documentacion" => $estadoDocumentacionModel->obtenerIdPorEstado("Denunciado")
                ];
                $documentacionModel->update($idDocumento, $documentoEstadoActualizado);
                $documentoDenuncia = [
                    "id_denuncia" => $idDenuncia,
                    "id_documentacion" => $idDocumento
                ];
                $denunciaDocumentacionModel->insert($documentoDenuncia);
            }
            return redirect()->to(base_url($_SESSION['index']));
        }
        return;
    }
    public function misDenuncias($id = null): string
    {
        $denunciaModel = new DenunciaModel();
        $denuncias = $denunciaModel->obtenerDenunciasPorIdUsuario($id)->getResultArray();
        $indice = 0;
        $data = [''];

        foreach ($denuncias as $denuncia) {
            $datosDenuncia = $denunciaModel->datosDeLaDenuncia($denuncia['id']);
            $data['data'][$indice] = [
                'id' => $denuncia['id'],
                'id_usuario' => $denuncia['id_usuario'],
                'estado' => $denunciaModel->obtenerEstadoPorId($denuncia['id_estado_denuncia']),
                'documentacion' => $datosDenuncia
            ];
            $indice++;
        }

        return view('seccionDenuncias/listadoDenuncias', $data);
    }

    /*  public function cancelarDenuncia(): ResponseInterface
    {
        $resultado = [
            'exito' => "ok",
            'msj' => 'error',
            'url' => base_url($_SESSION['index']),
        ];
        if ($_POST) {
            $denunciaModel = new DenunciaModel();
            $idCancelado = $denunciaModel->obtenerIdEstadoDenunciaPorNombre("Cancelado");
            $data = [
                'id_estado_denuncia' => $idCancelado
            ];
            if ($denunciaModel->update($_POST['cancelar_denuncia'], $data)) {
                $resultado = [
                    'exito' => "ok",
                    'msj' => 'error',
                    'url' => base_url($_SESSION['index']),
                ];
                return $resultado;
            }
        }
        return $resultado;
    }
 */
}

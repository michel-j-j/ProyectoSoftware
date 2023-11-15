<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;
use App\Models\DenunciaModel;
use App\Models\DocumentoModel;
use App\Models\EstadoDocumentacionModel;
use App\Models\EstadoDenunciaModel;

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
        if ($denunciasDelUsuario = count($denunciaModel->obtenerDenunciasPorIdUsuario($idUsuario)->getResultArray()) > 0) {


            if ($_POST) {
                //Inicializo los modelos

                $documentoModel = new DocumentoModel();
                $estadoDocumentacionModel = new EstadoDocumentacionModel();
                $indice = 0;

                $denunciasDelUsuario = $denunciaModel->obtenerDenunciasPorIdUsuario($idUsuario);
                $activas = count($denunciasDelUsuario->getResultArray());
               
                foreach ($denunciasDelUsuario->getResultArray() as $row) {
                    if ($estadoDenunciaModel->isCancelado([$row['id_estado_denuncia']]) || $estadoDenunciaModel->isFinalizado([$row['id_estado_denuncia']])) {
                        $activas--;
                    }
                }
                if ($activas > 0) {

                    foreach ($denunciasDelUsuario->getResultArray() as $row) {

                        // Si es "En curso" o "Iniciada" guardamos la denuncia
                        // 1 loop por denuncia
                        // if (($row['id_estado_denuncia'] = 1) || ($row['id_estado_denuncia'] = 2)) {

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
                        $denunciasActivas[$indice] =
                            [
                                'id' => $row['id'],
                                'id_usuario' => $row['id_usuario'],
                                'estado' => $estado,
                                'documentacion' => $documentacion
                            ];
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
    public function listadoDenuncias()
    {
        $denunciaModel = new DenunciaModel();
        $denuncias = $denunciaModel->findAll();
        $indice = 0;
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



}

<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\RoleModel;

class UserController extends BaseController
{

    public function formularioUsuario_admin()
    {
        $usuario = new UserModel();
        if ($_POST) {

            //Compruebo si el dni ya existe
            $dniACargar = $_POST['dni'];
            //   $dniDesdeBaseDeDatos = $usuario->select('dni')->getWhere(['dni' => $dniACargar])->getRow();
            //  if (!($dniDesdeBaseDeDatos == $dniACargar)) {

            if (!($usuario->existeDni($dniACargar))) {
                $nombre_rol = $_POST["rol"];
                // Obtener el ID del rol a partir del nombre
                $rolModel = new RoleModel();
                // $rol = $rolModel->select('id')->getWhere(['rol' => $nombre_rol])->getRow();
                $rol_id = $rolModel->obtenerIdPorNombre($nombre_rol);

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

        //hacer view
        return view('forms/form_user');
    }

    public function modificarUsuario($id = null): string
    {
        $usuario = new UserModel();
        $data['usuario'] = $usuario->find($id);

        if ($_POST) {
            $nombre_rol = $_POST["rol"];


            // Obtener el ID del rol a partir del nombre
            $rolModel = new RoleModel();
          //  $rol = $rolModel->select('id')->getWhere(['rol' => $nombre_rol])->getRow();
            $rol_id = $rolModel->obtenerIdPorNombre($nombre_rol);

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
                "id_rol" => $rol_id,
            ]);
            
            $usuario->update($_POST['id'], $data);
            $usuarios = new UserModel();
            $data['usuarios'] = $usuarios->findAll();
            //hacer view
            return view('tables/userTable', $data);
        }
        return view('forms/editarUsuario', $data);
    }

    public function userList()
    {
        $usuarios = new UserModel();
        $data['usuarios'] = $usuarios->findAll();
        return view('tables/userTable', $data);
    }

    public function eliminarUsuario()
    {
        if ($_POST) {
            $usuarios = new UserModel();
            $usuarios->delete($_POST['id_eliminar']);
        }
        $usuarios = new UserModel();
        $data['usuarios'] = $usuarios->findAll();
        return view('tables/userTable', $data);
    }
}

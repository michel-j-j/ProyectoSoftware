<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class LoginController extends BaseController
{
    public function login(): string
    {

        return view('pages/login');
    }

    public function registrar(): string
    {
        return view('pages/registrar');
    }

    public function logear(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj' => 'Email y/o contraseña erroneo.',
            'url' => base_url('/')
        ];
        try {
            $userModel = new UserModel();

            $email = $_POST['email'];
            $contra = $_POST['contra'];

            $user = $userModel->where('email', $email)->first();

            if ($user != null) {
                if ($user->contraseña == $contra) {

                    $data = ([
                        'id' => $user->id_usuario,
                        'nombre' => $user->nombre,
                        'apellido' => $user->apellido
                    ]);
                    $session = session();
                    $session->set($data);

                    $msj = "El usuario se logeo con exito!";
                    $estado = "ok";

                    $retorno['estado'] = $estado;
                    $retorno['msj'] = $msj;
                }
            }

            return $this->response->setJSON($retorno);
        } catch (Exception $e) {

            $retorno['msj'] = $e->getMessage();

            return $this->response->setJSON($retorno);
        }
    }

    public function registrarse(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj' => 'Error en el back',
            'url' => base_url('/login')
        ];

        try {
            $userModel = new UserModel();
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $email = $_POST['email'];
            $telefono = $_POST['telefono'];
            $dni = $_POST['dni'];
            $contra = $_POST['contra'];

            $datos = [

                'nombre' => $nombre,
                'apellido' => $apellido,
                'email' => $email,
                'dni' => $dni,
                'telefono' => $telefono,
                'contraseña' => $contra
            ];

            if ($userModel->where('email', $email)->first()) {
                throw new Exception('El usuario ya existe');
            }

            if (!$userModel->insert($datos)) {
                throw new Exception('Error al insertar usuario!');
            }

            $retorno['estado'] = 'ok';
            $retorno['msj'] = 'Usuario registrado con exito!';

            return $this->response->setJSON($retorno);
        } catch (Exception $e) {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
}

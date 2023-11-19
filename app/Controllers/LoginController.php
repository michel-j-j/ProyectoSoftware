<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Libraries\phpmailer_lib;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class LoginController extends BaseController
{
    public function login(): string
    {

        return view('pages/login');
    }

    public function recuperar(): String
    {

        return view('pages/recuperar');
    }
    public function registrar(): String
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
            $tipoRol = '';
            $email = $_POST['email'];
            $contra = $_POST['contra'];

            $user = $userModel->where('email', $email)->first();

            if ($user != null) {
                if ($user['contraseña'] == $contra) {

                    if ($user['id_rol'] == 1) {
                        $tipoRol = 'Administrador';
                        $index = 'dashboard/admin';
                    } else {
                        $tipoRol = 'Ciudadano';
                        $index = 'dashboard/user';
                    }

                    $retorno['url'] = base_url($index);

                    $data = ([
                        'id' => $user['id'],
                        'nombre' => $user['nombre'],
                        'apellido' => $user['apellido'],
                        'tipo_rol' => $tipoRol,
                        'rol' => $user['id_rol'],
                        'index' => $index
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
            $nombre =       $_POST['nombre'];
            $direccion =    $_POST['direccion'];
            $localidad =    $_POST['localidad'];
            $nacionalidad = $_POST['nacionalidad'];
            $sobre =        $_POST['sobre_mi'];
            $apellido =     $_POST['apellido'];
            $email =        $_POST['email'];
            $telefono =     $_POST['telefono'];
            $dni =          $_POST['dni'];
            $contra =       $_POST['contra'];
            $fecha =        $_POST['fecha_nacimiento'];

            $datos = [

                'nombre'          => $nombre,
                'apellido'        => $apellido,
                'direccion'       => $direccion,
                'localidad'       => $localidad,
                'nacionalidad'    => $nacionalidad,
                'sobre_mi'        => $sobre,
                'email'           => $email,
                'dni'             => $dni,
                'fecha_nacimiento' => $fecha,
                'telefono'        => $telefono,
                'contraseña'      => $contra
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

    public function recuperarse(): ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj'    => 'Error en el back',
            'url'    =>  base_url('/login')
        ];

        try {
            $mail = new Phpmailer_lib();
            var_dump($mail);
            $mail = $mail->load();

            var_dump($mail);
            $mail->addAddress($_POST['email']);

            $mail->Subject = 'Recuperacion de la contraseña.';
            $mail->Body = '<html>
        <h1>Contraseña</h1>
        </html>';

            $retorno['estado'] = 'ok';
            $retorno['msj'] = 'Email enviado con exito!';
            $retorno['url'] =  base_url('/login');

            return $this->response->setJSON($retorno);
        } catch (Exception $e) {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
}

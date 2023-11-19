<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\RedirectResponse;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class PerfilController extends BaseController
{

    function perfil(): String
    {
        $userModel = new UserModel();
        $user = $userModel->where('id', $_SESSION['id'])->first();
        $data = ['user' => $user];
        return (view('perfil/perfil', $data));
    }

    function configuracion(): String
    {

        return (view('perfil/configuracionPerfil'));
    }

    function modificarPerfil():ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj'    => 'Error en el back',
            'url'    =>  base_url('/')
        ];


        try{

        $user = new UserModel();
        
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $sobre = $_POST['sobre_mi'];
        $nacionalidad = $_POST['nacionalidad'];
        $localidad = $_POST['localidad'];
        $fechaNacimiento = $_POST['fecha_nacimiento'];
        $telefono = $_POST['telefono'];
        $email = $_POST['email'];
        $direccion = $_POST['direccion'];

        $data = [
            'nombre' => $nombre,
            'apellido' => $apellido,
            'sobre_mi' => $sobre,
            'nacionalidad' => $nacionalidad,
            'direccion' => $direccion,
            'localidad' => $localidad,
            'fecha_nacimiento' => $fechaNacimiento,
            'telefono' => $telefono,
            'email' => $email
        ];    

        $user->update($_SESSION['id'],$data);


        $retorno['estado'] = 'ok';
        $retorno['msj'] = $_SESSION['tipo_rol']. ' modificado con exito!';
        $retorno['url'] =  base_url('/perfil');

          return $this->response->setJSON($retorno);
        }
        catch(Exception $e)
        {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
    function cerrarSesion():RedirectResponse
    {
        $session = \Config\Services::session();
        $session->destroy();

        return redirect()->to(base_url('login')); 
    }
    function modificarContrasena():ResponseInterface
    {
        $retorno = [
            'estado' => 'error',
            'msj'    => 'Error en el back',
            'url'    =>  base_url('/')
        ];


        try{

        $userModel = new UserModel();
        
        $contraVieja = $_POST['contra_vieja'];
        $contraNueva = $_POST['contra_nueva'];

        $user = $userModel->where('id', $_SESSION['id'])->first();
        
        if($contraVieja != $user['contraseña'])
        {
            throw new Exception('Contraseña incorrecta');
        }


        $data = [
            'contraseña' => $contraNueva
        ];    

        $userModel->update($_SESSION['id'],$data);


        $retorno['estado'] = 'ok';
        $retorno['msj'] = $_SESSION['tipo_rol']. ' modificado su contraseña con exito!';
        $retorno['url'] =  base_url('/perfil');

          return $this->response->setJSON($retorno);
        }
        catch(Exception $e)
        {
            $retorno['msj'] = $e->getMessage();
            return $this->response->setJSON($retorno);
        }
    }
}

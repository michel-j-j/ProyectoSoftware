<?php

namespace App\Controllers;

use App\Models\EntidadesModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;

class EntidadController extends BaseController
{

    public function formularioEntidad()
    {

        helper(["url", "form"]);
        $validation = \Config\Services::validation();

        $validation->setRules(
            [
                "nombre" => "required",
                "direccion" => "required",
                "localidad" => "required",
                "email" => "required",
                "telefono" => "required",
            ],
            [
                "nombre" => [
                    "required" => "Debe ingresar un nombre valido"
                ],
                "direccion" => [
                    "required" => "Debe ingresar una direccion valida"
                ],
                "localidad" => [
                    "required" => "Debe ingresar una localidad valida"
                ],
                "email" => [
                    "required" => "Debe ingresar un email valido"
                ],
                "telefono" => [
                    "required" => "Debe ingresar un telefono valido"
                ]
            ]
        );

        $entidad = new EntidadesModel();

        if ($_POST) {

            if (!$validation->withRequest($this->request)->run()) {
                $errors = $validation->getErrors();
                $respuesta = [
                    'exito' => "ok",
                    'msj' => $errors,
                    'url' => base_url('/nuevaEntidad'),
                ];
                return  $this->response->setJSON($respuesta);
            } else {
                $data = ([

                    "nombre" => $_POST['nombre'],
                    "direccion" => $_POST['direccion'],
                    "localidad" => $_POST['localidad'],
                    "email" => $_POST['email'],
                    "telefono" => $_POST['telefono'],
                    "id_usuario" => $_POST['id_usuario'],
                ]);
                if ($entidad->insert($data)) {
                    $respuesta = [
                        'exito' => 'ok',
                        'msj' => 'Nueva Entidad Creada!',
                        'url' => base_url('/listaEntidades'),
                    ];
                    return  $this->response->setJSON($respuesta);
                }
                $respuesta = [
                    'exito' => 'noOk',
                    'msj' => 'No se pudo crear la entidad',
                    'url' => base_url('/listaEntidades'),
                ];
                return  $this->response->setJSON($respuesta);
            }
        }
        $usuarios = new UserModel();
        $data['representantes'] = $usuarios->findAll();
        return view('entities/form_entities', $data);
    }

    public function modificarEntidad($id = null)
    {

        $entidad = new EntidadesModel();
        $data['entidad'] = $entidad->find($id); //recupera los datos de la entidad a modificar
        //si no hay id o el usuario no existe en BD lo redirige al listado de usuarios.
        $usuarios = new UserModel();
        $data['representantes'] = $usuarios->findAll();


        if ($_POST) {
            $datos = ([
                "nombre" => $_POST['nombre'],
                "localidad" => $_POST['localidad'],
                "direccion" => $_POST['direccion'],
                "email" => $_POST['email'],
                "telefono" => $_POST['telefono'],
                "id_usuario" => $_POST['id_usuario'],
            ]);

            $entidad->update($_POST['id'], $datos);
            // Agrega un mensaje de éxito en una variable de sesión
            session()->setFlashdata('success', 'Entidad modificada exitosamente');
            sleep(2);

            return redirect()->to('/listaEntidades');
        }
        return view('entities/form_modificar_entidad', $data);
    }

    public function eliminarEntidad(): ResponseInterface
    {

        $entidad = new EntidadesModel();
        if ($entidad->delete($_POST['eliminar'])) {
            // session()->setFlashdata('eliminado', 'Entidad eliminada exitosamente');
            // echo var_dump(session('success'));
            // die;
            //sleep(2);
            $respuesta = [
                'exito' => 'ok',
                'msj' => 'Eliminado Exitoso',
                'url' => base_url('/listaEntidades'),
            ];
            return  $this->response->setJSON($respuesta);
        }
        $respuesta = [
            'exito' => 'noOk',
            'msj' => 'Error al eliminar',
            'url' => base_url('/listaEntidades'),
        ];

        return $this->response->setJSON($respuesta);
    }

    public function entidadesList()
    {
        $entidadModel = new EntidadesModel();
        $encargadoModel = new UserModel();

        $entidades = $entidadModel->findAll();

        $entidadesConEncargados = [];

        foreach ($entidades as $entidad) {
            $encargado = $encargadoModel->find($entidad['id_usuario']);
            $entidad['encargado'] = $encargado;
            $entidadesConEncargados[] = $entidad;
        }


        $data['entidades'] = $entidadesConEncargados;

        return view('entities/entitiesList', $data);
    }
}

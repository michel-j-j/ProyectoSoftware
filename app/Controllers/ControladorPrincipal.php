<?php

namespace App\Controllers;

use App\Models\DocumentoModel;
use CodeIgniter\HTTP\ResponseInterface;

class ControladorPrincipal extends BaseController
{
    /* public function index(): string
    {

            return view('forms/formDocumentacionUsuario');
    }*/

    public function dashboardUsuario()
    {
        return view('dashboard_User');
    }
    public function agregarDocumentos()
    {
        return view('forms/formDocumentacionUsuario');
    }

    public function agregarDoc(): ResponseInterface
    {

        $documento = new DocumentoModel();

        $data = [
            "nombre" => $_POST['nombre'],
            "numero" => $_POST['numero'],
            "fecha_emision" => $_POST['fecha_emision'],
            "fecha_vencimiento" => $_POST['fecha_vencimiento'],
        ];

        if ($documento->insert($data)) {
            $respuesta = [
                'exito' => 'ok',
                'msj' => 'Creacion Exitosa',
                'url' => base_url('/dashboard/user'),
            ];
            return  $this->response->setJSON($respuesta);
        }
        $respuesta = [
            'exito' => 'noOk',
            'msj' => 'Error al Agregar',
            'url' => base_url('/dashboard/user'),
        ];

        return $this->response->setJSON($respuesta);
    }
}

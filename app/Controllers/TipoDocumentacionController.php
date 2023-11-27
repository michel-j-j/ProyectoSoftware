<?php

namespace App\Controllers;

use App\Models\TipoDocumentacionModel;
use CodeIgniter\HTTP\ResponseInterface;

class TipoDocumentacionController extends BaseController
{

    public function administrarTipoDocumentacion()
    {
        $tipoDocumentacionModel = new TipoDocumentacionModel();

        if ($_POST) {
            $data = ([

                "nombre" => $_POST['tipoDocumentacion'],
                "pasos_recuperacion" => $_POST['pasos_recuperacion']
            ]);
            if ($tipoDocumentacionModel->insert($data)) {
                $respuesta = [
                    'estado' => 'ok',
                    'msj' => 'Nueva Entidad Creada!',
                    'url' => base_url('/listaEntidades'),
                ];
                return $this->response->setJSON($respuesta);
            }
            $respuesta = [
                'estado' => 'noOk',
                'msj' => 'No se pudo crear la entidad',
                'url' => base_url('/listaEntidades'),
            ];
            return $this->response->setJSON($respuesta);
        }


        $data['tipoDocumentaciones'] = $tipoDocumentacionModel->findAll();

        return view('tipoDocumentacion/administrarTipoDocumentacion', $data);
    }


    public function eliminarTipoDocumentacion(): ResponseInterface
    {

        $tipoDocumentacionModel = new TipoDocumentacionModel();
        if ($tipoDocumentacionModel->delete($_POST['eliminar'])) {
            $respuesta = [
                'estado' => 'ok',
                'msj' => 'Eliminado Exitoso',
                'url' => base_url('/listaEntidades'),
            ];
            return $this->response->setJSON($respuesta);
        }
        $respuesta = [
            'estado' => 'noOk',
            'msj' => 'Error al eliminar',
            'url' => base_url('/listaEntidades'),
        ];

        return $this->response->setJSON($respuesta);
    }

    public function listarTiposDeDocumentacion()
    {
        $tipoDocumentacionModel = new TipoDocumentacionModel();
        $data['tipoDocumentaciones'] = $tipoDocumentacionModel->findAll();
        return view('tipoDocumentacion/listarTiposDeDocumentacion', $data);

    }
    public function modificarTipoDocumento($id = null)
    {
        $tipoDocumentacionModel = new TipoDocumentacionModel();

        if ($_POST) {
            $data = ([
                "nombre" => $_POST['nombre'],
                "pasos_recuperacion" => $_POST['pasos_recuperacion'],
            ]);

            $tipoDocumentacionModel->update($_POST['id'], $data);
            return view('tipoDocumentacion/tipoDocumentoModificado');
        }
        $data['tipoDocumentacion'] = $tipoDocumentacionModel->find($id);
        return view('tipoDocumentacion/modificarTipoDocumentacion', $data);
    }

   
}
<?php

namespace App\Controllers;
use App\Models\UserModel;

class AdminController extends BaseController
{
    public function index(): String
    {
        $var = [
            'title' => 'Pagina Testing'
        ];

        return view('layouts/layout', $var);
    }

    public function ABMCusuarios(): void
    {   
        $userModel = new UserModel();
        $resultado = $userModel->findAll();

        var_dump($resultado);


      // return view('pages/paginaTesting');
    }
}
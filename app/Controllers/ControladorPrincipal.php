<?php

namespace App\Controllers;

class ControladorPrincipal extends BaseController
{
    public function index(): string
    {

        return view('bienvenida');
    }
}

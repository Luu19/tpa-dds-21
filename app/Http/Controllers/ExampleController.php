<?php

namespace App\Http\Controllers;

use App\Models\Repositories\ExampleRepository;
use App\Models\Repositories\RepositorioDeUsuario;
use App\Models\Repositories\RepositorioFechaDeCierreComunidad;
use App\Models\Repositories\RepositorioRol;
use Illuminate\Http\Request;

class ExampleController
{
    private $exampleRepo;
    private $rol;

    private $usuario;

    private $f;

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepo = $exampleRepository;
    }

    public function customWelcome(Request $request)
    {
        return "¡Funcionando ". $this->exampleRepo->index() ."!";
    }
}

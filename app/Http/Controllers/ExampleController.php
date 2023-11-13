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

    public function __construct(ExampleRepository $exampleRepository, RepositorioRol $rol, RepositorioDeUsuario $usuario, RepositorioFechaDeCierreComunidad $f)
    {
        $this->exampleRepo = $exampleRepository;
        $this->rol = $rol;
        $this->usuario = $usuario;
        $this->f = $f;
    }

    public function customWelcome(Request $request)
    {
        $c = $this->usuario->buscarComunidades(1);
        $a = $this->f->buscarIncidentesComunidades($c, 2);
        return dd($a[0]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Extras\TipoRol;
use App\Models\Repositories\RepositorioDeUsuario;
use App\Models\Repositories\RepositorioFechaDeCierreComunidad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\File\Exception\AccessDeniedException;

class IncidenteController extends Controller
{
    private $repositorioDeFechaDeCierreComunidad;

    private $repositorioDeUsuario;

    public function __construct(RepositorioFechaDeCierreComunidad $repositorioDeFechaDeCierreComunidad, RepositorioDeUsuario $repositorioDeUsuario) {
        $this->repositorioDeFechaDeCierreComunidad = $repositorioDeFechaDeCierreComunidad;
        $this->repositorioDeUsuario                = $repositorioDeUsuario;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarioLogueado   = $this->repositorioDeUsuario->findById($id);

        //Esto se lo podría delegar a un Middleware pero por ahora lo dejo así
        $rolesPermitidos = [TipoRol::ADMINISTRADOR, TipoRol::NORMAL];
        if($usuarioLogueado == null ||  !in_array($usuarioLogueado->getRol()->getTipo(), $rolesPermitidos)) {
        };

        $comunidades = $this->repositorioDeUsuario->buscarComunidades($id);
        //List<FechaDeCierreComunidad> incidentes = comunidades.stream().flatMap(comunidad -> repositorioDeFechaDeCierreComunidad.buscarLosDeComunidad(comunidad,10).stream()).collect(Collectors.toList());
        $incidentes = $this->repositorioDeFechaDeCierreComunidad->buscarIncidentesComunidades($comunidades, 10); //Tengo que por cada comunidad buscar los 10 ultimos fechacierrecomunidad
        return view('base', [ "incidentes" => $incidentes, "usuario" => $usuarioLogueado]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

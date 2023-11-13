@extends('templates.base_general')

@section('css')
@endsection

@section('usuario_perfil')
    Cuenta: {{ $usuario->getNombre() }}
@endsection

@section('contenido')
    <div class="container px-4 py-5">
        <h2 class="pb-2 border-bottom">Listado de Incidentes</h2>
        <div class="list-incident-box p-4">
            <ul class="list-group" id="incidentList">
                @foreach($incidentes as $incidente)
                    <li class="list-group-item">
                        <h5 class="mb-1">Incidente: {{ $incidente->getIncidente()->observaciones }}</h5>
                        <p class="mb-1">Establecimiento: {{ $incidente->getIncidente()->prestacion->establecimiento->nombre }}</p>
                        <p class="mb-1">Prestación de Servicio: {{ $incidente->getIncidente()->prestacion->descripcion }}</p>
                        <p class="mb-1">Comunidad: {{ $incidente->getComunidad()->getDescripcion() }}</p>
                        <p class="mb-1">Fecha de Apertura: {{ $incidente->getIncidente()->getFechaApertura() }}</p>
                        @if($incidente->resuelto)
                            <p class="mb-1">Fecha de Cierre: {{ $incidente->getFechaCierre() }}</p>
                            <button class="btn btn-success">Resuelto</button>
                        @else
                            <button class="btn btn-danger">No Resuelto</button>
                        @endif
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection


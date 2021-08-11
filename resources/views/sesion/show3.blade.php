@extends ('layout.secondary')
@section('header', 'Sesiones del Programa')

@section('boton_crear')
<a href="{{  route('participante.create') }}" class="about-btn-right"><i  class="glyphicon glyphicon-plus"></i> Nueva Sesión</a>
@endsection

@section('detalles_programas')
<div class="row">
        <div class="col-lg-6">
            <h2>Edición {{  $programa->anio_edicion }} - {{  $programa->nombre }}</h2>
            <p>{{  $programa->descripcion }}</p>
        </div>
        <div class="col-lg-3">
            <h3>Lugar:</h3>
            <p>Universidad Nacional de San Agustin, Arequipa</p>
        </div>
        <div class="col-lg-3">
            <h3>Duración</h3>
            <p>Inicio:<br>{{  $programa->fecha_inicio }}</p>
            <p>Fin:<br>{{  $programa->fecha_fin }}</p>
        </div>
</div>
@endsection

@section('sesiones')
@foreach($programa->sesiones as $sesion)
<div class="row schedule-item">
<div class="col-md-2">
    <h5><strong>Hora de Inicio:</strong> <time>{{ $sesion->hora_inicio }}</time><br>
    <strong>Hora de Finalización:</strong> <time>{{ $sesion->hora_final }}</time></h5>
</div>
<div class="col-md-10">
    <h4>Fecha: <span> <a>{{ $sesion->fecha }}</a></span></h4>
    <h4>Link: <span> <a href="#" target="_blank">{{ $sesion->enlace_meet }}</a></span></h5>
    <a href="{{ route('sesion.show',$sesion->id)}}" class="btn btn-outline-dark">Ver Eventos</a>
    <a href="#" class="btn btn-outline-info"><i  class="glyphicon glyphicon-pencil"></i> Editar Sesión</a>
    <a href="#" class="btn btn-outline-danger"><i  class="glyphicon glyphicon-remove"></i> Eliminar Sesión</a>
</div>
</div>
@endforeach
@endsection


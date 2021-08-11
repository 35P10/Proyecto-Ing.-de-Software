@extends ('layout.secondary')
@section('header', 'Sesiones del Programa')

@section('boton_crear')
@auth
@if(session('isAdmin'))
    <a href="{{  route('sesion.create') }}" class="about-btn-right"><i  class="glyphicon glyphicon-plus"></i> Nueva Sesión</a>
@endif
@endauth
@endsection

@section('detalles_programas')
<div class="row">
        <div class="col-lg-6">
            <h2>Edición {{  $data['programa']->anio_edicion }} - {{  $data['programa']->nombre }}</h2>
            <p>{{  $data['programa']->descripcion }}</p>
        </div>
        <div class="col-lg-3">
            <h3>Lugar:</h3>
            <p>Universidad Nacional de San Agustin, Arequipa</p>
        </div>
        <div class="col-lg-3">
            <h3>Duración</h3>
            <p>Inicio:<br>{{  $data['programa']->fecha_inicio }}</p>
            <p>Fin:<br>{{  $data['programa']->fecha_fin }}</p>
        </div>
</div>
@endsection

@section('sesiones')
@foreach($data['sesion'] as $sesion)
<div class="row schedule-item">
<div class="col-md-2">
    <h5><strong>Hora de Inicio:</strong> <time>{{ $sesion->hora_inicio }}</time><br>
    <strong>Hora de Finalización:</strong> <time>{{ $sesion->hora_final }}</time></h5>
</div>
<div class="col-md-10">
    <h4>Fecha: <span> <a>{{ $sesion->fecha }}</a></span></h4>
    <h4>Link: <span> <a href="#" target="_blank">{{ $sesion->enlace_meet }}</a></span></h5>
    <a href="{{ route('sesion.show',$sesion->id)}}" class="btn btn-outline-dark">Ver Eventos</a>
    @auth
    @if(session('isAdmin'))
        <a href="{{ route('sesion.edit',$sesion->id)}}" class="btn btn-outline-info"><i  class="glyphicon glyphicon-pencil"></i> Editar Sesión</a>
        <form action="{{ route('sesion.destroy', $sesion->id)}}"  method="POST">
            @csrf
            @method('DELETE')  
            <button type="submit" class="btn btn-outline-danger"><i  class="glyphicon glyphicon-remove"></i> Eliminar Sesión</button>
        </form>
    @endif
    @endauth
</div>
</div>
@endforeach
@endsection


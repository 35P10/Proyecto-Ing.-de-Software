@extends('layout.main')
@section('title', 'La Semana de la Computación')

<!-- Interfaz de Ponentes en Inicio -->
@section('ponentes')
@foreach ($ponentes as $ponente)
<div class="col-lg-4 col-md-6">
    <div class="speaker">
        <img src="../../../img/speakers/1.jpg" alt="Speaker 1" class="img-fluid">
            <div class="details">
                <h3><a href="speaker-details.html">{{ $ponente->nombre}}</a></h3>
                <p>{{ $ponente->grado_academico }}</p>
                <p><strong>Especialidad: </strong>{{ $ponente->especialidad }}</p>
                <div class="social">
                    <a href="{{ route('ponente.mostrar',$ponente->dni) }}" class="btn btn-outline-light">Ver más</a>
                </div>
            </div>
    </div>
</div>
@endforeach
@endsection

<!-- Interfaz de Ediciones_programas en Inicio -->
@section('ediciones_programas')
@foreach ( $data['edicion'] as $edicion)
<div class="row schedule-item">
    <div class="col-md-2">
        <br>
        <h5><strong>Inicio:</strong>        
        <date>{{ $edicion->fecha_inicio }}</date><br>
        <strong>Fin:</strong> <date>{{ $edicion->fecha_fin }}</date></h5>
    </div>
    <div class="col-md-10">
        <h4>Edición {{ $edicion->anio_edicion }} - <span> <a>{{ $edicion->nombre }}</a></span></h4>
        <h5>{{ $edicion->descripcion }}</h5>
        <a href="{{ route('programa.show',$edicion->id)}}" class="btn btn-outline-dark">Ver Sesiones</a>
        @auth
        @if(session('isAdmin'))
            <a href="{{ route('programa.edit',$edicion->id )}}" class="btn btn-outline-info"><i  class="glyphicon glyphicon-pencil"></i> Editar Programa</a>
            <form action="{{ route('programa.destroy',$data['programa']->id)}}"  method="POST">
                @csrf
                @method('DELETE')  
                <button type="submit" class="btn btn-outline-danger"><i  class="glyphicon glyphicon-remove"></i> Eliminar Programa</button> <br>
            </form>
        @endif
        @endauth
    </div>
</div>
@endforeach
@endsection
@extends ('layout.secondary')

@section('header', 'Eventos')

@section('boton_crear')
@auth
@if(session('isAdmin'))
    <a href="{{  route('evento.mostrarOpciones', request()->segment(count(request()->segments()))) }}" class="about-btn-right"><i  class="glyphicon glyphicon-plus"></i> Nuevo Evento</a>
@endif
@endauth
@endsection

@section('detalles_programas')
<div class="row">
        <div class="col-lg-6">
            <h2>Edición 2020 - Semana de la Computación</h2>
            <p>Descripción</p>
        </div>
        <div class="col-lg-3">
            <h3>Lugar:</h3>
            <p>Universidad Nacional de San Agustin , Arequipa</p>
        </div>
        <div class="col-lg-3">
            <h3>Duración</h3>
            <p>Inicio:<br>10-12 Diciembre</p>
            <p>Fin:<br>10-12 Diciembre</p>
        </div>
</div>
@endsection

@section('eventos')
@foreach($sesion->eventos as $evento)
<div class="row schedule-item">
    <div class="col-md-2">
        <h4>Tema del Evento</strong></h4>
    </div>
    <div class="col-md-10">
        <h4>{{ $evento->tema}}</h4>
        <h5>{{ $evento->descripcion }}</h5>

        @if ($evento->ponencia != null)
            @forelse ($evento->ponencia->ponentes as $ponente)
            <h5><strong>Ponente: </strong><time>{{ $ponente->nombre }}</time><br>
            @empty
            <h5><strong>Ponente: </strong><time>Ninguno</time><br>
            @endforelse
        @else
            <h5><strong>Moderador: </strong><time>{{ $evento->concurso->moderador }}</time><br>
        @endif

        <strong>Hora de Inicio:</strong><time>{{ $evento->sesionEvento->hora_inicio }}</time></h5>
        <a href="#" class="btn btn-outline-dark">Confirmar Participación</a>
        @auth
            @if(session('isAdmin'))
                @if ($evento->ponencia == null)
                    <a href="{{ route('concurso.editar', $evento) }}" class="btn btn-outline-info"><i  class="glyphicon glyphicon-pencil"></i> Editar Concurso</a><br>
                @else
                    <a href="{{ route('ponencia.editar', $evento) }}" class="btn btn-outline-info"><i  class="glyphicon glyphicon-pencil"></i> Editar Ponencia</a><br>
                @endif
               
                <form action="{{ route('sesion.quitar_evento')}}"  method="POST">
                        @csrf
                    <input type="hidden" name="id_sesion" value="{{$sesion->id}}">
                    <input type="hidden" name="id_evento" value="{{$evento->id}}">
                <br><button type="submit" class="btn btn-outline-danger"><i  class="glyphicon glyphicon-remove"></i>Quitar evento</button>

                    <!--<a href="#" class="btn btn-outline-danger" onclick="this.closest('form').submit()"><i  class="glyphicon glyphicon-pencil"></i> Eliminar Ponencia</a><br>-->
                </form>
            @endif
        @endauth
    </div>
</div>
@endforeach
@endsection


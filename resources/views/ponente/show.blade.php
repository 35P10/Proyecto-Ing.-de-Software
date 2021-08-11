@extends ('layout.secondary')

@section('header', 'Información del Ponente')


@section('info_ponentes')
<div class="row schedule-item">
    <div class="col-md-2">
        <h4>Ponente:</strong></h4>
    </div>
    <div class="col-md-10">
        <h4>{{ $ponente->nombre }}</h4>
        <h5><strong>Sobre el Ponente:</strong><br>{{ $ponente->descripcion}}</h5>
        <h5><strong>Grado Académico: </strong><time>{{ $ponente->grado_academico }}</time><br>
        <strong>Especialidad: </strong><time>{{ $ponente->especialidad }}</time><br>
        <strong>Correo: </strong><time>{{ $ponente->email }}</time><br>
        <strong>Teléfono: </strong><time>{{ $ponente->telefono }}</time><br></h5>
        @auth
            <a href="{{ route('ponente.editar', $ponente) }}" class="btn btn-outline-info">Editar Ponente</a><br><br>
            <form action="{{ route('ponente.eliminar', $ponente) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}
                <button type="submit" class="btn btn-outline-danger">Eliminar Ponente</button>
            </form>
        @endauth
    </div>
</div>
@endsection


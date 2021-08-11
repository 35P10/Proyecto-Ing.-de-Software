<a href="{{  route('home.index') }}">Volver a Inicio</a>

<div>
<h1>
    Edicion {{  $data['programa'] ->anio_edicion }}
</h1>

@auth
<a href="{{ route('programa.edit', $data['programa'] ->id )}}">Editar Edicion</a>
@endauth

<h2>{{  $data['programa'] ->nombre}}</h2>
<br>
descripcion:
{{  $data['programa'] ->descripcion }}
<br>
fecha_inicio:
{{  $data['programa'] ->fecha_inicio }}
<br>
fecha_fin: {{  $data['programa'] ->fecha_fin }}


<h3>Sesiones</h3>

@foreach($data['sesion'] as $sesion)
    <button>
        {{$sesion->fecha}}
        {{$sesion->hora}}
        {{$sesion->enlace_meet}}
    </button>

    @php
    $temp = $data['columns']
    @endphp
    @foreach($temp[$sesion->id] as $eventos)
        <p>{{$eventos->tema}}</p>
    @endforeach

    
@endforeach
</div>


<h1>
    Editar programa
</h1>

<a href="{{  route('home.index') }}">Volver a Inicio</a>

@if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
@endif

<div>
    <div>
        <form action="{{ route('programa.update',$data['programa']->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <p>Edicion: <input name="anio_edicion" value=" {{  $data['programa'] ->anio_edicion }}"></p>
            <p>Nombre de edicion: <input name="nombre" value=" {{ $data['programa'] ->nombre}}"></p>
            <p>Descripcion: </p>
            <textarea name="descripcion">{{$data['programa']->descripcion}}
            </textarea>
            <br>
            <p>fecha de inicio:
            <input type="date" name="fecha_inicio" value="{{ $data['programa'] ->fecha_inicio }}">
            </p>
            <p>fecha_fin::
            <input type="date" name="fecha_fin" value="{{$data['programa'] ->fecha_fin }}">
            </p> 

            <button type="submit">Guardar</button>
        </form>
    </div>
    
    <form action="{{ route('programa.destroy',$data['programa']->id)}}"  method="POST">
        @csrf
        @method('DELETE')  
        <button type="submit">Eliminar</button>
    </form>
<h3>Sesiones</h3>    
<h3>Sesiones</h3>

@foreach($data['sesion'] as $sesion)

    <button>
        {{$sesion->fecha}}
        {{$sesion->hora}}
        {{$sesion->enlace_meet}}
    </button>

    <form action="{{ route('sesion.destroy', $sesion->id)}}"  method="POST">
        <a href="{{ route('sesion.edit',$sesion->id)}}">Editar</a>
            @csrf
            @method('DELETE')  
            <button type="submit">Eliminar</button>
    </form>

    <!-- ignorar -->
    @php
    $temp = $data['columns']
    @endphp
    <!-- ignorar -->
    
    @foreach($temp[$sesion->id] as $eventos)
        <p>{{$eventos->tema}}</p>
    @endforeach

@endforeach
</div>


<button> + Anhadir Sesion </button>
<form action="{{ route('sesion.store') }}" method="POST">
@csrf
    <input type='hidden' name='id_programa' value='{{ $data['programa']->id}}'>
    <br>
    <label for='fecha'>fecha</label>
    <input name='fecha' type='date'>
    <br>
    <label for='hora_inicio'>hora inicio</label>
    <input name='hora_inicio' type='time'>
    <br>
    <label for='hora_final'>hora final</label>
    <input name='hora_final' type='time'>
    <br>
    <label for='enlace_meet'>enlace de reunion</label>
    <input name='enlace_meet'>
    <br>
    <button type='submit'>Crear</button>
    
</form>

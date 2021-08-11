<header>
<h1>
    Crear sesion
</h1>
</header>
<main>
    <form action="{{ route('sesion.store') }}" method="POST">
    @csrf
        seleccionar programa: <br>
        <select name="id_programa">
            @foreach ( $programas as $programa)          
            <option value="{{$programa->id}}" >
                {{ $programa->anio_edicion }} {{ $programa->nombre }}
            </option>
            <br>
            @endforeach
        </select>
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
</main>




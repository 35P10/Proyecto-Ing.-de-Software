<header>
<h1>
    Editar Sesion
</h1>

<a href="{{ route('programa.show', $data['anio_edicion'] ) }}">Volver</a>

</header>
<main>

@if ($message = Session::get('success'))
        <div>
            <p>{{ $message }}</p>
        </div>
@endif

    <div>
        <form action="{{ route('sesion.update',$data['sesion']->id) }}"  method="POST">
            @csrf
            @method('PUT')
            <p>Dia:</p>
            <input type="date" name="fecha" value="{{$data['sesion']->fecha}}">
            <p>Hora:</p>
            <p>Inicio: <input type="time" name="hora_inicio" value="{{$data['sesion']->hora_inicio}}"></p>
            <p>Final: <input type="time" name="hora_final" value="{{$data['sesion']->hora_final}}"></p>
            <p>Enlace de reunion:<input name="enlace_meet" value="{{$data['sesion']->enlace_meet}}"></p>

            <button type="submit">Guardar</button>
        </form>

        <form action="{{ route('sesion.destroy', $data['sesion']->id )}}"  method="POST">
            @csrf
            @method('DELETE')  
            <button type="submit">Eliminar</button>
        </form>
    </div>
    <div>
        <h3>
            eventos
        </h3>
        <table >
            @foreach($data['evento'] as $evento)
                <tr>
                    <td><p>{{$evento->hora_inicio}}</p></td>
                    <td><p>{{$evento->tema}}</p></td>

                    <td>
                        <button>Cambiar hora</button> <!-- al presionar el boton te aparece el form de abajo -->
                        <form action="{{ route('sesion.cambiar_hora_evento')}}" method="POST">
                            @csrf
                            <input type="hidden" name="id_sesion" value="{{$data['sesion']->id}}">
                            <input type="hidden" name="id_evento" value="{{$evento->id}}">
                            <input type="time" name="hora_inicio" value="{{$evento->hora_inicio}}">
                            <button type="submit">Cambiar</button>
                        </form>
                    </td>
                    <td>
                        <form action="{{ route('sesion.quitar_evento')}}"  method="POST">
                            @csrf
                            <input type="hidden" name="id_sesion" value="{{$data['sesion']->id}}">
                            <input type="hidden" name="id_evento" value="{{$evento->id}}">
                            <button type="submit">Quitar evento</button>
                        </form>
                    </td>
                </tr>  
            @endforeach
        </table>
    </div>


    <button> + </button>
    <div>
    <button> + Anhadir evento </button>
    <form>
        <label>Seleccionar evento:</label>
        <select name='id_evento'>
           @foreach($data['all_eventos'] as $all_evento)
           <option value="{{$all_evento->id}} "> {{$all_evento->tema}} </option>
           @endforeach
        </select>
        <br>
        <label for='hora_inicio'>hora inicio</label>
        <input name='hora_inicio' type='time'>
    </form>
    <button> + Crear evento </button>
    <form action="#" method="POST">

        <label for='fecha'>fecha</label>
        <input name='fecha' type='date'>
        <br>
        <label for='hora_inicio'>hora inicio</label>
        <input name='hora_inicio' type='time'>
        <br>
        <label>Descripcion</label><br>
        <textarea placeholder="descripcion"></textarea>
        <br>
        <label for='enlace_meet'>enlace de reunion</label>
        <input name='enlace_meet'>
        <br>
        <button type='submit'>Crear</button>
        
    </form>
    </div>

</main>

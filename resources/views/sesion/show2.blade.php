<h1>
    sesion
</h1>
<header>
    <a href="{{ route('programa.show',$data['sesion']->id_programa) }}">Volver</a>
</header>
<p>Dia: {{$data['sesion']->fecha}}</p>
<p>Hora: {{$data['sesion']->hora_inicio}} - {{$data['sesion']->hora_final}}</p>
<p>Enlace de reunion: {{$data['sesion']->enlace_meet}}</p>

<h3>
    eventos
</h3>
@foreach($data['evento'] as $evento)
        <p>{{$evento->hora_inicio}}</p>
        <p>{{$evento->tema}}</p>
        <a>Quitar evento</a>
        
 @endforeach

 
<button> + Anhadir evento </button>
<form action="#" method="POST">
    <input type="hidden" name="id_programa" value="{{$data['sesion']->id_programa}}"> 
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

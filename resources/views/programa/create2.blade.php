<h1>
    Crear Programa
</h1>

<form  action="{{ route('programa.store') }}" method="POST">
@csrf
    <label for="edicion">edicion</label>
    <input id="edicion" name="anio_edicion" type="number">
    <br>
    <label for="nombre">nombre</label>
    <input id="nombre" name="nombre">
    <br>
    <label for="inicio" >Inicio</label>
    <input id="inicio" name="fecha_inicio" type="date">
    <br>
    <label for="inicio">Fin</label>
    <input id="inicio"  name="fecha_fin" type="date">
    <br>
    <label for="descripcion">descripcion</label>
    <textarea id="descripcion"  name="descripcion" placeholder="descripcion"></textarea>
    <br>
    <label for="dni_admin" >dni admin</label>
    <input id="dni_admin" name="dni_administrador" type="number">
    <br>
    <button type="submit">Crear</button>
</form>
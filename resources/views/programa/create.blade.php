@extends('layout.third')
@section('header', 'Creando Nuevo Programa')

@section('descripcion', 'Llena el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('programa.store') }}" method ="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
		<div class="col-md-6">
			<label for="edicion">Edicion</label>
			<div class="form-group">
				<input type="number" placeholder="Año" required="" id="edicion" size="72" name="anio_edicion" value="">
				<br>
				<i class="glyphicon glyphicon-font"></i>
			</div>
            <label for="nombre">Nombre</label>
			<div class="form-group">
				<input type="text" placeholder="Nombre de la edición" required="" id="nombre" size="72" name="nombre" value="">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
			<label for="descripcion">Descripción</label>
			<div class="form-group">
				<textarea class="form-control" id="Descripción de la edición" name="descripcion" rows="10" cols="200" ></textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
			</div>	   
		</div>
		<div class="col-md-6">
            <label for="inicio">Inicio </label>
			<div class="form-group">
				<input type="date"  required="" id="inicio" name="fecha_inicio">
				<br>
				<i  class="glyphicon glyphicon-time"></i>
			</div>
            <label for="fin">Fin </label>
			<div class="form-group">
			<input type="date"  required="" id="fin" name="fecha_fin">
				<br>
				<i  class="glyphicon glyphicon-time"></i>
			</div>
            <label for="dni_admin">DNI del Administrador</label>
			<div class="form-group">
				<input type="number" placeholder="Ej: 12345678" required="" id="dni_admin" name="dni_administrador" size="72" value="" >
				<br>
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
		</div>
	</div>
	<div class="col-md-12 ">
		<center>
            <br><button type="submit" class="about-btn-right">Guardar</button>
		</center>
	</div>
    </form>
</div>


@endsection
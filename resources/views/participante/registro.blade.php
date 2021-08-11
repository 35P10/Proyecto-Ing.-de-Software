@extends('layout.third')
@section('header', 'Registrarse')

@section('descripcion', 'Llena el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('participante.store') }}" method ="POST" enctype="multipart/form-data">
	@csrf
		<div class="col-md-6">
			<label for="dni">DNI_persona</label>
			<div class="form-group">
				<input type="text" placeholder="Ejem: 04647521" required="" id="dni" size="72" name="dni">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
            <label for="nombre">Nombre</label>
			<div class="form-group">
				<input type="text" placeholder="Ingrese sus nombres y apellidos" required="" id="nombre" size="72" name="nombre">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
            <label for="email">E-mail</label>
			<div class="form-group">
				<input type="text" placeholder="Correo Electronico" required="" id="email" size="72" name="email">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
		</div>
		<div class="col-md-6">
            <label for="password">Contraseña: </label>
			<div class="form-group">
				<input type="password" placeholder="" required="" id="password" name="password" size="72" value="" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="universidad">Universidad: </label>
			<div class="form-group">
				<input type="text" placeholder="" required="" id="universidad" name="universidad" size="72" value="" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="grado">Grado: </label>
			<div class="form-group">
				<input type="number" placeholder="" required="" id="grado" name="grado" size="72" value="" >
                <br>
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
		</div>
	</div>
	<div class="col-md-12 ">
		<center>
            <br><button type="submit" class="about-btn-right">Registrarse</button>
		</center>
	</div>
    </form>
</div>


@endsection


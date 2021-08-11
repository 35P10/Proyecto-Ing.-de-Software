@extends('layout.third')
@section('header', 'Iniciar Sesión')

@section('descripcion', 'Llena el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form method ="POST" enctype="multipart/form-data">
	@csrf
		<div class="col-md-6">
			<label for="email">Correo</label>
			<div class="form-group">
				<input type="text" placeholder="" required="" id="email" size="72" name="email">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
		</div>
		<div class="col-md-6">
            <label for="password">Contraseña: </label>
			<div class="form-group">
				<input type="password" placeholder="" required="" id="password" name="password" size="72" value="" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
		</div>
	</div>
	<div class="col-md-12 ">
		<center>
            <br><button type="submit" class="about-btn-right">Iniciar</button>
		</center>
	</div>
    </form>
</div>


@endsection
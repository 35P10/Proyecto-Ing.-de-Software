@extends('layout.third')
@section('header', 'Editar Ponente')

@section('descripcion', 'Edita el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('ponente.actualizar', $ponente) }}" method ="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
    {{ method_field('PUT') }}
		<div class="col-md-6">
			<label for="dni">DNI</label>
			<div class="form-group">
				<input type="text" placeholder="DNI del Ponente" required="" id="dni" size="72" name="dni" value="{{ $ponente->dni }}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
            <label for="nombre">Nombre Completo</label>
			<div class="form-group">
				<input type="text" placeholder="Nombre del Ponente" required="" id="nombre" size="72" name="nombre" value="{{ $ponente->nombre }}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
			<label for="descripcion">Descripción</label>
			<div class="form-group">
				<textarea class="form-control" id="Descripción del Ponente" name="descripcion" rows="10" cols="200" >{{ $ponente->descripcion }}</textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
			</div>	   
		</div>
		<div class="col-md-6">
            <label for="grado_academico">Grado Académico </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: Doctor" required="" id="grado_academico" name="grado_academico" size="72" value="{{ $ponente->grado_academico }}" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
            <label for="especialidad">Especialidad </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: Ciencia de Datos" required="" id="especialidad" name="especialidad" size="72" value="{{ $ponente->especialidad }}" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="email">Email </label>
			<div class="form-group">
				<input type="email" placeholder="Ej: ponente@gmail.com" required="" id="email" name="email" size="72" value="{{ $ponente->email }}" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="telefono">Teléfono</label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 954222872" required="" id="telefono" name="telefono" size="72" value="{{ $ponente->telefono }}" >
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
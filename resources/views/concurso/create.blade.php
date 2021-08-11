@extends('layout.third')
@section('header', 'Creando Nuevo Evento - Concurso')

@section('descripcion', 'Llena el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('concurso.guardar', $id_sesion) }}" method ="POST" enctype="multipart/form-data">
	@csrf
		<div class="col-md-6">
			<label for="tema">Tema</label>
			<div class="form-group">
				<input type="text" placeholder="Tema de la Ponencia" required="" id="tema" size="72" name="tema">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
            <label for="hora_inicio">Hora de Inicio: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 8:40" required="" id="hora_inicio" name="hora_inicio" size="72" value="" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
			<label for="moderador">Moderador: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 8:40" required="" id="moderador" name="moderador" size="72" value="" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
			<label for="descripcion">Descripción</label>
			<div class="form-group">
				<textarea class="form-control" id="Descrioción de la Ponencia" name="descripcion" rows="10" cols="200" ></textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
			</div>	   
		</div>
		<div class="col-md-6">
            <label for="num_participantes">Máximo Número de Participantes: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 40" required="" id="num_participantes" name="num_participantes" size="72" value="" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="ganadores">Máximo Número de Ganadores: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 3" required="" id="ganadores" name="ganadores" size="72" value="" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
            <label for="requisitos">Requisitos</label>
			<div class="form-group">
				<textarea class="form-control" id="Descrioción de la Ponencia" name="requisitos" rows="10" cols="200" ></textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
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
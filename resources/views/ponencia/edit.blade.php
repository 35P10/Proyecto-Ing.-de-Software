@extends('layout.third')
@section('header', 'Editando Evento - Ponencia')

@section('descripcion', 'Modifica el siguiente formulario.')

@section('nueva_ponencia')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('ponencia.actualizar', $evento) }}" method ="POST" enctype="multipart/form-data">
	@csrf
    {{ method_field('PUT') }}
		<div class="col-md-6">
			<label for="tema">Tema</label>
			<div class="form-group">
				<input type="text" placeholder="Tema de la Ponencia" required="" id="tema" size="72" name="tema" value="{{ $evento->tema }}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
			<label for="descripcion">Descripción</label>
			<div class="form-group">
				<textarea class="form-control" id="Descrioción de la Ponencia" name="descripcion" rows="10" cols="480" >{{ $evento->descripcion }}</textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
			</div>	   
		</div>
		<div class="col-md-6">
            <label for="ponente">Ponente</label>
			<div class="form-group">
				<select class="form-control" name="ponente" id="ponente">
					<option value="">Ninguno</option>
                    
					@foreach ($ponentes as $ponente)	
						<option {{ $ponente->dni == $evento->ponencia->eventoPonente[0]->dni_ponente ? 'selected' : '' }} value="{{ $ponente->dni }}">
                            {{ $ponente->grado_academico }} {{ $ponente->nombre }}</option>
					@endforeach
				</select>
                <!-- <center><br><a href="{{route('ponente.crear')}}" class="btn btn-outline-dark">Crear nuevo ponente</a></center>-->
			</div>
			<label for="arch_presentacion">Link de la presentación: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: https://www.academia.edu/35954984/SQL_Transactions" size="72" required="" id="arch_presentacion" name="arch_presentacion" value="{{ $evento->ponencia->arch_presentacion }}" >
				<i  class="glyphicon glyphicon-link"></i>
			</div>
            <label for="hora_inicio">Hora de Inicio: </label>
			<div class="form-group">
				<input type="text" placeholder="Ej: 8:40" required="" id="hora_inicio" name="hora_inicio" size="72" value="{{ $evento->sesionEvento->hora_inicio }}" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
		</div>
	</div>
	<div class="col-md-12 ">
		<center>
            <button type="submit" class="about-btn-right">Guardar</button>
		</center>
	</div>
    </form>
</div>


@endsection
@extends('layout.third')
@section('header', 'Crear Nueva Sesión')

@section('descripcion', 'Llena el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('sesion.store') }}" method ="POST" enctype="multipart/form-data" style="display:flex;flex-direction:column;justify-items:center;text-align:center;">
	{!! csrf_field() !!}
		<div class="col-md-6" style="max-width:100%">
		</div>	 
			<label for="enlace_meet">Seleccionar Edicion:</label>
			<div class="form-group">
				<select name="id_programa">
					@foreach ( $programas as $programa)          
					<option value="{{$programa->id}}" >
						{{ $programa->anio_edicion }} {{ $programa->nombre }}
					</option>
					<br>
					@endforeach
				</select>
			</div>
        
			<div class="form-group">
				<label for="fecha">Fecha</label>
					<input type='date' required="" id="fecha" name='fecha' value="">
					<i  class="glyphicon" style="width: 10px;"></i>
				<label for="hora_inicio">  Hora Inicio</label>
					<input  type='time' id="hora_inicio" name="hora_inicio" >
					<i  class="glyphicon"  style="width: 10px;"></i>
				<label for="hora_final">Hora Final</label>
					<input  type='time' id="hora_final" name="hora_final" >

			</div>	 
			<label for="enlace_meet">Enlace de la reuni&oacute;n</label>
			<div class="form-group">
				<input type="text" placeholder="https://meet.google.com/" required="" id="enlace_meet" size="72"  name='enlace_meet' value="">
				<i  class="glyphicon glyphicon-font"></i>
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


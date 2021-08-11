@extends('layout.third')
@section('header', 'Editar Sesion')

@section('descripcion', 'Edita el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('sesion.update',$data['sesion']->id) }}"  method ="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
    {{ method_field('PUT') }}
		<div class="col-md-6">
			<label for="fecha">D&iacute;a:</label>
			<div class="form-group">
				<input type="date" required="" id="fecha" name="fecha"  value="{{$data['sesion']->fecha}}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>   
		</div>
		<div class="col-md-6">
            <label for="hora_inicio">Hora inicio </label>
			<div class="form-group">
				<input type="time"   required="" id="hora_inicio" name="hora_inicio" value="{{$data['sesion']->hora_inicio}}" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
            <label for="hora_final">Hora de finalización </label>
			<div class="form-group">
				<input type="time" required="" id="hora_final" name="hora_final"  value="{{$data['sesion']->hora_final}}" >
				<i  class="glyphicon glyphicon-sort-by-order"></i>
			</div>
			<label for="enlace_meet">Enlace de reunion</label>
			<div class="form-group">
				<input type="text" required="" id="enlace_meet" name="enlace_meet" value="{{$data['sesion']->enlace_meet}}" >
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
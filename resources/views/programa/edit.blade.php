@extends('layout.third')
@section('header', 'Editar Programa')

@section('descripcion', 'Edita el siguiente formulario.')

@section('nuevo_concurso')
<div role="tabpanel" class="col-lg-9 tab-pane fade show active" id="day-1">
<div class="container">
	<form action="{{ route('programa.update',$data['programa']->id) }}" method ="POST" enctype="multipart/form-data">
	{!! csrf_field() !!}
    {{ method_field('PUT') }}
		<div class="col-md-6">
			<label for="dni">Edicion</label>
			<div class="form-group">
				<input type="text" placeholder="DNI del Ponente" required="" id="dni" size="72" name="anio_edicion" value="{{  $data['programa'] ->anio_edicion }}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
            <label for="nombre">Nombre de edicion</label>
			<div class="form-group">
				<input type="text" placeholder="Nombre del Ponente" required="" id="nombre" size="72" name="nombre" value=" {{ $data['programa'] ->nombre}}">
				<i  class="glyphicon glyphicon-font"></i>
			</div>
			<label for="descripcion">Descripción</label>
			<div class="form-group">
				<textarea class="form-control" id="Descripción del Ponente" name="descripcion" rows="10" cols="200" >{{$data['programa']->descripcion}}</textarea>
				<i  class="glyphicon glyphicon-align-justify" ></i>
			</div>	   
		</div>
		<div class="col-md-6">
            <label for="grado_academico">Fecha de inicio </label>
			<div class="form-group">
				<input type="date" placeholder="Ej: Doctor" required="" id="grado_academico" name="fecha_inicio"  value="{{ $data['programa'] ->fecha_inicio }}" >
				<i  class="glyphicon glyphicon-time"></i>
			</div>
            <label for="especialidad">Fecha de finalización </label>
			<div class="form-group">
				<input type="date" placeholder="Ej: Ciencia de Datos" required="" id="especialidad" name="fecha_fin" value="{{$data['programa'] ->fecha_fin }}" >
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
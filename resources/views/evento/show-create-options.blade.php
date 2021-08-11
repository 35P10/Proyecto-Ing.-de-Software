@extends('layout.third')
@section('header', 'Creando Nuevo Evento')
@section('descripcion', 'Elige una de las opciones.')
@section('nuevo_evento_opciones')
        <br><br>
        <center>
        <a href="{{  route('ponencia.crear', $id_sesion) }}" class="about-btn-right">Crear Nueva Ponencia</a>
        </center>
        <br>
        <center>
        <a href="{{  route('concurso.crear', $id_sesion) }}" class="about-btn-right">Crear Nuevo Concurso</a>
        </center>
@endsection
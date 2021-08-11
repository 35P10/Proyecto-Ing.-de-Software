<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ParticipanteController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\EdicionController;
use App\Http\Controllers\ProgramaController;
use App\Http\Controllers\SesionController;
use App\Http\Controllers\PonenteController;
use App\Http\Controllers\EventoController;
use App\Http\Controllers\ConcursoController;
use App\Http\Controllers\PonenciaController;
use App\Http\Controllers\LoginController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home/registrarse',[ParticipanteController::class,'create'])->name('registro');
Route::get('/home/buscar',[HomeController::class,'buscar'])->name('buscar');
// Rutas para el login
Route::get('/home/ingresar',[HomeController::class,'login'])->name('login')->middleware('guest');
Route::post('/home/ingresar',[LoginController::class,'ingresar']);
Route::get('/home/salir',[LoginController::class,'salir'])->name('logout');



Route::resource('home', HomeController::class);
Route::resource('programa', ProgramaController::class);
Route::resource('persona', PersonaController::class);
Route::resource('participante', ParticipanteController::class);

// Rutas de sesion
Route::resource('sesion', SesionController::class);
Route::post('/sesion/quitar_evento',[SesionController::class,'quitar_evento'])->name('sesion.quitar_evento');
Route::post('/sesion/cambiar_hora',[SesionController::class,'cambiar_hora_evento'])->name('sesion.cambiar_hora_evento');
Route::get('evento/mostrar-opciones', [SesionController::class, 'agregar_evento'])->name('sesion.addEvento');

// Rutas de ponente
Route::get('/ponente', [PonenteController::class, 'index']);
Route::get('/ponente/mostrar/{ponente}', [PonenteController::class, 'show'])->name('ponente.mostrar');
Route::get('/ponente/crear', [PonenteController::class, 'create'])->name('ponente.crear');
Route::post('/ponente/guardar', [PonenteController::class, 'store'])->name('ponente.guardar');
Route::delete('/ponente/{ponente}', [PonenteController::class, 'destroy'])->name('ponente.eliminar');
Route::get('/ponente/editar/{ponente}', [PonenteController::class, 'edit'])->name('ponente.editar');
Route::put('/ponente/{ponente}', [PonenteController::class, 'update'])->name('ponente.actualizar');

// Rutas de evento
Route::get('evento/mostrar-opciones/{id_sesion}', [EventoController::class, 'showCreateOptions'])->name('evento.mostrarOpciones');
Route::get('sesion/mostrar/{sesion}', [EventoController::class, 'show'])->name('sesion.mostrar');
Route::delete('/evento/{evento}', [EventoController::class, 'destroy'])->name('evento.eliminar');
// Rutas de Concurso
Route::get('/concurso/crear/{id_sesion}', [ConcursoController::class, 'create'])->name('concurso.crear');
Route::post('/concurso/guardar/{sesion}', [ConcursoController::class, 'store'])->name('concurso.guardar');
Route::get('/concurso/editar/{evento}', [ConcursoController::class, 'edit'])->name('concurso.editar');
Route::put('/concurso/{evento}', [ConcursoController::class, 'update'])->name('concurso.actualizar');

// Rutas de ponencia
Route::get('/ponencia/crear/{id_sesion}', [PonenciaController::class, 'create'])->name('ponencia.crear');
Route::post('/ponencia/guardar/{sesion}', [PonenciaController::class, 'store'])->name('ponencia.guardar');
Route::get('/ponencia/editar/{evento}', [PonenciaController::class, 'edit'])->name('ponencia.editar');
Route::put('/ponencia/{evento}', [PonenciaController::class, 'update'])->name('ponencia.actualizar');


// Route::get('/evento/mostrar-opciones', [EventoController::class, 'showCreateOptions']);
Route::get('/concurso', function()
{
    return view('evento.create-ponencia');
});
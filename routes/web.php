<?php

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

//David:rutas del proyecto
Route::resource('estudiante', 'EstudianteController');
Route::resource('fecha', 'FechaController');
Route::resource('telefono', 'TelefonoController');
Route::resource('correo', 'CorreoController');
Route::resource('turno', 'TurnoController');
Route::resource('semestre', 'SemestreController');
Route::resource('grupo', 'GrupoController');

Route::resource('inscripcion', 'InscripcionController');
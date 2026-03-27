<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlternativasController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\BitacoraController;
use App\Http\Controllers\CentrosFormacionController;
use App\Http\Controllers\EnteCoformadoresController;
use App\Http\Controllers\ProgramaDeFormacionController;
use App\Http\Controllers\RolesAdministrativosController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\FichadecaracterizacionController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\TiposDocumentosController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

/* CRUD completos */


Route::middleware('auth', 'can:ver-registros, superadministrador')->group(function () {
Route::resource('programas', ProgramaDeFormacionController::class);
Route::resource('rolesadministrativos', RolesAdministrativosController::class);
Route::resource('regionales', RegionalesController::class);
Route::resource('tipodocumento', TiposDocumentosController::class);
Route::resource('alternativas', AlternativasController::class);
Route::resource('aprendices', AprendicesController::class);
Route::resource('eps', EpsController::class);

Route::resource('fichas', FichadecaracterizacionController::class);
Route::resource('centroformacion', CentrosFormacionController::class);
Route::resource('entecoformador', EnteCoformadoresController::class);
Route::resource('instructores', InstructoresController::class);

});

 Route::middleware(['auth', 'can:es-aprendiz'])->group(function(){
 Route::resource('bitacora', BitacoraController::class);
 });




 Route::resource('perfil', PerfilController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

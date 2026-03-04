<?php

use App\Http\Controllers\BitacoraController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProgramaDeFormacionController;
use App\Http\Controllers\RolesAdministrativosController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\TiposDocumentosController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/Programas/index', [ProgramaDeFormacionController::class, 'index'])->name('programas.index');
Route::get('/Programas/create', [ProgramaDeFormacionController::class, 'create'])->name('programas.create');
Route::post('/Programas/store', [ProgramaDeFormacionController::class, 'store'])->name('programas.store');
Route::get('/Programas/edit/{nis}', [ProgramaDeFormacionController::class, 'edit'])->name('programas.edit');
Route::put('/programas/update/{nis}', [ProgramaDeFormacionController::class, 'update'])->name('programas.update');
Route::get('/Programas/show/{nis}', [ProgramaDeFormacionController::class, 'show'])->name('programas.show');
Route::delete('/Programas/delete/{nis}', [ProgramaDeFormacionController::class, 'destroy'])->name('programas.delete');

Route::get('/Roles_administrativos/index', [RolesAdministrativosController::class, 'index'])->name('RolesAdministrativos.index');
Route::get('/Roles_administrativos/create', [RolesAdministrativosController::class, 'create'])->name('RolesAdministrativos.create');
Route::post('/Roles_administrativos/store', [RolesAdministrativosController::class, 'store'])->name('RolesAdministrativos.store');
Route::get('/Roles_administrativos/edit/{nis}', [RolesAdministrativosController::class, 'edit'])->name('RolesAdministrativos.edit');
Route::put('/Roles_administrativos/update/{nis}', [RolesAdministrativosController::class, 'update'])->name('RolesAdministrativos.update');
Route::get('/Roles_administrativos/show/{nis}', [RolesAdministrativosController::class, 'show'])->name('RolesAdministrativos.show');
Route::delete('/Roles_administrativos/delete/{nis}', [RolesAdministrativosController::class, 'destroy'])->name('RolesAdministrativos.delete');

Route::get('/Regionales/index', [RegionalesController::class, 'index'])->name('Regionales.index');
Route::get('/Regionales/create', [RegionalesController::class, 'create'])->name('Regionales.create');
Route::get('/Regionales/store', [RegionalesController::class, 'store'])->name('Regionales.store');
Route::get('/Regionales/edit/{nis}', [RegionalesController::class, 'edit'])->name('Regionales.edit');
Route::get('/Regionales/update/{nis}', [RegionalesController::class, 'update'])->name('Regionales.update');
Route::get('/Regionales/show/{nis}', [RegionalesController::class, 'show'])->name('Regionales.show');
Route::get('/Regionales/delete/{nis}', [RegionalesController::class, 'destroy'])->name('Regionales.delete');

Route::get('/Eps', [EpsController::class, 'index'])
    ->name('Eps.index');

Route::get('/Regionales', [RegionalesController::class, 'index'])
    ->name('rigionale.index');

Route::get('/Tipos_documentos', [TiposDocumentosController::class, 'index'])
    ->name('Tipos_documentos.index');


Route::get('/Bitacora', [BitacoraController::class, 'index'])->name('bitacora.index');
Route::get('/Bitacora/create', [BitacoraController::class, 'create'])->name('bitacora.create');
Route::post('/Bitacora/store', [BitacoraController::class, 'store'])->name('bitacora.store');

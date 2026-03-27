<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rolesadministrativos;
use Illuminate\Support\Facades\DB;

class RolesAdministrativosController extends Controller
{
  public function index()
  {
    // Traer todos los registros de la tabla

    $roles = rolesadministrativos::all();

    // Envia los datos a la vista
    return view('rolesadministrativos.index', compact('roles'));
  }

  public function create()
  {


    return view('rolesadministrativos.create');
  }

  public function store(Request $request)
  {

    $request->validate([
      'descripcion' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',

    ], [

      'descripcion.required' => 'La descripción es requerida',
      'descripcion.regex' => 'La descripción debe ser una cadena de texto',
      'descripcion.max' => 'La descripción no debe exceder los 200 caracteres',
      'descripcion.min' => 'La descripción debe tener al menos 3 caracteres',

    ]);

    DB::beginTransaction();

    try {

      $rol = rolesadministrativos::create([
        'descripcion' => $request['descripcion']
      ]);

      DB::commit();

      return back()->with('success', 'Creado con exito');
    } catch (\Throwable $th) {

      DB::rollBack();

      return back()->with('error', 'Error al crear');
    }
  }

  public function destroy($nis)
  {


    DB::beginTransaction();
    try {

      $rol = rolesadministrativos::FindOrfail($nis);

      $rol->delete();

      DB::commit();

      return back()->with('success', 'Eliminado con exito');
    } catch (\Exception $e) {

      DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }
  }


  public function edit($nis)
  {

    $rol = rolesadministrativos::FindOrfail($nis);

    return view('rolesadministrativos.edit', compact('rol'));
  }


  public function show($nis)
  {

    $rol = rolesadministrativos::FindOrfail($nis);

    return view('rolesadministrativos.show', compact('rol'));
  }



  public function update(Request $request, $nis)
  {

    $request->validate([
      'descripcion' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',



    ], [

      'descripcion.required' => 'La descripción es requerida',
      'descripcion.regex' => 'La descripción debe ser una cadena de texto',
      'descripcion.max' => 'La descripción no debe exceder los 200 caracteres',
      'descripcion.min' => 'La descripción debe tener al menos 3 caracteres',


    ]);

    DB::beginTransaction();


    try {

      $rol = rolesadministrativos::findOrFail($nis);

      $rol->update([
        'descripcion' => $request['descripcion']
      ]);

      DB::commit();

      return redirect()->route('rolesadministrativos.index')->with('success', 'Actualización exitosa');
    } catch (\Exception $th) {

      DB::rollBack();

      // return $th->getMessage();

      return back()->with('error', 'Error al actualizar');
    }
  }
}

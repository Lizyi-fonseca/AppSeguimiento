<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tiposdocumento;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TiposDocumentosController extends Controller
{

  public function index()
  {
    $tipo = tiposdocumento::all();

    return view('tipodocumento.index', compact('tipo'));
  }

  public function create()
  {
    return view('tipodocumento.create');
  }

  public function store(Request $request)
  {

    $request->validate([
      'denominacion' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'observaciones' => 'nullable'

    ], [
      'denominacion.required' => 'La descripción es requerida',
      'denominacion.regex' => 'La descripción debe ser una cadena de texto',
      'denominacion.max' => 'La descripción no debe exceder los 200 caracteres',
      'denominacion.min' => 'La descripción debe tener al menos 3 caracteres',


    ]);


    DB::beginTransaction();

    try {


      $observa = bcrypt($request->observaciones);


      $programa = tiposdocumento::create(
        [
          'denominacion' => $request['denominacion'],
          'observaciones' => $observa

        ]
      );

      DB::commit();

      return back()->with('success', 'Creado con exito');
    } catch (\Throwable $th) {
      DB::rollBack();

      return $th->getMessage();
    }
  }

  public function edit($nis)
  {

    $tiposD = tiposdocumento::FindOrfail($nis);

    return view('tipodocumento.edit', compact('tiposD'));
  }

  public function show($nis)
  {

    $tiposD = tiposdocumento::FindOrfail($nis);

    return view('tipodocumento.show', compact('tiposD'));
  }

  public function update(Request $request, $nis)
  {

    $request->validate([

      'denominacion' => 'required',
      'observaciones' => 'nullable'

    ], [
      'denominacion.required' => 'La denominación es requerida'


    ]);


    try {

      $tiposD = tiposdocumento::FindOrfail($nis);

      $tiposD->update([
        'denominacion' => $request['denominacion'],
        'observaciones' => $request['observaciones']
      ]);

      return redirect()->route('tipodocumento.index')->with('success', 'Actualización exitosa');
    } catch (\Throwable $th) {

      return back()->with('error', 'Error al actualizar');
    }
  }

  public function destroy($nis){


    DB::beginTransaction();
    try {

      $tiposD = tiposdocumento::FindOrfail($nis);

      $tiposD->delete();

      DB::commit();

      return back()->with('success', 'Eliminado con exito');
    } catch (\Exception $e) {

      DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }
  }
}

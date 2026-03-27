<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Eps;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EpsController extends Controller
{
  public function index()
  {

    $eps = Eps::all();
    return view('eps.index', compact('eps'));
  }

  public function create()
  {

    return view('eps.create');
    
  }


  public function store(Request $request)
  {

    $request->validate([
      'nis' => 'required|numeric|digits_between:4,20',
      'numd' => 'required',
      'denominacion' => 'nullable',
      'observaciones' => 'nullable'

    ], [

      'nis.required' => 'El codigo ya esta registrado',
      'denominacion.required' => 'La denominación es requerida'

    ]);

    DB::beginTransaction();

    try {


      $observa = bcrypt($request->observaciones);


      $eps = Eps::create(
        [
          'nis' => $request['nis'],
          'numd' => $request['numd'],
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

    $eps = Eps::FindOrfail($nis);

    return view('eps.edit', compact('eps'));
  }



  public function show($nis)
  {

    $eps = Eps::FindOrfail($nis);

    return view('eps.show', compact('eps'));
  }


  public function update(Request $request, $nis)
  {

    $request->validate([

      'numd' => 'required|numeric|digits_between:4,20',
      'denominacion' => 'required',
      'observaciones' => 'nullable'

    ], [

      'numd.required' => 'El nis ya esta registrado',
      'denominacion.required' => 'La denominación es requerida'


    ]);


    try {

      $ep = Eps::FindOrfail($nis);

      $ep->update([
        'numd' => $request['numd'],
        'denominacion' => $request['denominacion'],
        'observaciones' => $request['observaciones']
      ]);

      return redirect()->route('eps.index')->with('success', 'Actualización exitosa');
    } catch (\Throwable $th) {

      return back()->with('error', 'Error al actualizar');
    }
  }

  public function destroy($nis)
  {


    DB::beginTransaction();
    try {

      $eps = Eps::FindOrfail($nis);

      $eps->delete();

      DB::commit();

      return back()->with('success', 'Eliminado con exito');
    } catch (\Exception $e) {

      DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }
  }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ProgramaDeFormacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProgramaDeFormacionController extends Controller
{
  public function index()
    {
        $programas = ProgramaDeFormacion::all();

        return view('Programas.index', compact('programas'));
    }

    public function create ()
    {
      return view('Programas.create');
    }

    public function store(Request $request){

    $request->validate([
      'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' => 'required',
      'observaciones' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'

    ]);

    DB::beginTransaction();

    try {


    $observa = bcrypt($request->observaciones);


    $programa = ProgramaDeFormacion::create(
      [
        'codigo' => $request['codigo'],
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

    public function edit($nis){

    $programa = ProgramaDeFormacion::FindOrfail($nis);

    return view('Programas.edit', compact('programa'));

    
    }


    public function show($nis){

    $programa = ProgramaDeFormacion::FindOrfail($nis);

    return view('Programas.show', compact('programa'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' => 'required',
      'observaciones' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'


    ]);


     try {

     $programa = ProgramaDeFormacion::FindOrfail($nis);

     $programa->update([
      'codigo'=>$request['codigo'],
      'denominacion'=>$request['denominacion'],
      'observaciones'=>$request['observaciones']
     ]);

     return redirect()->route('programas.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $programa = ProgramaDeFormacion::FindOrfail($nis);

    $programa->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

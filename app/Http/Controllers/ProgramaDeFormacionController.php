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

        return view('programas.index', compact('programas'));
    }

    public function create ()
    {
      return view('programas.create');
    }

    public function store(Request $request){

    $request->validate([
      'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' =>'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'observaciones' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' => 'La descripción es requerida',
      'denominacion.regex' => 'La descripción debe ser una cadena de texto',
      'denominacion.max' => 'La descripción no debe exceder los 200 caracteres',
      'denominacion.min' => 'La descripción debe tener al menos 3 caracteres',


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

    return view('programas.edit', compact('programa'));

    
    }


    public function show($nis){

    $programa = ProgramaDeFormacion::FindOrfail($nis);

    return view('programas.show', compact('programa'));

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

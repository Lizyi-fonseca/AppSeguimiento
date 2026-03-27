<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\centrosformacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
class CentrosFormacionController extends Controller
{
  public function index()
    {
        $cent = centrosformacion::all();

        return view('centroformacion.index', compact('cent'));
    }

    public function create ()
    {
      return view('centroformacion.create');
    }

    public function store(Request $request){

    $request->validate([
      'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' =>'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'direccion' => 'nullable',
      'observaciones' => 'nullable',
      'tblregionales_nis' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' => 'La descripción es requerida',
      'denominacion.regex' => 'La descripción debe ser una cadena de texto',
      'denominacion.min' => 'La descripción debe tener al menos 3 caracteres',
      'direccion.max' => 'La dirección no debe exceder los 200 caracteres',
      'observaciones.max' => 'La observacion no debe exceder los 200 caracteres',

    ]);

    DB::beginTransaction();

    try {


    $direcc = bcrypt($request->direccion);


    $cent = CentrosFormacionController::create(
      [
        'codigo' => $request['codigo'],
        'denominacion' => $request['denominacion'],
        'direccion' => $direcc,
        'observaciones' => $request['observaciones'],
        'tblregionales_nis' => $request['tblregionales_nis']
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

    $cent = centrosformacion::FindOrfail($nis);

    return view('centroformacion.edit', compact('cent'));

    
    }


    public function show($nis){

    $cent = centrosformacion::FindOrfail($nis);

    return view('centroformacion.show', compact('cent'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' => 'required',
      'direccion' => 'nullable',
      'observaciones' => 'nullable',
      'tblregionales_nis' => 'required'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'


    ]);


     try {

     $cent = centrosformacion::FindOrfail($nis);

     $cent->update([
      'codigo'=>$request['codigo'],
      'denominacion'=>$request['denominacion'],
      'direccion'=>$request['direccion'],
      'observaciones'=>$request['observaciones'],
      'tblregionales_nis'=>$request['tblregionales_nis']
     ]);

     return redirect()->route('centroformacion.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $cent = centrosformacion::FindOrfail($nis);

    $cent->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

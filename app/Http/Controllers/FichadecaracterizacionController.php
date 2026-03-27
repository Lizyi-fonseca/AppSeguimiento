<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Models\fichadecaracterizacion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FichadecaracterizacionController extends Controller
{
  public function index()
    {
        $ficha = fichadecaracterizacion::all();

        return view('fichascaracterizacion.index', compact('ficha'));
    }

    public function create ()
    {
      return view('fichas.create');
    }

    public function store(Request $request){

    $request->validate([
      'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' =>'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'cupo' => 'nullable',
      'fechainicio' => 'nullable',
      'fechafin' => 'nullable',
      'observacion' => 'nullable',
      'tblprogramasde_formacion_nis' => 'nullable',
      'tblcentros_formacion_nis' => 'nullable',
      'tblcentros_formacion_tblregionales_nis' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' => 'La descripción es requerida',
      'denominacion.regex' => 'La descripción debe ser una cadena de texto',
      'denominacion.max' => 'La descripción no debe exceder los 200 caracteres',
      'denominacion.min' => 'La descripción debe tener al menos 3 caracteres',
      'cupo.required' => 'El cupo es requerido',
      'fechainicio.required' => 'La fecha de inicio es requerida',
      'fechafin.required' => 'La fecha de fin es requerida',
      'observacion.required' => 'La observación es requerida',
      'tblprogramasde_formacion_nis.required' => 'El programa de formación es requerido',
      'tblcentros_formacion_nis.required' => 'El centro de formación es requerido',
      'tblcentros_formacion_tblregionales_nis.required' => 'La regional es requerida'

    ]);

    DB::beginTransaction();

    try {


    $ficha = bcrypt($request->fechainicio);


    $ficha = fichadecaracterizacion::create(
      [
        'codigo' => $request['codigo'],
        'denominacion' => $request['denominacion'],
        'cupo' => $request['cupo'],
        'fechainicio' => $request['fechainicio'],
        'fechafin' => $request['fechafin'],
        'observacion' => $request['observacion'],
        'tblprogramasde_formacion_nis' => $request['tblprogramasde_formacion_nis'],
        'tblcentros_formacion_nis' => $request['tblcentros_formacion_nis'],
        'tblcentros_formacion_tblregionales_nis' => $request['tblcentros_formacion_tblregionales_nis']

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

    $ficha = fichadecaracterizacion::FindOrfail($nis);

    return view('fichas.edit', compact('ficha'));

    
    }


    public function show($nis){

    $ficha = fichadecaracterizacion::FindOrfail($nis);

    return view('fichas.show', compact('ficha'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'codigo' => 'required|numeric|digits_between:4,20',
     'denominacion' => 'required',
     'cupo' => 'nullable',
     'fechainicio' => 'nullable',
     'fechafin' => 'nullable',
     'observacion' => 'nullable',
     'tblprogramasde_formacion_nis' => 'nullable',
     'tblcentros_formacion_nis' => 'nullable',
     'tblcentros_formacion_tblregionales_nis' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida',
      'cupo.required' =>'El cupo es requerido',
      'fechainicio.required' =>'La fecha de inicio es requerida',
      'fechafin.required' =>'La fecha de fin es requerida',
      'observacion.required' =>'La observación es requerida',
      'tblprogramasde_formacion_nis.required' =>'El programa de formación es requerido',
      'tblcentros_formacion_nis.required' =>'El centro de formación es requerido',
      'tblcentros_formacion_tblregionales_nis.required' =>'La regional es requerida'

    ]);


     try {

     $ficha = fichadecaracterizacion::FindOrfail($nis);

     $ficha->update([
      'codigo'=>$request['codigo'],
      'denominacion'=>$request['denominacion'],
      'cupo'=>$request['cupo'],
      'fechainicio'=>$request['fechainicio'],
      'fechafin'=>$request['fechafin'],
      'observacion'=>$request['observacion'],
      'tblprogramasde_formacion_nis'=>$request['tblprogramasde_formacion_nis'],
      'tblcentros_formacion_nis'=>$request['tblcentros_formacion_nis'],
      'tblcentros_formacion_tblregionales_nis'=>$request['tblcentros_formacion_tblregionales_nis']
     ]);

     return redirect()->route('fichas.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $ficha = fichadecaracterizacion::FindOrfail($nis);

    $ficha->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

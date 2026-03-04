<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\regionales;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegionalesController extends Controller
{
    public function index()
    {
        $regionales = regionales::all();

        return view('Regionales.index', compact('regionales'));
    }

    public function create ()
    {
      return view('Regionales.create');
    }

    public function store(Request $request){

    $request->validate([
      'codigo' => 'required|numeric|digits_between:4,20',
      'denominacion' => 'required',
      'direccion' => 'nullable',
      'observacion' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'

    ]);

    DB::beginTransaction();

    try {


    $observa = bcrypt($request->observacion);


    $regional = Regionales::create(
      [
        'codigo' => $request['codigo'],
        'denominacion' => $request['denominacion'],
        'direccion' => $request['direccion'],
        'observacion' => $observa

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

    $regional = Regionales::FindOrfail($nis);

    return view('Regionales.edit', compact('Regionales'));

    
    }


    public function show($nis){

    $regional = Regionales::FindOrfail($nis);

    return view('Regionales.show', compact('Regionales'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'codigo' => 'required|numeric|digits_between:4,20',
     'denominacion' => 'required',
     'direccion' => 'required',
     'observaciones' => 'nullable'

    ],[

      'codigo.required' => 'El codigo ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'


    ]);


     try {

     $regional = Regionales::FindOrfail($nis);

     $regional->update([
      'codigo'=>$request['codigo'],
      'denominacion'=>$request['denominacion'],
      'direccion'=>$request['direccion'],
      'observacion'=>$request['observacion']
     ]);

     return redirect()->route('Regionales.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $regional = Regionales::FindOrfail($nis);

    $regional->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

    
    
}


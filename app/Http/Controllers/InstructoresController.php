<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\instructores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class InstructoresController extends Controller
{
  public function index()
    {
        $instructores = instructores::all();

          return view('instructor.index', compact('instructores'));
    }

    public function create ()
    {
      return view('instructor.create');
    }

    public function store(Request $request){

    $request->validate([
      'numdoc' => 'required|numeric|digits_between:4,20',
      'nombres' =>'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'apellidos' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'direccion' => 'required|string|max:200|min:3',
      'telefono' => 'required|numeric|digits_between:7,15',
      'correoint' => 'required|email|unique:tblinstructores,correoint',
      'correoprs' => 'required|email|unique:tblinstructores,correoprs',
      'sexo' => 'required|in:M,F',
      'fechadn' => 'required|date|before:today',
      'tblroles_administrativos_nis' => 'required|exists:tblroles_administrativos,nis',
      'tbltipos_documentos_nis' => 'required|exists:tbltipos_documentos,nis',
      'tbl_eps_nis' => 'required|exists:tbl_eps,nis'

    ],[

      'numdoc.required' => 'El número de documento es requerido',
      'nombres.required' => 'El nombre es requerido',
      'apellidos.required' => 'El apellido es requerido',
      'direccion.required' => 'La dirección es requerida',
      'telefono.required' => 'El teléfono es requerido',
      'correoint.required' => 'El correo institucional es requerido',
      'correoprs.required' => 'El correo personal es requerido',
      'sexo.required' => 'El sexo es requerido',
      'fechadn.required' => 'La fecha de nacimiento es requerida',
      'tblroles_administrativos_nis.required' => 'El rol administrativo es requerido',
      'tbltipos_documentos_nis.required' => 'El tipo de documento es requerido',
      'tbl_eps_nis.required' => 'La eps es requerida'

    ]);

    DB::beginTransaction();

    try {


    $observa = bcrypt($request->observaciones);


    $instructores = instructores::create(
      [
        'numdoc' => $request['numdoc'],
        'nombres' => $request['nombres'],
        'apellidos' => $request['apellidos'],
        'direccion' => $request['direccion'],
        'telefono' => $request['telefono'],
        'correoint' => $request['correoint'],
        'correoprs' => $request['correoprs'],
        'sexo' => $request['sexo'],
        'fechadn' => $request['fechadn'],
        'tblroles_administrativos_nis' => $request['tblroles_administrativos_nis'],
        'tbltipos_documentos_nis' => $request['tbltipos_documentos_nis'],
        'tbl_eps_nis' => $request['tbl_eps_nis']

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

    $instructores = instructores::FindOrfail($nis);

    return view('instructores.edit', compact('instructores'));

    
    }


    public function show($nis){

    $instructores = instructores::FindOrfail($nis);

    return view('instructores.show', compact('instructores'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'numdoc' => 'required|numeric|digits_between:4,20',
      'nombres' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'apellidos' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'direccion' => 'required|string|max:200|min:3',
      'telefono' => 'required|numeric|digits_between:7,15',
      'correoint' => 'required|email|unique:tblinstructores,correoint',
      'correoprs' => 'required|email|unique:tblinstructores,correoprs',
      'sexo' => 'required|in:M,F',
      'fechadn' => 'required|date|before:today',
      'tblroles_administrativos_nis' => 'required|exists:tblroles_administrativos,nis',
      'tbltipos_documentos_nis' => 'required|exists:tbltipos_documentos,nis',
      'tbl_eps_nis' => 'required|exists:tbl_eps,nis'

    ],[

      'numdoc.required' => 'El número de documento es requerido',
      'nombres.required' => 'El nombre es requerido',
      'apellidos.required' => 'El apellido es requerido',
      'direccion.required' => 'La dirección es requerida',
      'telefono.required' => 'El teléfono es requerido',
      'correoint.required' => 'El correo institucional es requerido',
      'correoprs.required' => 'El correo personal es requerido',
      'sexo.required' => 'El sexo es requerido',
      'fechadn.required' => 'La fecha de nacimiento es requerida',
      'tblroles_administrativos_nis.required' => 'El rol administrativo es requerido',
      'tbltipos_documentos_nis.required' => 'El tipo de documento es requerido',
      'tbl_eps_nis.required' => 'La eps es requerida'

    ]);


     try {

     $instructores = instructores::FindOrfail($nis);

     $instructores->update([
      'numdoc'=>$request['numdoc'],
      'nombres'=>$request['nombres'],
      'apellidos'=>$request['apellidos'],
      'direccion'=>$request['direccion'],
      'telefono'=>$request['telefono'],
      'correoint'=>$request['correoint'],
      'correoprs'=>$request['correoprs'],
      'sexo'=>$request['sexo'],
      'fechadn'=>$request['fechadn'],
      'tblroles_administrativos_nis'=>$request['tblroles_administrativos_nis'],
      'tbltipos_documentos_nis'=>$request['tbltipos_documentos_nis'],
      'tbl_eps_nis'=>$request['tbl_eps_nis']
     ]);

     return redirect()->route('instructores.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $instructores = instructores::FindOrfail($nis);

    $instructores->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

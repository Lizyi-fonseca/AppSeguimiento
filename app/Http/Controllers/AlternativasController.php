<?php

namespace App\Http\Controllers;
use App\Models\alternativas;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AlternativasController extends Controller
{
  public function index()
    {
        $alter = Alternativas::all();

        return view('alternativas.index', compact('alter'));
    }

    public function create ()
    {
      return view('alternativas.create');
    }

    public function store(Request $request){

    $request->validate([
      'id' => 'required|numeric|digits_between:4,20',
      'nombre' =>'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'descripcion' => 'nullable',
      'estado' => 'nullable'

    ],[

      'id.required' => 'El ID es requerido',
      'nombre.required' => 'El nombre es requerido',
      'nombre.regex' => 'El nombre debe ser una cadena de texto',
      'nombre.max' => 'El nombre no debe exceder los 200 caracteres',
      'nombre.min' => 'El nombre debe tener al menos 3 caracteres',


    ]);

    DB::beginTransaction();

    try {


    $alter = bcrypt($request->estado);


    $alter = Alternativas::create(
      [
        'id' => $request['id'],
        'nombre' => $request['nombre'],
        'descripcion' => $request['descripcion'],
        'estado' => $request['estado']

      ]
    );

    DB::commit();

    return back()->with('success', 'Creado con exito');
      

    } catch (\Throwable $th) {
      DB::rollBack();

      return $th->getMessage();
    }


    }

    public function edit($id){

    $alter = Alternativas::FindOrfail($id);

    return view('alternativas.edit', compact('alter'));

    
    }


    public function show($id){

    $alter = Alternativas::FindOrfail($id);

    return view('alternativas.show', compact('alter'));

    }


    public function update(Request $request, $id){

    $request->validate([

      'id' => 'required|numeric|digits_between:4,20',
      'nombre' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'descripcion' => 'nullable',
      'estado' => 'nullable'

    ],[

      'id.required' => 'El ID es requerido',
      'nombre.required' => 'El nombre es requerido'


    ]);


     try {

     $alter = Alternativas::FindOrfail($id);

     $alter->update([
      'id'=>$request['id'],
      'nombre'=>$request['nombre'],
      'descripcion'=>$request['descripcion'],
      'estado'=>$request['estado']
     ]);

     return redirect()->route('alternativas.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($id){


    DB::beginTransaction();
    try {
       
    $alter = Alternativas::FindOrfail($id);

    $alter->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

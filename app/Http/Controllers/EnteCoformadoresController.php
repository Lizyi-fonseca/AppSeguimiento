<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\entecoformadores;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EnteCoformadoresController extends Controller
{
  public function index()
    {
        $ente = entecoformadores::all();

        return view('entecoformador.index', compact('ente'));
    }

    public function create ()
    {
      return view('entecoformador.create');
    }

    public function store(Request $request){

    $request->validate([
      'tdoc' => 'required|numeric|digits_between:4,20',
      'numdoc' => 'required|numeric|digits_between:4,20',
      'razonsocial' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'direccion' => 'required|string|max:200|min:3',
      'telefono' => 'required|numeric|digits_between:4,20',
      'correoint' => 'required|email|unique:tblente_coformadores,correoint'
    ],[

    ],[

      'tdoc.required' => 'El tipo de documento es requerido',
      'numdoc.required' => 'El número de documento es requerido',
      'razonsocial.required' => 'La razón social es requerida',
      'direccion.required' => 'La dirección es requerida',
      'telefono.required' => 'El teléfono es requerido',
      'correoint.required' => 'El correo institucional es requerido',

    ]);

    DB::beginTransaction();

    try {


    $corr = bcrypt($request->correoint);


    $ente = entecoformadores::create(
      [
        'tdoc' => $request['tdoc'],
        'numdoc' => $request['numdoc'],
        'razonsocial' => $request['razonsocial'],
        'direccion' => $request['direccion'],
        'telefono' => $request['telefono'],
        'correoint' => $request['correoint']

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

    $ente = entecoformadores::FindOrfail($nis);

    return view('entecoformador.edit', compact('ente'));

    
    }


    public function show($nis){

    $ente = entecoformadores::FindOrfail($nis);

    return view('entecoformador.show', compact('ente'));

    }


    public function update(Request $request, $nis){

    $request->validate([

     'tdoc' => 'required|numeric|digits_between:4,20',
      'numdoc' => 'required|numeric|digits_between:4,20',
      'razonsocial' => 'required|string|max:200|min:3|regex:/^[a-zA-ZñÑáéíóúÁÉÍÓÚ\s]+$/u',
      'direccion' => 'required|string|max:200|min:3',
      'telefono' => 'required|numeric|digits_between:4,20',
      'correoint' => 'required|email|unique:tblente_coformadores,correoint',
      

    ],[

      'tdoc.required' => 'El tipo de documento ya esta registrado',
      'numdoc.required' => 'El número de documento ya esta registrado',
      'razonsocial.required' => 'La razón social ya esta registrada',
      'direccion.required' => 'La dirección ya esta registrada',
      'telefono.required' => 'El teléfono ya esta registrado',
      'correoint.required' => 'El correo institucional ya esta registrado'

    ]);


     try {

     $ente = entecoformadores::FindOrfail($nis);

     $ente->update([
      'tdoc'=>$request['tdoc'],
      'numdoc'=>$request['numdoc'],
      'razonsocial'=>$request['razonsocial'],
      'direccion'=>$request['direccion'],
      'telefono'=>$request['telefono'],
      'correoint'=>$request['correoint']
     ]);

     return redirect()->route('entecoformador.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 


    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $ente = entecoformadores::FindOrfail($nis);

    $ente->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }



    }

}

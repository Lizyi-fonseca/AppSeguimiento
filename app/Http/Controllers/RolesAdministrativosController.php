<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles_administrativos;
use Illuminate\Support\Facades\DB;

class RolesAdministrativosController extends Controller
{
     public function index()
    {
        // Traer todos los registros de la tabla
        
        $roles = roles_administrativos::all();

        // Envia los datos a la vista
        return view('Roles_administrativos.index', compact('roles'));
    }

    public function create()
    {
        

        return view('Roles_administrativos.create');

    }

    public function store(Request $request){

        $request->validate([

        ],[

      'nis.required' => 'El código esta registrado',
      'descripcion.required' => 'La descirpción requerida'
      
        ]);

       //DB::beginTransaction();

        try {
            

        } catch (\Throwable $th) {
            

        }
    }

    public function destroy($nis){


    DB::beginTransaction();
    try {
       
    $rol = roles_administrativos::FindOrfail($nis);

    $rol->delete();

    DB::commit();

    return back()->with('success', 'Eliminado con exito');

    } catch (\Exception $e) {

    DB::rollBack();

      return back()->with('error', 'Erro al eliminar');
    }

    }

    
    public function edit($nis){

    $rol = roles_administrativos::FindOrfail($nis);

    return view('Roles_administrativos.edit', compact('rol'));

    
    }
     
     public function update(Request $request, $nis){

    $request->validate([
     'nis' => 'required'| 'numeric' | 'dixits_between:4,20',
     'descripcion' => 'required',
     

    ],[

      'nis.required' => 'El nis ya esta registrado',
      'denominacion.required' =>'La denominación es requerida'


    ]);


     try {

     $rol = roles_administrativos::FindOrfail($nis);

     $rol->update([
      'nis'=>$request['nis'],
      'descripcion'=>$request['descripcion']
     ]);

     return redirect()->route('Roles_administrativos.index')->with('success', 'Actualización exitosa');
      
     } catch (\Throwable $th) {
      
     return back()->with('error', 'Error al actualizar');
      
     } 
     }
    
    }

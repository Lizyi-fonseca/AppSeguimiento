<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\roles_administrativos;

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
        // También enviamos los roles si el select está en un formulario de creación
        $roles = roles_administrativos::all();

        return view('Roles_administrativos.create', compact('roles'));

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
}

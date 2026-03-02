<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{

    public function index()
    {
        $bit = bitacora::all();
        return view('Bitacoras.index', compact('bit'));
    }


    public function create()
    {
        return view('Bitacoras.create');
    }

    public function store(Request $request)
    {
        $request ->validate([
            'archivo' => 'required|mimes:pdf'
        ],
        [
            'archivo.required'  => 'El archivo es requerido',
            'archivo.mimes' => 'El archivo debe ser pdf'
        ]);

        
       
        $archivo = $request->file(['archivo']);

        $archivo_user = 'cam_'.$request['documento']. '_' . time() . '_' . '.'.$archivo->extension();

       $request->file('archivo')->move(public_path('/documento/bitacora/'), $archivo_user);

       

        try {
            
             bitacora::create([
                'archivo' => '/documento/bitacora/' . $archivo_user

             ]);

             return back();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
      

    }

    public function show(bitacora $bitacora)
    {
        
    
    }

    public function edit(bitacora $bitacora)
    {
    
    }


    public function update(Request $request, bitacora $bitacora)
    {
      
    }


    public function destroy(bitacora $bitacora)
    {
        
    }
}

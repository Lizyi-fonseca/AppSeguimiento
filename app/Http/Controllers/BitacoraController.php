<?php

namespace App\Http\Controllers;

use App\Mail\BitacoraCreate;
use App\Models\bitacora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BitacoraController extends Controller
{

    public function index()
    {
        $bit = bitacora::all();
        return view('bitacoras.index', compact('bit'));
    }


    public function create()
    {
        return view('bitacoras.create');
    }

    public function store(Request $request)
    {
        $usuraio = Auth::user();

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

             Mail::to($usuraio->email)->send(new BitacoraCreate($request->all(), $usuraio, $archivo_user));


             return back()->with('success', 'Archivo subido correctamente');
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


    public function destroy(bitacora $bitacora){
        
    }
}

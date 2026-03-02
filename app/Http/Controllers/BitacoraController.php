<?php

namespace App\Http\Controllers;

use App\Models\bitacora;
use Illuminate\Http\Request;

class BitacoraController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bit = bitacora::all();
        return view('Bitacoras.index', compact('bit'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Bitacoras.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function show(bitacora $bitacora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(bitacora $bitacora)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, bitacora $bitacora)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(bitacora $bitacora)
    {
        //
    }
}

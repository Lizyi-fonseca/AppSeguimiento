<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use Illuminate\Http\Request;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendiz = aprendices::with(['ficha', 'programa', 'eps'])->get();
        return view('Aprendices.index', compact('aprendiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Aprendices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nis' => 'required|numeric|unique:tblaprendices,nis',
            'numdoc' => 'required|numeric',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string|max:150',
            'telefono' => 'required|string|max:20',
            'correoint' => 'required|email',
            'correoprs' => 'nullable|email',
            'sexo' => 'required',
            'fechadn' => 'required|date',
        ]);

        aprendices::create($request->all());

        return redirect()->route('Aprendices.index')
            ->with('success', 'Aprendiz registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        return view('Aprendices.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        return view('Aprendices.edit', compact('aprendiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $aprendiz = aprendices::findOrFail($id);

        $request->validate([
            'numdoc' => 'required|numeric',
            'nombres' => 'required|string|max:100',
            'apellidos' => 'required|string|max:100',
            'direccion' => 'required|string|max:150',
            'telefono' => 'required|string|max:20',
            'correoint' => 'required|email',
            'correoprs' => 'nullable|email',
            'sexo' => 'required',
            'fechadn' => 'required|date',
        ]);

        $aprendiz->update($request->all());

        return redirect()->route('Aprendices.index')
            ->with('success', 'Aprendiz actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $aprendiz = aprendices::findOrFail($id);
        $aprendiz->delete();

        return redirect()->route('Aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente');
    }
}

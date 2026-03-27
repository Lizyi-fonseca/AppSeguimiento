<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\Eps;
use App\Models\fichadecaracterizacion;
use App\Models\tiposdocumento;
use Illuminate\Http\Request;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendiz = aprendices::with(['ficha', 'tiposdocumento', 'eps'])->get();
        return view('aprendices.index', compact('aprendiz'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tiposdocumento = tiposdocumento::all();
        $fichas = fichadecaracterizacion::all();
        $eps = Eps::all();

        return view('aprendices.create', compact('tiposdocumento', 'fichas', 'eps'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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
            'tbltipos_documentos_nis' => 'required|exists:tbltipos_documentos,nis',
            'tblfichasde_caracterizacion_nis' => 'required|exists:tblfichasde_caracterizacion,nis',
            'tbl_eps_nis' => 'required|exists:tbl_eps,nis'
        ]);
        aprendices::create($request->all());

        return redirect()->route('Aprendices.index')
            ->with('success', 'Aprendiz registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show($nis)
    {
        $aprendiz = aprendices::findOrFail($nis);
        return view('aprendices.show', compact('aprendiz'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($nis)
    {
        $aprendiz = aprendices::findOrFail($nis);
        return view('aprendices.edit', compact('aprendiz'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $nis)
    {
        $aprendiz = aprendices::findOrFail($nis);

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
            'tbltipos_documentos_nis' => 'required|exists:tbltipos_documentos,nis',
            'tblfichasde_caracterizacion_nis' => 'required|exists:tblfichasde_caracterizacion,nis',
            'tbl_eps_nis' => 'required|exists:tbl_eps,nis'
        ]);

        $aprendiz->update($request->all());

        return redirect()->route('aprendices.index')
            ->with('success', 'Aprendiz actualizado correctamente');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($nis)
    {
        $aprendiz = aprendices::findOrFail($nis);
        $aprendiz->delete();

        return redirect()->route('Aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente');
    }
}

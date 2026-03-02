<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\tipos_documentos;

class TiposDocumentosController extends Controller
{
    
public function index()
    {
        $tipos = tipos_documentos::all();

        return view('Tipos_documentos.index', compact('tipos'));
    }

}

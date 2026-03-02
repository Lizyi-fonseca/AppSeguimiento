<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eps;

class EpsController extends Controller
{
                public function index(){

                $eps = Eps::all();
                    return view('Eps.index', compact('eps'));
                    
                }

                public function create(){

                }
                public function store(){

                }
                public function edit(){

                }
                public function update(){

                }
                public function destroy(){

                }
}

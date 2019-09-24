<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function createProyecto(Request $request){
    	return view('admin.createProyecto');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyecto;
use App\Img;

class FrontController extends Controller
{
    public function index(){

    	return  Proyecto::with('Img')->get();
    }
}

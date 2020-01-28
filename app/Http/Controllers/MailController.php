<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\EnviarFormulario;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\App;


class MailController extends Controller
{

    protected $emailFormulario;
 

    function __construct(){

        $this->emailFormulario = 'mcd77.1990@gmail.com' ;        

    }
    

    public function enviarFormulario(Request $request){

          Mail::to($this->emailFormulario)->send(new EnviarFormulario($request));

          return json_encode("true");

    }
}

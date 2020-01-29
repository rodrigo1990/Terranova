<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class EnviarFormulario extends Mailable
{
    use Queueable, SerializesModels;

    public $consulta;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->consulta = $request;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    
 public function build()
    {
        return $this
                ->subject('Terranova - formulario de contacto')
                ->view('mails.EnviarFormulario');
    }
}
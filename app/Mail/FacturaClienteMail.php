<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class FacturaClienteMail extends Mailable
{
    use Queueable, SerializesModels;

    public $cliente;
    public $factura;
    public $pdf;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cliente, $factura, $pdf)
    {
        $this->cliente = $cliente;
        $this->factura = $factura;
        $this->pdf = $pdf;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Factura Cliente ' . $this->factura->numero)
                    ->view('emails.factura_cliente')
                    ->attachData($this->pdf->output(), 'factura_cliente_' . $this->factura->numero . '.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}

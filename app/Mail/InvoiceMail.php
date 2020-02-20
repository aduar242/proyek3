<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    public $invoice;

    public function __construct($invoice)
    {
        $this->invoice = $invoice;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        {
        return $this->from('tolewife@tolewifi.com')
                    ->view('email/email')
                    ->with(
                    [
                        'nama' => 'Diki Alfarabi Hadi',
                        'website' => 'www.malasngoding.com',
                    ])
                    ->attach(public_path('pdf').'/'.$this->invoice.'.pdf');
    }
    }
}

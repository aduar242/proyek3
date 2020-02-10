<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('tolewife@tolewifi.com')
                    ->view('email/email')
                    ->with([
                        'Test'=>'Juan Juliyanto',
                        'Website'=>'www.tolewifi.com'
                    ])
                    ->attach(public_path('/img').'/coba.png', [
                      'as' => 'coba.jpg',
                      'mime' => 'image/png',
                    ]);;
    }
}

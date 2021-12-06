<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitationMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $code;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email,$code)
    {
        $this->mailto = $email;
        $this->code = $code;
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $view_name = 'emails.invitation';
         $subject = '【ai-jewelly】ai-jewellyの運用の招待が届きました';


        return $this->text($view_name)
                    ->subject($subject)
                    ->with([
                        'email' => $this->email,
                        'code' => $this->code
                      ]);
    }
}
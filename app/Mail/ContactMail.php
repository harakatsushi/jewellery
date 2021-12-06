<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMail extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;
    protected $email;
    protected $detail;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$detail,$to)
    {
        $this->mailto = $to;
        $this->name = $name;
        $this->email = $email;
        $this->detail = $detail;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $view_name = 'emails.contact';
         $subject = '【ai-jewelly】お問合せありがとうございます。';
        if ($this->mailto == config('original.to_mail')) {
            $view_name = 'emails.contact_toadmin';
           $subject = '【ai-jewelly】お問合せがありました';
        } else {
           
        }

        return $this->text($view_name)
                    ->subject($subject)
                    ->with([
                        'name' => $this->name,
                        'detail' => $this->detail,
                        'email' => $this->email
                      ]);
    }
}
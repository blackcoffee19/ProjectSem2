<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Mail\ContactFormMail;

class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $title;
    public $email;
    public $phone;
    public $comments;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $title, $email, $phone, $comments)
    {
        $this->name = $name;
        $this->title = $title;
        $this->email = $email;
        $this->phone = $phone;
        $this->comments = $comments;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        
        return $this->view('user.pages.Contact.mail')
                    ->subject('New contact from website')
                    ->with([
                        'name' => $this->name,
                        'title' => $this->title,
                        'email' => $this->email,
                        'phone' => $this->phone,
                        'comments' => $this->comments,
                    ]);

            
    }
}

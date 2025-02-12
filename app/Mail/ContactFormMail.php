<?php

namespace App\Mail;

use App\Models\Contact;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactFormMail extends Mailable
{
    use SerializesModels;

    public function __construct(public Contact $contact)
    {
    }

    public function build()
    {
        return $this->markdown('emails.contact-form')
                    ->subject('New Contact Form Submission');
    }
}

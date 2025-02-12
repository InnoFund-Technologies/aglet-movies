<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\ContactFormMail;
use App\Http\Requests\ContactFormRequest;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function show()
    {
        return view('contact.form');
    }

    public function submit(ContactFormRequest $request)
    {
        // Create contact record
        $contact = Contact::create($request->validated());

        // Send email notification
        Mail::to(config('mail.admin_email'))->send(new ContactFormMail($contact));

        return back()->with('success', 'Thank you for your message. We will get back to you soon!');
    }
}

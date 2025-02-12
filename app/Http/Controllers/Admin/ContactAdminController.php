<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactAdminController extends Controller
{
    public function show(Contact $contact)
    {
        // Mark the message as read when viewed
        if ($contact->status === 'pending') {
            $contact->update(['status' => 'read']);
        }

        return view('admin.contacts.show', compact('contact'));
    }
}
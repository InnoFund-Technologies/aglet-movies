<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactUsRequest;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function create()
    {
        return view('contact.form');
    }

    public function store(StoreContactUsRequest $request)
    {
        ContactUs::create($request->validated());

        return redirect()->route('contact.create')
            ->with('status', 'Thank you! Your message has been sent successfully.');
    }
}

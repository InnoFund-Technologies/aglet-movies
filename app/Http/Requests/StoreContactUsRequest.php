<?php

namespace App\Http\Requests;

use App\Models\ContactUsModel;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreContactUsRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone_number' => 'nullable|numeric',
            'message' => 'required|string|min:10',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter your name',
            'email.required' => 'Please enter your email address',
            'email.email' => 'Please enter a valid email address',
            'phone_number.numeric' => 'Phone number must contain only numbers',
            'message.required' => 'Please enter your message',
            'message.min' => 'Message must be at least 10 characters',
        ];
    }
}

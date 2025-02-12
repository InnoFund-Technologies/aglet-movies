<?php

namespace App\Http\Controllers;

use App\Models\NewsletterSubscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscribers,email'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()->first()
            ], 422);
        }

        try {
            NewsletterSubscriber::create([
                'email' => $request->email
            ]);

            // Here you could also add integration with your email service provider
            // Example: Mail::to($request->email)->send(new WelcomeToNewsletter());

            return response()->json([
                'success' => true,
                'message' => 'Successfully subscribed to newsletter!'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Something went wrong. Please try again.'
            ], 500);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieInteractionController extends Controller
{
    public function __construct()
    {
        // Only these methods require authentication
        $this->middleware('auth')->only(['like', 'vote']);
    }

    public function like(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'movie_id' => 'required|integer'
        ]);

        // Your like logic here
        // Return response for AJAX handling
        return response()->json(['success' => true]);
    }

    public function vote(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'movie_id' => 'required|integer',
            'rating' => 'required|integer|min:1|max:10'
        ]);

        // Your voting logic here
        // Return response for AJAX handling
        return response()->json(['success' => true]);
    }
}
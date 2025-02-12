<?php

namespace App\Http\Controllers;

use App\Models\UserMovieInteraction;
use Illuminate\Http\Request;

class MovieActionController extends Controller
{
    public function toggleWatchlist(Request $request, $movieId)
    {
        $interaction = UserMovieInteraction::firstOrNew([
            'user_id' => $request->user()->id,
            'movie_id' => $movieId,
        ]);
        
        $interaction->in_watchlist = !$interaction->in_watchlist;
        $interaction->save();
        
        return response()->json(['status' => 'success']);
    }
    
    public function toggleLike(Request $request, $movieId)
    {
        $interaction = UserMovieInteraction::firstOrNew([
            'user_id' => $request->user()->id,
            'movie_id' => $movieId,
        ]);
        
        $interaction->is_liked = !$interaction->is_liked;
        $interaction->save();
        
        return response()->json(['status' => 'success']);
    }
    
    public function rate(Request $request, $movieId)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5'
        ]);
        
        $interaction = UserMovieInteraction::firstOrNew([
            'user_id' => $request->user()->id,
            'movie_id' => $movieId,
        ]);
        
        $interaction->rating = $request->rating;
        $interaction->save();
        
        return response()->json(['status' => 'success']);
    }
}
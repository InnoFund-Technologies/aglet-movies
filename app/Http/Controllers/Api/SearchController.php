<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->query('query');
        
        if (empty($query)) {
            return response()->json([]);
        }

        $response = Http::get('https://api.themoviedb.org/3/search/movie', [
            'api_key' => config('services.tmdb.token'),
            'query' => $query,
        ]);

        return response()->json($response->json()['results'] ?? []);
    }
}

<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    private TMDBService $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function search(Request $request)
    {
        $query = $request->get('query');
        
        if (empty($query)) {
            return response()->json(['results' => []]);
        }

        try {
            $results = $this->tmdbService->searchMovies($query);
            return response()->json([
                'results' => $results['results'] ?? []
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Search failed',
                'results' => []
            ], 500);
        }
    }
}
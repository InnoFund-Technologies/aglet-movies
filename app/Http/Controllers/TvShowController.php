<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;

class TVShowController extends Controller
{
    private TMDBService $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    // Existing show method remains the same

    public function getSeasonEpisodes($showId, $seasonNumber)
    {
        try {
            $response = $this->tmdbService->get("/tv/{$showId}/season/{$seasonNumber}");
            return response()->json($response);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Failed to fetch episodes'], 500);
        }
    }
}
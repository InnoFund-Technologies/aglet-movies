<?php
// app/Http/Controllers/HomeController.php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    private TMDBService $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        try {
            // Fetch all movie categories
            $trending = $this->tmdbService->getTrending();
            $popular = $this->tmdbService->getPopular();
            $upcoming = $this->tmdbService->getUpcoming();
            $nowPlaying = $this->tmdbService->getNowPlaying();
            $topRated = $this->tmdbService->getTopRated();

            // Return view with all movie data
            return view('home', [
                'trending' => $trending['results'] ?? [],
                'popular' => $popular['results'] ?? [],
                'upcoming' => $upcoming['results'] ?? [],
                'nowPlaying' => $nowPlaying['results'] ?? [],
                'topRated' => $topRated['results'] ?? [],
            ]);
        } catch (\Exception $e) {
            // Handle any API errors gracefully
            report($e); // Log the error
            return view('home', [
                'trending' => [],
                'popular' => [],
                'upcoming' => [],
                'nowPlaying' => [],
                'topRated' => [],
                'error' => 'Unable to fetch movies at this time.'
            ]);
        }
    }
}
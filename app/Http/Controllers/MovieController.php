<?php

// Controller
namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class MovieController extends Controller
{
    private TMDBService $tmdbService;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index()
    {
        $movies = $this->tmdbService->getNowPlaying();
        
        return view('movies.index', [
            'movies' => $movies['results']
        ]);
    }

    public function show($id)
    {
        $movie = $this->tmdbService->getMovie($id);
        
        return view('movies.show', [
            'movie' => $movie
        ]);
    }

    public function search(Request $request)
    {
        $movies = $this->tmdbService->searchMovies($request->get('query'));
        
        return view('movies.search', [
            'movies' => $movies['results']
        ]);
    }
}
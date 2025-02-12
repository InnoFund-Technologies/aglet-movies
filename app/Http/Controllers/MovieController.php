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
        $movie = $this->tmdbService->getMovie(id: $id);
        $related = $this->tmdbService->getRelated(movieId: $id);

        return view('show', [
            'movie' => $movie,
            'related' => $related['results']
        ]);
    }

    public function movies()
    {
        $movies = $this->tmdbService->getPopular();

        return view('movies', [
            'movies' => $movies['results']
        ]);
    }

    public function search(Request $request)
    {
        $movies = $this->tmdbService->searchMovies($request->get('query'));

        return view('search', [
            'movies' => $movies['results']
        ]);
    }
}

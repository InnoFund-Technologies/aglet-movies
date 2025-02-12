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

    public function index(Request $request)
    {
        // For non-Livewire version
        $filters = $request->only(['category', 'rating', 'year', 'sort', 'quality']);
        $movies = $this->tmdbService->getFilteredMovies($filters);
    
        return view('movies', [
            'movies' => $movies['results'],
            'categories' => ['All', 'Action', 'Drama', 'Comedy', 'Horror'],
            'ratings' => ['All', '1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            'years' => ['All', ...range(date('Y'), 2000)],
            'sortOptions' => [
                'popularity.desc' => 'Popularity',
                'vote_average.desc' => 'Rating',
                'primary_release_date.desc' => 'Newest'
            ],
            'qualities' => ['All', 'HD', '4K']
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
 

    public function search(Request $request)
    {
        $movies = $this->tmdbService->searchMovies($request->get('query'));

        return view('search', [
            'movies' => $movies['results']
        ]);
    }
}

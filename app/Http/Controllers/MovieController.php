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
        $page = $request->get(key: 'page', default: 1);
        $filters = $request->only(keys: ['category', 'rating', 'year', 'sort', 'quality']);
        $response = $this->tmdbService->getFilteredMovies(filters: $filters, page: $page);

        return view(view: 'movies', data: [
            'movies' => $response['results'],
            'categories' => ['All', 'Action', 'Drama', 'Comedy', 'Horror'],
            'ratings' => ['All', '1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            'years' => ['All', ...range(start: date(format: 'Y'), end: 2000)],
            'sortOptions' => [
                'popularity.desc' => 'Popularity',
                'vote_average.desc' => 'Rating',
                'primary_release_date.desc' => 'Newest'
            ],
            'qualities' => ['All', 'HD', '4K'],
            'currentPage' => $response['page'],
            'totalPages' => $response['total_pages'],
            'totalResults' => $response['total_results']
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

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
        // Get the requested page, defaulting to 1
        $page = $request->get(key: 'page', default: 1);

        // Get the filters from the request
        $filters = $request->only(keys: ['category', 'rating', 'year', 'sort', 'quality']);

        // Get the response from the TMDB service
        $response = $this->tmdbService->getFilteredMovies(filters: $filters, page: $page);

        // Check if the response is valid and contains results
        if (!isset($response['results']) || !is_array($response['results'])) {
            // If we're requesting a page that's too high, redirect to the last valid page
            if (isset($response['total_pages']) && $page > $response['total_pages']) {
                return redirect()->route('movies.index', [
                    'page' => $response['total_pages'],
                    ...$filters
                ]);
            }

            // If there's some other issue, default to empty results
            $response['results'] = [];
        }

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
            'currentPage' => $response['page'] ?? 1,
            'totalPages' => $response['total_pages'] ?? 1,
            'totalResults' => $response['total_results'] ?? 0
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

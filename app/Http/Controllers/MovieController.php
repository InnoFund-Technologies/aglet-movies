<?php

// Controller
namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Models\UserMovieInteraction;

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
        $page = $request->get('page', 1);

        // Get the filters from the request
        $filters = $request->only(['category', 'rating', 'year', 'sort', 'quality']);

        // Determine the current route name
        $routeName = $request->route()->getName();

        $isTvShows = $routeName === 'tv-shows.index';

        // Fetch data based on the route
        $response = $isTvShows ?
            $this->tmdbService->getFilteredTVShows(filters: $filters, page: $page)
            : $this->tmdbService->getFilteredMovies(filters: $filters, page: $page);


        // Check if the response is valid and contains results
        if (!isset($response['results']) || !is_array($response['results'])) {
            // Redirect to the last valid page if needed
            if (isset($response['total_pages']) && $page > $response['total_pages']) {
                return redirect()->route($routeName, [ // Use dynamic route name
                    'page' => $response['total_pages'],
                    ...$filters
                ]);
            }

            // Default to empty results if there's an issue
            $response['results'] = [];
        }

        // Pass data to the view
        return view($isTvShows ?  'tv-shows.index' : 'movies.index', [
            'response' => $response['results'],
            'categories' => ['All', 'Action', 'Drama', 'Comedy', 'Horror'],
            'ratings' => ['All', '1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            'years' => ['All', ...range(date('Y'), 2000)],
            'sortOptions' => [
                'popularity.desc' => 'Popularity',
                'vote_average.desc' => 'Rating',
                'primary_release_date.desc' => 'Newest'
            ],
            'qualities' => ['All', 'HD', '4K'],
            'currentPage' => $response['page'] ?? 1,
            'totalPages' => $response['total_pages'] ?? 1,
            'totalResults' => $response['total_results'] ?? 0,
        ]);
    }

    public function showMovie($id)
    {
        $movie = $this->tmdbService->getMovie(id: $id);
        $related = $this->tmdbService->getRelated(movieId: $id);

        // $userInteraction = null;
        // if (auth()->check()) {
        //     $userInteraction = UserMovieInteraction::where('user_id', auth()->id())
        //         ->where('movie_id', $id)
        //         ->first();
        // }


        return view('movies.show', [
            'movie' => $movie,
            'related' => $related['results']
        ]);
    }

    public function showTvShow($id)
    {
        $show = $this->tmdbService->getTVShow($id);
        $related = $this->tmdbService->getRelatedTVShows($id);

        return view('tv-shows.show', [
            'tvShow' => $show,
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

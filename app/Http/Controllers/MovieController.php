<?php

// Controller
namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use App\Models\UserMovieInteraction;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    private TMDBService $tmdbService;
    public bool $isAuth;

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
        // Apply auth middleware only to interaction methods
        // Apply auth middleware to protected methods
        // $this->middleware('auth')->only([
        //     'toggleLike',
        //     'rate',
        //     'toggleWatchlist',
        //     'getWatchlist',
        //     'getLikedMovies',
        //     'getRatedMovies'
        // ]);
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

        $userInteraction = null;
        if (Auth::check()) {
            $userInteraction = UserMovieInteraction::where('user_id', auth()->id())
                ->where('movie_id', $id)
                ->first();
        }

        return view('movies.show', [
            'movie' => $movie,
            'related' => $related['results'],
            'userInteraction' => $userInteraction
        ]);
    }

    public function showTvShow($id)
    {
        $show = $this->tmdbService->getTVShow($id);
        $related = $this->tmdbService->getRelatedTVShows($id);

        $userInteraction = null;
        if (Auth::check()) {
            $userInteraction = UserMovieInteraction::where('user_id', auth()->id())
                ->where('movie_id', $id)
                ->where('type', 'tv')
                ->first();
        }

        return view('tv-shows.show', [
            'tvShow' => $show,
            'related' => $related['results'],
            'userInteraction' => $userInteraction
        ]);
    }

    public function toggleLike(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|string',
            'type' => 'required|in:movie,tv'
        ]);

        $interaction = UserMovieInteraction::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'movie_id' => $validated['movie_id'],
                'type' => $validated['type']
            ],
            ['is_liked' => \DB::raw('NOT is_liked')]
        );

        return response()->json([
            'status' => 'success',
            'is_liked' => $interaction->is_liked
        ]);
    }

    public function rate(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|string',
            'type' => 'required|in:movie,tv',
            'rating' => 'required|integer|between:1,5'
        ]);

        $interaction = UserMovieInteraction::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'movie_id' => $validated['movie_id'],
                'type' => $validated['type']
            ],
            ['rating' => $validated['rating']]
        );

        return response()->json([
            'status' => 'success',
            'rating' => $interaction->rating
        ]);
    }

    public function toggleWatchlist(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|string',
            'type' => 'required|in:movie,tv'
        ]);

        $interaction = UserMovieInteraction::updateOrCreate(
            [
                'user_id' => auth()->id(),
                'movie_id' => $validated['movie_id'],
                'type' => $validated['type']
            ],
            ['in_watchlist' => \DB::raw('NOT in_watchlist')]
        );

        return response()->json([
            'status' => 'success',
            'in_watchlist' => $interaction->in_watchlist
        ]);
    }

    public function getWatchlist()
    {
        $watchlistItems = UserMovieInteraction::with('media')
            ->where('user_id', auth()->id())
            ->where('in_watchlist', true)
            ->get();

        $media = [];
        foreach ($watchlistItems as $item) {
            try {
                $mediaData = $item->type === 'movie' 
                    ? $this->tmdbService->getMovie($item->movie_id)
                    : $this->tmdbService->getTVShow($item->movie_id);
                
                $mediaData['type'] = $item->type;
                $media[] = $mediaData;
            } catch (\Exception $e) {
                continue;
            }
        }

        return view('movies.watchlist', ['media' => $media]);
    }

    public function getLikedMovies()
    {
        $likedItems = UserMovieInteraction::where('user_id', auth()->id())
            ->where('is_liked', true)
            ->get();

        $media = [];
        foreach ($likedItems as $item) {
            try {
                $mediaData = $item->type === 'movie' 
                    ? $this->tmdbService->getMovie($item->movie_id)
                    : $this->tmdbService->getTVShow($item->movie_id);
                
                $mediaData['type'] = $item->type;
                $media[] = $mediaData;
            } catch (\Exception $e) {
                continue;
            }
        }

        return view('movies.liked', ['media' => $media]);
    }

    public function getRatedMovies()
    {
        $ratedItems = UserMovieInteraction::where('user_id', auth()->id())
            ->whereNotNull('rating')
            ->get();

        $media = [];
        foreach ($ratedItems as $item) {
            try {
                $mediaData = $item->type === 'movie' 
                    ? $this->tmdbService->getMovie($item->movie_id)
                    : $this->tmdbService->getTVShow($item->movie_id);
                
                $mediaData['user_rating'] = $item->rating;
                $mediaData['type'] = $item->type;
                $media[] = $mediaData;
            } catch (\Exception $e) {
                continue;
            }
        }

        return view('movies.rated', ['media' => $media]);
    }
    public function search(Request $request)
    {
        $movies = $this->tmdbService->searchMovies($request->get('query'));

        return view('search', [
            'movies' => $movies['results']
        ]);
    }
}

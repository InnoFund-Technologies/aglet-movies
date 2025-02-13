<?php

// Controller
namespace App\Http\Controllers;

use App\Models\Favourites;
use App\Services\TMDBService;
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MovieController extends Controller
{
    private TMDBService $tmdbService;
    public bool $isAuth;

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

        $isTvShows = $routeName === 'favourites.index';

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
        return view($isTvShows ?  'favourites.index' : 'home', [
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

   

        return view('movies.show', [
            'movie' => $movie,
            'related' => $related['results'], 
        ]);
    }

    public function showTvShow($id)
    {
        $show = $this->tmdbService->getTVShow($id);
        $related = $this->tmdbService->getRelatedTVShows($id);

            return view('tv-shows.show', [
            'tvShow' => $show,
            'related' => $related['results'], 
        ]);
    }

    public function toggleLike(Request $request)
    {
        $validated = $request->validate([
            'movie_id' => 'required|string',
            'type' => 'required|in:movie,tv'
        ]);

        $interaction = Favourites::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'movie_id' => $validated['movie_id'],
                'type' => $validated['type']
            ],
            ['is_liked' => DB::raw('NOT is_liked')]
        );

        return response()->json([
            'status' => 'success',
            'is_liked' => $interaction->is_liked
        ]);
    }

 
    public function getFavourites()
    {
        $likedItems = Favourites::where('user_id', Auth::id())
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
 
}

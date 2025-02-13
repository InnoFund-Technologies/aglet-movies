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

    public function __construct(TMDBService $tmdbService)
    {
        $this->tmdbService = $tmdbService;
    }

    public function index(Request $request)
    {
        // Get the requested page, defaulting to 1
        $page = $request->get('page', 1);


        // Determine the current route name
        $routeName = $request->route()->getName();


        // Fetch data based on the route
        $response =  $this->tmdbService->getPaginatedMovies(page: $page);

        // Check if the response is valid and contains results
        if (!isset($response['results']) || !is_array($response['results'])) {
            // Redirect to the last valid page if needed
            if (isset($response['total_pages']) && $page > $response['total_pages']) {
                return redirect()->route($routeName, [ // Use dynamic route name
                    'page' => $response['total_pages'], 
                ]);
            }

            // Default to empty results if there's an issue
            $response['results'] = [];
        }

        // Pass data to the view
        return view('home', [
            'response' => $response['results'],
            'currentPage' => $response['page'] ?? 1,
            'totalPages' => $response['total_pages'] ?? 1,
            'totalResults' => $response['total_results'] ?? 0,
        ]);
    }

    public function showMovie($id)
    {
        $movie = $this->tmdbService->getMovie(id: $id);

        return view('movies.show', [
            'movie' => $movie,
        ]);
    }

    public function addToFavourites(Request $request)
    {
        if (empty($request->user())) {
            $request->session()->put('url.intended', '/');
            return response()->json([
                'status' => 'redirect',
                'url' => route('login')
            ]);
        }

        $validated = $request->validate([
            'id' => 'required|numeric',
        ]);

        $favourites = Favourites::updateOrCreate(
            [
                'user_id' => Auth::id(),
                'movie_id' => $validated['id'],
            ],
        );

        return response()->json([
            'status' => 'success',
            'favourites' => $favourites
        ]);
    }
}

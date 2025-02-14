<?php

namespace App\Http\Controllers;

use App\Models\Favourites;
use Illuminate\Support\Facades\Auth;
use App\Services\TMDBService;
use Illuminate\Http\Request; 

class FavouritesController extends Controller
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
 
        $favourite_ids = $request->user()->favourites()->pluck('movie_id')->toArray();

        // Fetch data based on the route
        $response =  $this->tmdbService->getFavourites($favourite_ids, $page);

        // Pass data to the view
        return view('favourites.index', [
            'response' => $response['results'],
            'currentPage' => $response['page'] ?? 1,
            'totalPages' => $response['total_pages'] ?? 1,
            'totalResults' => $response['total_results'] ?? 0,
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

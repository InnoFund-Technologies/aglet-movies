<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class FavouritesController extends Controller implements HasMiddleware
{
    private TMDBService $tmdbService;

    public static function middleware(){
        return ["auth"];
    }

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

        $isTvShows = $routeName === 'favourites.index';

        $favourite_ids = $request->user()->favourites()->pluck('movie_id')->toArray();

        // Fetch data based on the route
        $response =  $this->tmdbService->getFavourites($favourite_ids, $page);    

        // Pass data to the view
        return view($isTvShows ?  'favourites.index' : 'home', [
            'response' => $response['results'], 
            'currentPage' => $response['page'] ?? 1,
            'totalPages' => $response['total_pages'] ?? 1,
            'totalResults' => $response['total_results'] ?? 0,
        ]);
    }
}

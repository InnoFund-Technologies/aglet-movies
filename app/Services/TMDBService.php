<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TMDBService
{
    private string $baseUrl;
    private string $apiKey;
    private int $cacheTime = 3600; // Cache for 1 hour
    private int $itemsPerPage = 9; // Display 9 movies per page
    private int $totalMovies = 45; // Total movies to display

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.key');
        $this->baseUrl = config('services.tmdb.url');
    }

    public function getMovie($id)
    {
        return $this->get("/movie/{$id}");
    }
 

    public function getPaginatedMovies(int $page = 1)
    {
        // Calculate the TMDB API page needed based on our custom pagination
        $tmdbPage = ceil(($page * $this->itemsPerPage) / 20); // TMDB provides 20 results per page
        $params['page'] = $tmdbPage;
        $endpoint = '/discover/movie';

        // Get results from TMDB
        $response = $this->get($endpoint, $params);
        $allResults = $response['results'];

        // If we need more results to fill our page
        if (count($allResults) < $this->itemsPerPage && $response['total_pages'] > $tmdbPage) {
            $params['page'] = $tmdbPage + 1;
            $nextPage = $this->get($endpoint, $params);
            $allResults = array_merge($allResults, $nextPage['results']);
        }

        // Calculate the offset for our custom pagination
        $offset = ($page - 1) * $this->itemsPerPage % 20;

        // Slice the results to get exactly 9 items
        $paginatedResults = array_slice($allResults, $offset, $this->itemsPerPage);

        // Calculate total pages based on our requirements
        $totalPages = ceil($this->totalMovies / $this->itemsPerPage);

        $cacheKey = 'pagination.' .  ".page{$page}";
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($paginatedResults, $page, $totalPages, $response) {
            return [
                'results' => $paginatedResults,
                'page' => $page,
                'total_pages' => $totalPages,
                'total_results' => min($response['total_results'], $this->totalMovies)
            ];
        });
    }
 
    public function get($endpoint, array $params = [])
    {
        return Http::get("{$this->baseUrl}{$endpoint}", array_merge([
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ], $params))->json();
    }
  

    public function getFavourites(array $favouriteIds, int $page = 1)
    {
        $cacheKey = 'favourites.' . md5(serialize($favouriteIds)) . ".page{$page}";
    
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($favouriteIds, $page) {
            $itemsPerPage = $this->itemsPerPage;
            $offset = ($page - 1) * $itemsPerPage;
            $paginatedIds = array_slice($favouriteIds, $offset, $itemsPerPage);
    
            $favourites = array_map(function ($id) {
                return $this->get("/movie/{$id}"); // Change `/movie/` to `/tv/` if handling TV shows
            }, $paginatedIds);
    
            return [
                'results' => $favourites,
                'page' => $page,
                'total_pages' => ceil(count($favouriteIds) / $itemsPerPage),
                'total_results' => count($favouriteIds)
            ];
        });
    }
    
  
}

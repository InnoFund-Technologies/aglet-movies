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

    public function searchMovies($query)
    {
        return $this->get('/search/movie', [
            'query' => $query
        ]);
    }

    public function getPaginatedMovies($endpoint, array $params = [], int $page = 1)
    {
        // Calculate the TMDB API page needed based on our custom pagination
        $tmdbPage = ceil(($page * $this->itemsPerPage) / 20); // TMDB provides 20 results per page
        $params['page'] = $tmdbPage;

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

        return [
            'results' => $paginatedResults,
            'page' => $page,
            'total_pages' => $totalPages,
            'total_results' => min($response['total_results'], $this->totalMovies)
        ];
    }

    public function getPopular($page = 1)
    {
        return Cache::remember("movies.popular.page{$page}", $this->cacheTime, function () use ($page) {
            return $this->getPaginatedMovies('/movie/popular', [], $page);
        });
    }

    public function getRelated($movieId)
    {
        return Cache::remember("movies.related.{$movieId}", $this->cacheTime, function () use ($movieId) {
            return $this->get("/movie/{$movieId}/similar");
        });
    }

    public function get($endpoint, array $params = [])
    {
        return Http::get("{$this->baseUrl}{$endpoint}", array_merge([
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ], $params))->json();
    }

    public function getFilteredMovies(array $filters, int $page = 1)
    {
        $params = [];

        // Genre Filter
        if (!empty($filters['category'])) {
            $params['with_genres'] = $this->getGenreId($filters['category']);
        }

        // Year Filter
        if (!empty($filters['year'])) {
            $params['primary_release_year'] = $filters['year'];
        }

        // Rating Filter
        if (!empty($filters['rating'])) {
            $params['vote_average.gte'] = (float) $filters['rating'] * 2;
        }

        // Sorting
        if (!empty($filters['sort'])) {
            $params['sort_by'] = $filters['sort'];
        }

        $cacheKey = 'movies.filtered.' . md5(serialize($filters)) . ".page{$page}";
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($params, $page) {
            return $this->getPaginatedMovies('/discover/movie', $params, $page);
        });
    }

    private function getGenreId(string $categoryName): ?int
    {
        $genreMap = [
            'Action' => 28,
            'Adventure' => 12,
            'Animation' => 16,
            'Comedy' => 35,
            'Crime' => 80,
            'Drama' => 18,
            'Family' => 10751,
            'Fantasy' => 14,
            'History' => 36,
            'Horror' => 27,
            'Music' => 10402,
            'Mystery' => 9648,
            'Romance' => 10749,
            'Science Fiction' => 878,
            'TV Movie' => 10770,
            'Thriller' => 53,
            'War' => 10752,
            'Western' => 37,
        ];

        return $genreMap[$categoryName] ?? null;
    }

    public function getTVShow($id)
    {
        return $this->get("/tv/{$id}");
    }

    public function getRelatedTVShows($tvId)
    {
        return Cache::remember("tv.related.{$tvId}", $this->cacheTime, function () use ($tvId) {
            return $this->get("/tv/{$tvId}/similar");
        });
    }

    public function getFilteredTVShows(array $filters, int $page = 1)
    {
        $params = ['page' => $page];

        // Genre Filter
        if (!empty($filters['category']) && $filters['category'] !== 'All') {
            $params['with_genres'] = $this->getTVGenreId($filters['category']);
        }

        // Year Filter
        if (!empty($filters['year']) && $filters['year'] !== 'All') {
            $params['first_air_date_year'] = $filters['year'];
        }

        // Rating Filter (Convert stars to vote average)
        if (!empty($filters['rating']) && $filters['rating'] !== 'All') {
            $starRating = (int) substr($filters['rating'], 0, 1);
            $params['vote_average.gte'] = $starRating * 2;
        }

        // Sorting
        if (!empty($filters['sort'])) {
            $params['sort_by'] = $filters['sort'];
        }

        $cacheKey = 'tv.filtered.' . md5(serialize($filters)) . ".page{$page}";
        return Cache::remember($cacheKey, $this->cacheTime, function () use ($params, $page) {
            return $this->getPaginatedMovies('/discover/tv', $params, $page);
        });
    }

    private function getTVGenreId(string $categoryName): ?int
    {
        $genreMap = [
            'Action & Adventure' => 10759,
            'Animation' => 16,
            'Comedy' => 35,
            'Crime' => 80,
            'Documentary' => 99,
            'Drama' => 18,
            'Family' => 10751,
            'Kids' => 10762,
            'Mystery' => 9648,
            'News' => 10763,
            'Reality' => 10764,
            'Sci-Fi & Fantasy' => 10765,
            'Soap' => 10766,
            'Talk' => 10767,
            'War & Politics' => 10768,
            'Western' => 37
        ];

        return $genreMap[$categoryName] ?? null;
    }
}

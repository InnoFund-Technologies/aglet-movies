<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class TMDBService
{
    private string $baseUrl = 'https://api.themoviedb.org/3';
    private string $apiKey;
    private int $cacheTime = 3600; // Cache for 1 hour

    public function __construct()
    {
        $this->apiKey = config('services.tmdb.key');
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

    public function getTrending()
    {
        return Cache::remember('movies.trending', $this->cacheTime, function () {
            return $this->get('/trending/movie/week');
        });
    }

    public function getPopular()
    {
        return Cache::remember('movies.popular', $this->cacheTime, function () {
            return $this->get('/movie/popular');
        });
    }

    public function getUpcoming()
    {
        return Cache::remember('movies.upcoming', $this->cacheTime, function () {
            return $this->get('/movie/upcoming');
        });
    }

    public function getNowPlaying()
    {
        return Cache::remember('movies.now_playing', $this->cacheTime, function () {
            return $this->get('/movie/now_playing');
        });
    }

    public function getTopRated()
    {
        return Cache::remember('movies.top_rated', $this->cacheTime, function () {
            return $this->get('/movie/top_rated');
        });
    }

    public function getMoviesByGenre($genreId)
    {
        return Cache::remember("movies.genre.{$genreId}", $this->cacheTime, function () use ($genreId) {
            return $this->get('/discover/movie', [
                'with_genres' => $genreId
            ]);
        });
    }

    public function getRelated($movieId)
    {
        return Cache::remember("movies.related.{$movieId}", $this->cacheTime, function () use ($movieId) {
            return $this->get("/movie/{$movieId}/similar");
        });
    }

    private function get($endpoint, array $params = [])
    {
        return Http::get("{$this->baseUrl}{$endpoint}", array_merge([
            'api_key' => $this->apiKey,
            'language' => 'en-US',
        ], $params))->json();
    }

    public function getFilteredMovies(array $filters)
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

        // Rating Filter (Convert stars to vote average)
        if (!empty($filters['rating'])) {
            $params['vote_average.gte'] = (float) $filters['rating'] * 2;
        }

        // Sorting
        if (!empty($filters['sort'])) {
            $params['sort_by'] = $filters['sort'];
        }

        $response = $this->get('/discover/movie', $params);

        // Client-side quality filtering (example)
        if (!empty($filters['quality'])) {
            $response['results'] = array_filter($response['results'], function ($movie) use ($filters) {
                return $this->hasQuality($movie, $filters['quality']);
            });
        }

        return $response;
    }

    private function hasQuality($movie, $quality)
    {
        // Implement your quality check logic here
        // This is just an example - TMDB doesn't provide quality info
        return rand(0, 1); // Replace with real implementation
    }

    private function getGenreId(string $categoryName): ?int
    {
        // You should cache this mapping
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
}

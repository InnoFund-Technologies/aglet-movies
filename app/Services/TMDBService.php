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
}

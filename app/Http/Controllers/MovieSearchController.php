<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MovieSearchController extends Controller
{
    private string $baseUrl;

    public function search(Request $request)
    {
        $query = $request->input('query');
        $this->baseUrl = config('services.tmdb.url');

        if (empty($query)) {
            return response()->json(['results' => []]);
        }

        try {
            $response = Http::get("{$this->baseUrl}/search/movie", [
                'api_key' => config('services.tmdb.key'),
                'language' => 'en-US',
                'query' => $query,
                'include_adult' => false,
            ]);

            return response()->json($response->json());
        } catch (\Exception $e) {
            return response()->json(['error' => 'Search failed'], 500);
        }
    }
}

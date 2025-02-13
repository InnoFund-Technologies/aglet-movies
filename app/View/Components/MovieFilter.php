<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieFilter extends Component
{
    public $filters = [
        'category' => '',
        'rating' => '',
        'year' => '',
        'sort' => 'popularity.desc',
        'quality' => ''
    ];

    protected $rules = [
        'filters.category' => 'sometimes|string',
        'filters.rating' => 'sometimes|numeric',
        'filters.year' => 'sometimes|digits:4',
        'filters.sort' => 'sometimes|string',
        'filters.quality' => 'sometimes|string'
    ];

    public function render()
    {
        return view('components.movie-filter', [
            'movies' => $movies['results'] ?? [],
            'categories' => ['All', 'Action', 'Drama', 'Comedy', 'Horror'], // Match genreMap keys
            'ratings' => ['All', '1 Star', '2 Stars', '3 Stars', '4 Stars', '5 Stars'],
            'years' => ['All', ...range(date('Y'), 2000)],
            'sortOptions' => [
                'popularity.desc' => 'Popularity Desc',
                'vote_average.desc' => 'Rating Desc',
                'primary_release_date.desc' => 'Newest First',
                'revenue.desc' => 'Box Office'
            ],
            'qualities' => ['All', 'HD', '4K']
        ]);
    }
}
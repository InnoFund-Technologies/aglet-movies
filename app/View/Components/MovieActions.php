<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MovieActions extends Component
{
    public function __construct(
        public array $movie,
        public ?float $userRating = null,
        public bool $isInWatchlist = false,
        public bool $isLiked = false
    ) {}

    public function render()
    {
        return view('components.movie-actions');
    }
}
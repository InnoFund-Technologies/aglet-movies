<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class MediaCard extends Component
{
    public function __construct( 
        public int $movie_id
    ) {}
    /**
     * Get the view / contents that represents the component.
     */
    public function render(): View
    {
        return view('components.media-card', [
            'movie_id' => $this->movie_id ?? '',
        ]);
    }
}

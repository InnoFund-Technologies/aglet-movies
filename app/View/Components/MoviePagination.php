<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MoviePagination extends Component
{
    public function __construct(
        public int $currentPage,
        public int $totalPages,
        public int $totalResults,
        public string $baseUrl
    ) {}

    public function render()
    {
        return view('components.movie-pagination');
    }

    // Helper method to determine the range of pages to show
    public function getPageRange(): array
    {
        $range = 2; // Show 2 pages before and after current page
        $start = max(1, $this->currentPage - $range);
        $end = min($this->totalPages, $this->currentPage + $range);

        return range($start, $end);
    }

    // Helper method to determine if we should show the "..." separator
    public function shouldShowLeftDots(): bool
    {
        return min($this->getPageRange()) > 2;
    }

    public function shouldShowRightDots(): bool
    {
        return max($this->getPageRange()) < ($this->totalPages - 1);
    }
}
{{-- resources/views/components/movie-pagination.blade.php --}}
<div class="flex items-center justify-between px-4 py-3 sm:px-6">
    {{-- Mobile view --}}
    <div class="flex flex-1 justify-between sm:hidden">
        <a
            href="{{ $baseUrl . '?page=' . ($currentPage - 1) }}"
            class="relative inline-flex items-center px-4 py-2 text-sm font-medium {{ $currentPage <= 1 ? 'bg-gray-700 text-gray-500 cursor-not-allowed' : 'bg-gray-800 text-white hover:bg-gray-700' }} rounded-md"
            {{ $currentPage <= 1 ? 'disabled' : '' }}>
            Previous
        </a>
        <a
            href="{{ $baseUrl . '?page=' . ($currentPage + 1) }}"
            class="relative ml-3 inline-flex items-center px-4 py-2 text-sm font-medium {{ $currentPage >= $totalPages ? 'bg-gray-700 text-gray-500 cursor-not-allowed' : 'bg-gray-800 text-white hover:bg-gray-700' }} rounded-md"
            {{ $currentPage >= $totalPages ? 'disabled' : '' }}>
            Next
        </a>
    </div>

    {{-- Desktop view --}}
    <div class="hidden sm:flex sm:flex-1 sm:items-center sm:justify-between">
        <div>
            <p class="text-sm text-gray-400">
                Showing page <span class="font-medium">{{ $currentPage }}</span> of <span class="font-medium">{{ $totalPages }}</span> ({{ $totalResults }} total results)
            </p>
        </div>
        <div>
            <nav class="isolate inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
                {{-- Previous page link --}}
                <a
                    href="{{ $baseUrl . '?page=' . ($currentPage - 1) }}"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 {{ $currentPage <= 1 ? 'bg-gray-700 text-gray-500 cursor-not-allowed' : 'bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                    {{ $currentPage <= 1 ? 'disabled' : '' }}>
                    <span class="sr-only">Previous</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M12.79 5.23a.75.75 0 01-.02 1.06L8.832 10l3.938 3.71a.75.75 0 11-1.04 1.08l-4.5-4.25a.75.75 0 010-1.08l4.5-4.25a.75.75 0 011.06.02z" clip-rule="evenodd" />
                    </svg>
                </a>

                {{-- First page --}}
                @if(min($getPageRange()) > 1)
                <a href="{{ $baseUrl . '?page=1' }}" class="relative inline-flex items-center px-4 py-2 text-sm font-semibold {{ $currentPage === 1 ? 'bg-gray-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    1
                </a>
                @endif

                {{-- Left dots --}}
                @if($shouldShowLeftDots())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-800">
                    ...
                </span>
                @endif

                {{-- Page numbers --}}
                @foreach($getPageRange() as $page)
                <a
                    href="{{ $baseUrl . '?page=' . $page }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold {{ $currentPage === $page ? 'bg-gray-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    {{ $page }}
                </a>
                @endforeach

                {{-- Right dots --}}
                @if($shouldShowRightDots())
                <span class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-400 bg-gray-800">
                    ...
                </span>
                @endif

                {{-- Last page --}}
                @if(max($getPageRange()) < $totalPages)
                    <a
                    href="{{ $baseUrl . '?page=' . $totalPages }}"
                    class="relative inline-flex items-center px-4 py-2 text-sm font-semibold {{ $currentPage === $totalPages ? 'bg-gray-600 text-white' : 'bg-gray-800 text-gray-400 hover:bg-gray-700' }}">
                    {{ $totalPages }}
                </>
                @endif

                {{-- Next page link --}}
                <a
                    href="{{ $baseUrl . '?page=' . ($currentPage + 1) }}"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 {{ $currentPage >= $totalPages ? 'bg-gray-700 text-gray-500 cursor-not-allowed' : 'bg-gray-800 text-gray-400 hover:bg-gray-700 hover:text-white' }}"
                    {{ $currentPage >= $totalPages ? 'disabled' : '' }}>
                    <span class="sr-only">Next</span>
                    <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                        <path fill-rule="evenodd" d="M7.21 14.77a.75.75 0 01.02-1.06L11.168 10 7.23 6.29a.75.75 0 111.04-1.08l4.5 4.25a.75.75 0 010 1.08l-4.5 4.25a.75.75 0 01-1.06-.02z" clip-rule="evenodd" />
                    </svg>
                </a>
            </nav>
        </div>
    </div>
</div>
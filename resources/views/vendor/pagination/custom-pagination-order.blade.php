@if ($paginator->hasPages())
<div class="">

    <!-- Paginator for Previous Page -->
    @if ($paginator->onFirstPage())
    <div class="bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        Prev
    </div>
    @else
        <a href="{{ $paginator->previousPageUrl() . '&' . http_build_query([
            'per_page' => session('order_per_page', 5), 
            'search' => session('order_search', '')
            ]) }}" rel="prev" aria-label="@lang('pagination.previous')">
            <div class="bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5">
            Prev
            </div>
        </a>
    @endif
</div>

<!-- Paginator Elements -->
@foreach ($elements as $element)
@if (is_string($element))
    <li class="underline p-1 rounded-md w-8 text-center list-none disabled" aria-disabled="true"><span>{{ $element }}</span></li>
@endif

@if (is_array($element))
    @foreach ($element as $page => $url)
        @if ($paginator->currentPage() > 4 && $page === 2)
            <li class="list-none bg-grey p-1 rounded-md w-8 text-center page-item disabled"><span class="page-link cursor-pointer">...</span></li>
        @endif

        @if ($page == $paginator->currentPage())
            <li class="underline p-1 rounded-md w-8 text-center list-none active"><span class="page-link">{{ $page }}</span></li>
        @elseif ($page === $paginator->currentPage() + 1 || $page === $paginator->currentPage() + 2 || $page === $paginator->currentPage() - 1 || $page === $paginator->currentPage() - 2 || $page === $paginator->lastPage() || $page === 1)
                <a href="{{ $url . '&' . http_build_query([
                    'per_page' => session('order_per_page', 5), 
                    'search' => session('order_search', '')
                    ]) }}">
                    <li class="list-none bg-grey p-1 rounded-md w-8 text-center page-item">
                        <p class="page-link" >{{ $page }}</p>
                    </li>
                </a>
        @endif

        @if ($paginator->currentPage() < $paginator->lastPage() - 3 && $page === $paginator->lastPage() - 1)
            <li class="list-none bg-grey p-1 rounded-md w-8 text-center page-item disabled"><span class="page-link cursor-pointer">...</span></li>
        @endif
    @endforeach
@endif
@endforeach

<!-- Paginator for Next -->
@if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() . '&' . http_build_query([
        'per_page' => session('order_per_page', 5),
        'search' => session('order_search', ''),
        ]) }}" rel="next" aria-label="@lang('pagination.next')">
        <div class="bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled">
            Next
        </div>
    </a>
@else
    <button class="bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
        <span aria-hidden="true">Next</span>
    </button>
@endif


@endif
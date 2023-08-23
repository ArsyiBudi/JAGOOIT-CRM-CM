@if ($paginator->hasPages())
<div class="">

    <!-- Paginator for Previous Page -->
    @if ($paginator->onFirstPage())
    <div class="bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
        Prev
    </div>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
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
        @if ($page == $paginator->currentPage())
            <li class="underline p-1 rounded-md w-8 text-center list-none active" aria-current="page">
                <span>{{ $page }}</span>
            </li>
        @else
                <a href="{{ $url }}">
                    <div class="bg-grey p-1 rounded-md w-8 text-center">
                        {{ $page }}
                    </div> 
                </a>
        @endif
    @endforeach
@endif
@endforeach

<!-- Paginator for Next -->
@if ($paginator->hasMorePages())
    <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
        <div class=" bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled">
            Next
        </div>
    </a>
@else
<button class=" bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5 disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
    <span aria-hidden="true">Next</span>
</button>
@endif














<!-- 
<div class=" bg-grey p-1 rounded-md w-8 text-center">
    <p>10</p>
</div>
<div class="">
    <button class=" bg-secondary py-1 px-5 rounded-md cursor-pointer hover:scale-95 my-5">Next</button>
</div>
</div>
@endif -->
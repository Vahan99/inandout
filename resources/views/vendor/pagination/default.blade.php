@if ($paginator->hasPages())
    <div class="pager_wrapper">
        <ul class="pager clearfix">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="disabled prev"><a>@lang('message.previous')</a></li>
            @else
                <li class="prev"><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('message.previous')</a></li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled"><a>{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="active"><a>{{ $page }}</a></li>
                        @else
                            <li><a href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="next"><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('message.next')</a></li>
            @else
                <li class="disabled next"><a>@lang('message.next')</a></li>
            @endif
        </ul>
    </div>
@endif

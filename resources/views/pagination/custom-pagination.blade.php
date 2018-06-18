@if ($paginator->hasPages())

<nav aria-label="Page navigation example">
    <ul class="pagination">
        @if ($paginator->onFirstPage())

            <li class="disabled"><span><i class="fa fa-angle-left" aria-hidden="true"></i></span></li>

        @else

            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>

        @endif
        @foreach ($elements as $element)
            @if (is_string($element))

                <li class="page-item"><span>{{ $element }}</span></li>

            @endif
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())

                        <li class="page-item active"><span class="page-link">{{ $page }}</span></li>

                    @else

                        <li class="page-item"><a class="page-link"  href="{{ $url }}">{{ $page }}</a></li>

                    @endif
                @endforeach
            @endif
        @endforeach
        @if ($paginator->hasMorePages())

            <li class="page-item"><a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>

        @else

            <li class="disabled"><span><i class="fa fa-angle-right" aria-hidden="true"></i></span></li>

        @endif
    </ul>
</nav>

@endif
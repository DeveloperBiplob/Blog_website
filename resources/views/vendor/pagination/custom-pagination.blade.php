<style>
    .page-item.active .page-link {
        border-radius: 50px !important;
        color: #eee !important;
    }
</style>
@if ($paginator->hasPages())
    <nav aria-label="Page navigation example" style="margin:auto">
        <ul class="pagination pagination-template d-flex justify-content-center">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                {{-- <li class="page-item">
                    <span class="page-link">&lsaquo;</span>
                </li> --}}
                <li class="page-item"><a href="" class="page-link"> <i class="fa fa-angle-left"></i></a></li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&lsaquo;</a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" >&rsaquo;</a>
                </li>
            @else
                {{-- <li class="page-item">
                    <span class="page-link">&rsaquo;</span>
                </li> --}}
                <li class="page-item"><a href="" class="page-link"> <i class="fa fa-angle-right"></i></a></li>
            @endif
        </ul>
    </nav>
@endif

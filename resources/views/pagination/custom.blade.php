@if ($paginator->hasPages())
    <div class="pagination-nav">
        {{-- Tombol Sebelumnya --}}
        @if ($paginator->onFirstPage())
            <span class="page-item disabled"><i class="fas fa-chevron-left"></i></span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" class="page-item" rel="prev"><i class="fas fa-chevron-left"></i></a>
        @endif

        {{-- Halaman --}}
        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="page-item disabled">{{ $element }}</span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="page-item active">{{ $page }}</span>
                    @else
                        <a href="{{ $url }}" class="page-item">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Tombol Selanjutnya --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="page-item" rel="next"><i class="fas fa-chevron-right"></i></a>
        @else
            <span class="page-item disabled"><i class="fas fa-chevron-right"></i></span>
        @endif
    </div>
@endif

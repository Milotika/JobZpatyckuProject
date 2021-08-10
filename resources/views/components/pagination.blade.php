<section id="pagination" class="my-3">
    <div class="pagination-buttons">
        <a href="{{ $articles->nextPageUrl() }}">
            <span class="pagination-center">Następna strona</span>
            <i class="fas fa-arrow-right"></i></a>
        <a href="/losowy">
            <span class="pagination-center"> Losowy post</span><i class="fas fa-random"></i></a>
    </div>
    <div class="pagination-pages">
        @if ($articles->lastPage() <= 8)
        @for ($i = 1; $i <= $articles->lastPage(); $i++) @if ($i == $articles->currentPage())
                <a href="{{ $articles->url($i) }}"
                class="active">{{ $i }}</a>
            @else
                <a href="{{ $articles->url($i) }}">{{ $i }}</a> @endif
            @endfor
        @else
            @if ($articles->currentPage() - 7 >= 0)
                @for ($i = $articles->currentPage() - 5; $i <= $articles->currentPage() + 2; $i++)
                    @if ($i == $articles->currentPage())
                        <a href="{{ $articles->url($i) }}" class="active">{{ $i }}</a>
                    @else
                        <a href="{{ $articles->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor
            @else
                @for ($i = 1; $i <= 8; $i++)
                    @if ($i == $articles->currentPage()) <a
                    href="{{ $articles->url($i) }}"
                    class="active">{{ $i }}</a>
                @else
                    <a
                    href="{{ $articles->url($i) }}">{{ $i }}</a> @endif
                @endfor
            @endif
    @endif
    </div>
</section>

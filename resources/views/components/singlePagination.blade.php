<section id="pagination" class="my-3">
    <div class="pagination-buttons">
        <a href="{{ $comments->nextPageUrl() }}">
            <span class="pagination-center">Następna strona</span>
            <i class="fas fa-arrow-right"></i></a>
        <a href="/losowy">
            <span class="pagination-center"> Losowy post</span><i class="fas fa-random"></i></a>
    </div>
    <div class="pagination-pages">
        @if ($comments->lastPage() <= 8)
        @for ($i = 1; $i <= $comments->lastPage(); $i++) @if ($i == $comments->currentPage())
                <a href="{{ $comments->url($i) }}"
                class="active">{{ $i }}</a>
            @else
                <a href="{{ $comments->url($i) }}">{{ $i }}</a> @endif
            @endfor
        @else
            @if ($comments->currentPage() - 7 >= 0)
                @for ($i = $comments->currentPage() - 5; $i <= $comments->currentPage() + 2; $i++)
                    @if ($i == $comments->currentPage())
                        <a href="{{ $comments->url($i) }}" class="active">{{ $i }}</a>
                    @else
                        <a href="{{ $comments->url($i) }}">{{ $i }}</a>
                    @endif
                @endfor
            @else
                @for ($i = 1; $i <= 8; $i++)
                    @if ($i == $comments->currentPage()) <a
                    href="{{ $comments->url($i) }}"
                    class="active">{{ $i }}</a>
                @else
                    <a
                    href="{{ $comments->url($i) }}">{{ $i }}</a> @endif
                @endfor
            @endif
    @endif
    </div>
</section>

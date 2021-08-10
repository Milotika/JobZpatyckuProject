<x-main-layout>
    @include('components.article')
    <section id="pagination" class="my-3">
        <div class="pagination-buttons">
            <a href="/">
                <span class="pagination-center">Strona główna</span>
                <i class="fas fa-arrow-right"></i></a>
            <a href="/losowe">
                <span class="pagination-center"> Losowy post</span><i class="fas fa-random"></i></a>
        </div>
    </section>

    <!-- Section comments -->
    <section id="comments">
        @auth
            <form class="comments-form" method="POST" action="/{{ $article->id }}/comment">
                @csrf
                <img src="{{ url('avatar/' . Auth::user()->avatar) }}" class="article-avatar" alt="User avatar" />
                <textarea oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"' name="comment"
                    placeholder="Wpisz tutaj swój komentarz"></textarea>
                <input type="submit" value="Dodaj" class="comments-submit" />
            </form>
        @endauth
        <div class="comments-header">
            <span class="comments-count">
                <i class="fas fa-comments"></i> {{ $article->comment_count }}
            </span>
            <div class="comments-actions">
                <a href="#">Data rosnąco</a>
                <a href="#">Data malejąco</a>
                <a href="#" class="active">Popularność</a>
            </div>
        </div>

        <!-- Comments -->
        <div class="comments-container">

            @if ($comments)

                @foreach ($comments as $comment)
                    @include('components.comment')
                @endforeach
                @include('components.singlePagination')
            @endif

        </div>
    </section>
    <x-slot name="script"><script src="{{ url('/js/main.js') }}"></script></x-slot>
</x-main-layout>

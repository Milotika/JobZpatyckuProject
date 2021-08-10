<article class="article">
    <div class="article-content">
        <h2 class="article-title">
            <a href="{{ url('uzytkownik/' . $article->user->login) }}">
                <img src="{{ url('avatar/' . $article->user->avatar) }}" style="width: 32px; height:32px;" class="article-avatar"
        alt="article-avatar" />
            </a>
            <a
                href="{{ url('obr/' . $article->id . '/' . $article->title) }}">{{ $article->title }}</a>
        </h2>
        <div class="article-details">
            <div class="article-add-time">
                <span class="article-time">{{$article->interval}} </span>
            </div>
            <div class="article-category">
                <a href="{{ url('uzytkownik/' . $article->user->login) }}"><span
                        class="article-user">{{ $article->user->login }}</a></span>
                <span class="article-category-details">{{ $article->category }}</span>
            </div>
        </div>
        <a href="{{ url('obr/' . $article->id . '/' . $article->title) }}"">
    <img src='{{ url($article->file_patch) }}' class=" article-image" alt="article-image" />
        </a>
    </div>
    <div class="article-actions">
        @auth

            @if ($article->vote)
                <form action="/un_vote" method="POST">
                    @csrf
                    <input type="hidden" name="meme_id" value="{{ $article->id }}">
                    <button type="submit" class="article-actions-plus"
                        style="background-color: rgb(107, 142, 35);">
                        <i class="fas fa-plus fa-2x"></i>
                    </button>
                </form>
            @endif
            @if (!$article->vote)
                <form action="/vote" method="POST">
                    @csrf
                    <input type="hidden" name="meme_id" value="{{ $article->id }}">
                    <button type="submit" class="article-actions-plus">
                        <i class="fas fa-plus fa-2x"></i>
                    </button>
                </form>
            @endif
        @endauth
        @guest
            <button type="button" class="article-actions-plus">
                <i class="fas fa-plus fa-2x"></i>
            </button>
        @endguest
        <span class="article-actions-plus-votes">+ {{ $article->vote_count }}</span>
    </div>
</article>
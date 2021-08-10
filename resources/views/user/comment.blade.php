<x-main-layout>

    <div class="profile">
        <div class="profile-avatar">
            <img src="{{ url('/avatar/' . $user->avatar) }}" alt="Avatar profile" class="profile-avatar-img" />
        </div>
        <div class="profile-info">
            <div class="profile-name">{{ $user->login }}</div>
            <ul class="profile-details">
                <li class="profile-create-date">
                    <i class="fas fa-calendar-alt"></i> {{ $user->join_date }}
                </li>
                <li class="profile-comments">
                    <i class="fas fa-comments"></i> {{ $user->comment_count }}
                </li>
            </ul>
        </div>
    </div>
    <div class="user-stats">
        <a href="{{ url('/uzytkownik/' . $user->login) }}">Posty użytkownika</a>
        <a href="{{ url('/uzytkownik/' . $user->login . '/komentarze') }}" class="active">Komentarze użytkownika</a>
    </div>
    <section id="comments">
        <div class="comments-header">
            <span class="comments-count">
                <i class="fas fa-comments"></i> {{$user->comment_count}} komentarzy
            </span>
            <div class="comments-actions">
                <a href="#">Data rosnąco</a>
                <a href="#">Data malejąco</a>
                <a href="#" class="active">Popularność</a>
            </div>
        </div>
        <div class="comments-container">

            @if ($comments)

                @foreach ($comments as $comment)
                    @include('components.comment')
                @endforeach
                @include('components.singlePagination')
            @endif

        </div>
    </section>

    <x-slot name="script"><script src="{{ url('js/main.js') }}"></script></x-slot>
</x-main-layout>

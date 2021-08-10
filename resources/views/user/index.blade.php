<x-main-layout>

    <div class="profile">
        <div class="profile-avatar">
            <img src="{{ url('avatar/' . $user->avatar) }}" alt="Avatar profile" class="profile-avatar-img" />
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
        <a href="{{ url('/uzytkownik/' . $user->login) }}" class="active">Posty użytkownika</a>
        <a href="{{ url('/uzytkownik/' . $user->login . '/komentarze') }}">Komentarze użytkownika</a>
    </div>
    <div class="user-post-category">
        <select
        name="category"
        id="category"
        class="user-post-category-select"
        onchange="location = '/uzytkownik/{{$user->login}}/kategoria/'+this.value;">
                <option class=" optgroup" value="" disabled selected>
            Wybierz kategorie
            </option>
            <option class="optgroup" value="ciekawostki">Ciekawostki</option>
            <option class="optgroup" value="gry">Gry</option>
            <option class="optgroup" value="sport">Sport</option>
            <option class="optgroup" value="filmy">Filmy</option>
            <option class="optgroup" value="zwierzęta">Zwierzęta</option>
            <option class="optgroup" value="humor">Humor</option>
            <option class="optgroup" value="polityka">Polityka</option>
            <option class="optgroup" value="muzyka">Muzyka</option>
            <option class="optgroup" value="czarny-humor">
                Czarny humor
            </option>
            <option class="optgroup" value="pasty">Pasty</option>
            <option class="optgroup" value="nauka">Nauka</option>
            <option class="optgroup" value="pytanie">Pytanie</option>
            <option class="optgroup" value="motoryzacja">Motoryzacja</option>
        </select>
    </div>
    @if ($articles)
        @foreach ($articles as $article)
            @include('components.article')
        @endforeach
        @include('components.pagination')
    @endif

    <x-slot name="script"><script src="{{ url('js/main.js') }}"></script></x-slot>
</x-main-layout>

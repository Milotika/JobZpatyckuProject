<header id="header-home">
    <div class="container">
        <nav id="main-nav" class="my-1">
            <input type="checkbox" id="check" />
            <label for="check" class="checkbtn">
                <i class="fas fa-bars"></i>
            </label>
            <a href="{{ url('/') }}">
                <img src="{{ url('/img/logokrecik.svg') }}" alt="JobZpatycku logo" id="logo" /></a>
            <ul class="nav-links">
                <li>
                    <a href="{{ url('upload') }}"
                        class="{{ request()->segment(1) == 'upload' ? 'active' : '' }}"><span class="special-color"><i
                                class="fas fa-plus"></i> Upload</span></a>
                </li>
                <li>
                    <a href="{{ url('/') }}"
                        class="{{ request()->segment(1) == '' ? 'active' : '' }}">Nowości</a>
                </li>
                {{-- <li><a href="{{ url('video') }}"
                        class="{{ request()->segment(1) == 'video' ? 'active' : '' }}">Video</a></li> --}}
                <li><a href="{{ url('oczekujace') }}"
                        class="{{ request()->segment(1) == 'oczekujace' ? 'active' : '' }}">Oczekujące</a></li>
                <li><a href="{{ url('losowe') }}"
                        class="{{ request()->segment(1) == 'losowe' ? 'active' : '' }}">Losowe</a></li>
                <li><a href="{{ url('top') }}"
                        class="{{ request()->segment(1) == 'top' ? 'active' : '' }}">Top</a></li>

                <div class="dropdown">
                    <li>
                        <a href="#">Kategorie <i class="fas fa-sort-down"></i></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-item"><a href="{{ url('kategoria/ciekawostki') }}"
                                class="{{ request()->segment(2) == 'ciekawostki' ? 'active' : '' }}">Ciekawostki</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/gry') }}"
                                    class="{{ request()->segment(2) == 'gry' ? 'active' : '' }}">Gry</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/sport') }}"
                                    class="{{ request()->segment(2) == 'sport' ? 'active' : '' }}">Sport</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/filmy') }}"
                                    class="{{ request()->segment(2) == 'filmy' ? 'active' : '' }}">Filmy</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/zwierzeta') }}"
                                    class="{{ request()->segment(2) == 'zwierzeta' ? 'active' : '' }}">Zwierzęta</a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/humor') }}"
                                    class="{{ request()->segment(2) == 'humor' ? 'active' : '' }}">Humor</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/polityka') }}"
                                    class="{{ request()->segment(2) == 'polityka' ? 'active' : '' }}">Polityka</a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/muzyka') }}"
                                    class="{{ request()->segment(2) == 'muzyka' ? 'active' : '' }}">Muzyka</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/czarny-humor') }}"
                                    class="{{ request()->segment(2) == 'czarny-humor' ? 'active' : '' }}">Czarny
                                    humor</a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/pasty') }}"
                                    class="{{ request()->segment(2) == 'pasty' ? 'active' : '' }}">Pasty</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/nauka') }}"
                                    class="{{ request()->segment(2) == 'nauka' ? 'active' : '' }}">Nauka</a></li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/pytanie') }}"
                                    class="{{ request()->segment(2) == 'pytanie' ? 'active' : '' }}">Pytanie</a>
                            </li>
                            <li class="dropdown-item"><a href="{{ url('kategoria/motoryzacja') }}"
                                    class="{{ request()->segment(2) == 'motoryzacja' ? 'active' : '' }}">Motoryzacja</a>
                            </li>
                        </ul>
                    </li>
                </div>
                @guest
                    <li><a href="{{ url('logowanie') }}"
                            class="{{ request()->segment(1) == 'logowanie' ? 'active' : '' }}">Logowanie</a></li>
                    <li>
                        <a href="{{ url('rejestracja') }}"
                            class="{{ request()->segment(1) == 'rejestracja' ? 'active' : '' }}"><span
                                class="special-color"><i class="fas fa-user-plus"></i> Rejestracja</span></a>
                    </li>
                @endguest
                @auth
                    <li><a href="{{ url('logout') }}" class="logout">Wyloguj</a></li>
                @endauth
            </ul>
        </nav>
    </div>
</header>

<x-main-layout>
    <section class="settings">
        <div class="nav-settings">
            <ul class="nav-links">
                <li><a href="#settings-user">Informacje o koncie</a></li>
                <li><a href="#password-user">Zmiana hasła</a></li>
                <li><a href="#avatar-user">Avatar</a></li>
                <li><a href="#delete-acc">Usuń konto</a></li>
            </ul>
        </div>
        <div class="settings-user" id="settings-user">
            <form class="user-info" action="{{url('user/info')}}" method="POST">
                @csrf
                <h4 class="user-info-header py-2">Informacje o koncie</h4>
                <div class="user-block">
                    <input type="text" name="name" id="name" autocomplete="off" @if ($user->name) placeholder = "{{ $user->name }}" value="{{ $user->name }}"
                @else
                        placeholder = "Imię" @endif />
                </div>
                <div class="user-block">
                    <select name="sex" id="sex">
                        <option value="" disabled @if ($user->gender == null) selected @endif>Wybierz płeć</option>
                        <option value="female" @if ($user->gender == 'female') selected @endif>Kobieta</option>
                        <option value="male" @if ($user->gender == 'male') selected @endif>Mężczyzna</option>
                    </select>
                </div>
                <div class="user-block">
                    <input type="text" name="country" id="country" autocomplete="off" @if ($user->country) placeholder = "{{ $user->country }}"
                    value="{{ $user->country }}"
                @else
                            placeholder = "Kraj" @endif />
                </div>
                <div class="user-block">
                    <input type="text" name="city" id="city" autocomplete="off" @if ($user->city) placeholder = "{{ $user->city }}"
                    value="{{ $user->city }}"
                @else
                                placeholder = "Miasto" @endif />
                </div>
                <div class="user-block">
                    <input type="text" name="date_of_birth" id="birthdate" autocomplete="off"
                        onfocus="(this.type='date')" onblur="(this.type='text')" @if ($user->date_of_birth) placeholder = "{{ $user->date_of_birth }}"
                        value="{{ $user->date_of_birth }}"
                    @else
                                    placeholder = "Urodziny" @endif />
                </div>
                <div class="user-block">
                    <input type="submit" name="submit" class="submit-btn" value="Zapisz" />
                </div>
            </form>
        </div>
        <div class="password-user" id="password-user">
            <form class="password-info" method="POST" action="{{url('user/password-change')}}">
                @csrf
                <h4 class="password-header py-2">Zmiana hasła</h4>
                <div class="user-block">
                    <input type="password" name="password_old" id="password-old" autocomplete="off"
                        placeholder="Stare hasło" />
                </div>
                <div class="user-block">
                    <input type="password" name="password" id="password-new" autocomplete="off"
                        placeholder="Nowe hasło" />
                </div>
                <div class="user-block">
                    <input type="password" name="password_confirmation" id="password-new2" autocomplete="off"
                        placeholder="Powtórz nowe hasło" />
                </div>
                <div class="user-block">
                    <input type="submit" name="submit" class="submit-btn" value="Zmień" />
                </div>
            </form>
        </div>
        <div class="avatar-user" id="avatar-user">
            <form class="avatar-info" method="POST" enctype="multipart/form-data" action="{{url('user/avatar')}}">
                @csrf
                <h4 class="avatar-header py-2">Avatar</h4>
                <label for="file-image-1"> Wybierz avatar</label>
                <input type="file" id="file-image-1" accept="image/*" onchange="showPreview(event);" name="file"/>
                <div class="preview">
                    <img id="file-image-1-preview" class="create-post-image" />
                </div>
                <p class="avatar-warning">
                    Avatar nie może zawierać treści +18. Ustawienie będzie
                    skutkowało banem.
                </p>
                <input type="submit" name="submit" class="submit-btn" value="Zmień" />
            </form>
        </div>
        <div class="delete-acc" id="delete-acc">
            <form class="delete-acc-form" method="POST" action="{{url('user/delete')}}">
                @csrf
                <h4 class="delete-header py-2">Usuń konto</h4>
                <p class="delete-warning">
                    Czy naprawdę chcesz usunąć swoje konto na JobZPatycku?
                    Usunięcie konta spowoduje usunięcie całej Twojej zawartości i
                    związanych z nią danych.
                </p>

                <button onclick="deleteAlert()" type="button" class="delete-btn">
                    Tak, chcę usunąć moje konto
                </button>
            </form>
        </div>
    </section>
    <x-slot name="script">
        <script src="{{ url('js/main.js') }}"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </x-slot>
</x-main-layout>

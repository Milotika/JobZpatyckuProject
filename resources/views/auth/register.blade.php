<x-second-layout>
    <section id="register-section">
        <div class="container">
            <h2>Rejestracja</h2>
            <div class="border-line"></div>
            <form method="post" class="register-form" id="register-form" method="post" action="/register">
                @csrf
                <div class="control-form">
                    <input type="text" name="login" id="user-login" placeholder="Podaj login"
                        class="register-form-text" autocomplete="off" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <div class="control-form">
                    <input type="email" name="email" id="user-email" placeholder="Podaj email"
                        class="register-form-text" autocomplete="off" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="control-form">
                    <input type="password" name="password" id="user-password" placeholder="Podaj hasło"
                        class="register-form-text" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <div class="control-form">
                    <input type="password" name="password_confirmation" id="user-password2" placeholder="Powtórz hasło"
                        class="register-form-text" />
                    <i class="fas fa-check-circle"></i>
                    <i class="fas fa-exclamation-circle"></i>
                    <small>Error message</small>
                </div>
                <input type="submit" value="Zarejestruj" class="register-form-btn" />
            </form>
        </div>
    </section>
    <x-slot name="script">
        <script src="{{url('/js/register.js')}}"></script>
    </x-slot>
</x-second-layout>

<x-second-layout>
    <section id="login-section">
        <div class="container">
          <h2>Logowanie</h2>
          <div class="border-line"></div>
          <form method="post" class="login-form" id="login-form" method="post" action="login">
              @csrf
            <div class="control-form">
              <input
                type="text"
                name="login"
                id="user-login"
                placeholder="Podaj login"
                class="login-form-text"
                autocomplete="off"
              />
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <small>Error message</small>
            </div>
            <div class="control-form">
              <input
                type="password"
                name="password"
                id="user-password"
                placeholder="Podaj hasło"
                class="login-form-text"
                autocomplete="off"
              />
              <i class="fas fa-check-circle"></i>
              <i class="fas fa-exclamation-circle"></i>
              <small>Error message</small>
            </div>
            <a href="#" class="my-top">Nie pamiętasz hasła?</a>
            <a href="{{url('rejestracja')}}">Nie masz jeszcze konta?</a>
            <input type="submit" value="Zaloguj" class="login-form-btn" />
          </form>
        </div>
      </section>
      <x-slot name="script"><script src="/js/login.js"></script></x-slot>
</x-second-layout>
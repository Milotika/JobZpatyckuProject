<x-second-layout>
    <section id="create-post">
        <div class="container">
          <h2>Dodaj swojego posta już teraz !</h2>
          <div class="border-line"></div>
          <span>Wybierz co zamierzasz wrzucić</span>
  
          <div class="create-post-select-menu">
            <a href="{{url('upload/obrazek')}}"
              ><i class="far fa-image fa-7x"></i><span>Obrazek</span></a
            >
  
            {{-- <a href="{{url('upload/filmik')}}"
              ><i class="fas fa-video fa-7x"></i><span>Filmik</span></a
            > --}}
          </div>
        </div>
      </section>
      <x-slot name="script"><script src="{{url('/js/main.js')}}"></script></x-slot>
</x-second-layout>
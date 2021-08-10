<x-second-layout>
    <section id="create-post">
        <div class="container">
            <h2>Dodaj swojego posta już teraz !</h2>
            <div class="border-line"></div>
            <span>Wybierz co zamierzasz wrzucić</span>

            <div class="create-post-select-menu">
                <a href="{{url('upload/obrazek')}}"><i class="far fa-image fa-7x active"></i><span class="active">Obrazek</span></a>

                {{-- <a href="{{url('upload/video')}}"><i class="fas fa-video fa-7x"></i><span class="un-active">Filmik</span></a> --}}
            </div>
            <form class="create-post-picture-form" id="create-post-picture-form" enctype="multipart/form-data" method="POST" action="">
                @csrf
                <div class="create-post-control">
                    <input class="create-post-title @error('title')error @enderror" type="text" name="title" id="title"
                        placeholder="Tytuł twojego obrazka" autocomplete="off" />
                    <small>Error message</small>
                </div>
                <div class="create-post-control">
                    <select name="category" id="category" class="create-post-select">
                        <option value="" disabled selected>Wybierz kategorie</option>
                        <option value="Ciekawostki">Ciekawostki</option>
                        <option value="Gry">Gry</option>
                        <option value="Sport">Sport</option>
                        <option value="Filmy">Filmy</option>
                        <option value="Zwierzęta">Zwierzęta</option>
                        <option value="Humor">Humor</option>
                        <option value="Polityka">Polityka</option>
                        <option value="Muzyka">Muzyka</option>
                        <option value="Czarny humor">Czarny humor</option>
                        <option value="Pasty">Pasty</option>
                        <option value="Nauka">Nauka</option>
                        <option value="Pytanie">Pytanie</option>
                        <option value="Motoryzacja">Motoryzacja</option>
                    </select>
                    <small>Error message</small>
                </div>
                <div class="create-post-control">
                    <label for="file-image-1">
                        <i class="fa fa-cloud-upload"></i>&nbsp; Kliknij tutaj aby dodać
                        zdjęcie</label>
                    <input name="file" type="file" id="file-image-1" accept="image/*" onchange="showPreview(event);" />
                </div>
                <div class="preview">
                    <img id="file-image-1-preview" class="create-post-image" />
                </div>
                <input type="submit" value="Wyślij" class="create-post-btn" />
            </form>
        </div>
    </section>
    <x-slot name="script"><script src="{{ url('/js/create-picture.js') }}"></script></x-slot>
</x-second-layout>

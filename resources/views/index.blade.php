<x-main-layout>
    @if ($articles)
        @foreach ($articles as $article)
            @include('components.article')
        @endforeach
        @include('components.pagination')
    @endif
    <x-slot name="script"><script src="{{ url('js/main.js') }}"></script></x-slot>
</x-main-layout>

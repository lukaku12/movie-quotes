<x-layout>
    <x-wrapper>
        <div class="flex flex-col justify-center items-center w-full h-full">
            <div>
                <img class="w-full max-w-3xl rounded-xl"
                     src="{{ asset('storage/' . $movie->quotes->random()->thumbnail) }}" alt="">
            </div>
            <div class="mb-12 mt-5 text-2xl text-gray-400">
                <h2>“{{ $movie->quotes->random()->title}}”</h2>
            </div>
            <div class="mb-12 text-2xl underline text-gray-400">
                <a href="/movies/{{ $movie->slug }}">{{ $movie->title }}</a>
            </div>
        </div>
    </x-wrapper>
</x-layout>

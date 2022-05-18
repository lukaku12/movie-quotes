<x-layout>
    <x-wrapper>
        <div class="flex flex-col justify-center items-center w-full h-full">
            <div>
                <img class="w-full max-w-3xl rounded-xl"
                     src="{{ asset('storage/thumbnails/' . $quote->thumbnail) }}" alt="">
            </div>


            <div class="mb-12 mt-5 text-2xl text-gray-400">
                <h2>“{{ $quote->title }}”</h2>
            </div>
            <div class="mb-12 text-2xl underline text-gray-400">
                <a href="/movies/{{ $quote->movie->slug }}">{{ $quote->movie->title }}</a>
            </div>
        </div>
    </x-wrapper>
</x-layout>

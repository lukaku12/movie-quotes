<x-layout>
    <div class="flex flex-col justify-center items-center w-full h-full">
        <div>
            {{--TO DO--}}
            <img class="w-full rounded-xl" src="./images/imagemovieImage.png" alt="">
        </div>
        <div class="mb-12 mt-5 text-2xl text-gray-400">
            <h2>“{{ $movie->quotes->random()->title}}”</h2>
        </div>
        <div class="mb-12 text-2xl underline text-gray-400">
            <a href="/movies/{{ $movie->slug }}">{{ $movie->title }}</a>
        </div>
    </div>
</x-layout>
<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="edit_movie"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  action="/admin/movies/{{ $movie->id }}">
                @csrf
                @method('PATCH')
                <x-form.input name="titleEn" translatable="movie_title_en" :value="$movieTitleEn"/>
                <x-form.input name="titleKa" translatable="movie_title_ka" :value="$movieTitleKa"/>
                <x-form.input name="slug" translatable="movie_slug" :value="$movie->slug"/>
                <x-form.button name="save"/>
            </form>
        </div>
    </div>
</x-layout>

<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="Edit Movie"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  action="/admin/all-movies/{{ $movie->id }}">
                @csrf
                @method('PATCH')
                <x-form.input name="titleEn" translatable="Movie Title En" :value="$movieTitleEn"/>
                <x-form.input name="titleEn" translatable="Movie Title Ka" :value="$movieTitleKa"/>
                <x-form.input name="slug" translatable="Movie Slug" :value="$movie->slug"/>
                <x-form.button name="Save"/>
            </form>
        </div>
    </div>
</x-layout>

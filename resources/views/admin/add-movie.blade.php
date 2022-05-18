<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="add_movie"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  action="/admin/movies">
                @csrf
                <x-form.input name="titleEn" translatable="movie_title_en"/>
                <x-form.input name="titleKa" translatable="movie_title_ka"/>
                <x-form.input name="slug" translatable="movie_slug"/>
                <x-form.button name="add_movie"/>
            </form>
        </div>
    </div>
</x-layout>

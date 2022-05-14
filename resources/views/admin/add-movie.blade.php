<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="Add Movie"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  action="/admin/add-movie/create">
                @csrf
                <x-form.input name="titleEn" translatable="Movie Title En"/>
                <x-form.input name="titleKa" translatable="Movie Title Ka"/>
                <x-form.input name="slug" translatable="Movie Slug"/>
                <x-form.button name="Add Movie"/>
            </form>
        </div>
    </div>
</x-layout>

<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="add_quote"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  enctype="multipart/form-data"
                  action="/admin/quotes">
                @csrf
                <x-form.input name="titleEn" translatable="quote_title_en"/>
                <x-form.input name="titleKa" translatable="quote_title_ka"/>
                <x-form.input name="thumbnail" translatable="quote_thumbnail" type="file"/>
                <x-form.dropdown :movies="$movies"/>
                <x-form.button name="add_quote"/>
            </form>
        </div>
    </div>
</x-layout>

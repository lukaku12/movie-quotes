<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="edit_quote"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  enctype="multipart/form-data"
                  action="/admin/quotes/{{ $quote->id }}">
                @csrf
                @method('PATCH')
                <x-form.input name="titleEn" translatable="quote_title_en" :value="$quoteTitleEn"/>
                <x-form.input name="titleKa" translatable="quote_title_ka" :value="$quoteTitleKa"/>
                <x-form.input name="thumbnail" translatable="quote_thumbnail" type="file" required=""/>
                <x-form.dropdown :quote="$quote" :movies="$movies"/>
                <x-form.button name="save"/>
            </form>
        </div>
    </div>
</x-layout>

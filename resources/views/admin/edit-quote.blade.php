<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="Edit Quote"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  enctype="multipart/form-data"
                  action="/admin/all-quotes/{{ $quote->id }}">
                @csrf
                @method('PATCH')
                <x-form.input name="titleEn" translatable="Quote Title En" :value="$quoteTitleEn"/>
                <x-form.input name="titleKa" translatable="Quote Title Ka" :value="$quoteTitleKa"/>
                <x-form.input name="thumbnail" translatable="Quote Thumbnail" type="file" required=""/>
                <x-form.dropdown :quote="$quote"/>
                <x-form.button name="Save"/>
            </form>
        </div>
    </div>
</x-layout>

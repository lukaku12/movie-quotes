<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <x-admin.page-title title="Add Quote"/>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  enctype="multipart/form-data"
                  action="/admin/add-quote/create">
                @csrf
                <x-form.input name="titleEn" translatable="Quote Title En"/>
                <x-form.input name="titleKa" translatable="Quote Title Ka"/>
                <x-form.input name="thumbnail" translatable="Quote Thumbnail" type="file"/>
                <x-form.dropdown/>
                <x-form.button name="Add Quote"/>
            </form>
        </div>
    </div>
</x-layout>

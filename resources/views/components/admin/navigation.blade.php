<div class="w-72 bg-cyan-600 h-screen sticky top-0 left-0">
    <div class="p-4 text-white text-xl">
        <h1 class="text-2xl">{{__('ui.DASHBOARD')}}</h1>
    </div>
    <x-admin.navigation-links href="/admin/all-movies" name="{{__('ui.All Movies')}}"  />
    <x-admin.navigation-links href="/admin/all-quotes" name="{{__('ui.All Quotes')}}" />
    <x-admin.navigation-links href="/admin/add-movie" name="{{__('ui.Add Movie')}}" />
    <x-admin.navigation-links href="/admin/add-quote" name="{{__('ui.Add Quote')}}" />
</div>

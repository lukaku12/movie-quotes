<div class="w-72 bg-cyan-600 h-screen sticky top-0 left-0">
    <div class="p-4 text-white text-xl">
        <h1 class="text-2xl">{{__('ui.dashboard')}}</h1>
    </div>
    <x-admin.navigation-links href="/admin/movies" name="{{__('ui.all_movies')}}" />
    <x-admin.navigation-links href="/admin/quotes" name="{{__('ui.all_quotes')}}" />
    <x-admin.navigation-links href="/admin/movies/create" name="{{__('ui.add_movie')}}" />
    <x-admin.navigation-links href="/admin/quotes/create" name="{{__('ui.add_quote')}}" />
</div>

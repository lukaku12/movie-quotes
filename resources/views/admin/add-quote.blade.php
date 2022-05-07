<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <div class="px-12 h-full overflow-auto">
                <h1 class="text-4xl my-12 text-amber-50">Add Quote</h1>
                <div class="grid my-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">
                </div>
            </div>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  enctype="multipart/form-data"
                  action="/admin/add-quote/create">
                @csrf
                <div class="mb-4">
                    <label
                        for="quote"
                        class="block font-medium text-gray-700 text-xl">
                        Quote Title
                    </label>
                    <input
                        id="quote"
                        name="title"
                        type="text"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('quote')
                        <p class="mt-1 text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label
                        for="thumbnail"
                        class="block font-medium text-gray-700 text-xl">
                        Quote Thumbnail
                    </label>
                    <input
                        id="thumbnail"
                        name="thumbnail"
                        type="file"
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('thumbnail')
                        <p class="mt-1 text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <label
                    for="movie_id"
                    class="block font-medium text-gray-700 text-xl">
                    Movie title
                </label>
                <select name="movie_id" id="movie_id" class="rounded-xl p-3 mt-1">
                    @foreach(\App\Models\Movie::all() as $movie)
                        <option
                            value="{{ $movie->id }}"
                        >
                            {{ ucwords($movie->title) }}
                        </option>
                    @endforeach
                </select>
                @error('movie_id')
                    <p class="mt-1 text-red-600">{{ $message }}</p>
                @enderror
                <div>
                    <button
                        type="submit"
                        class="w-full flex justify-center mt-10 py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Add Quote
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

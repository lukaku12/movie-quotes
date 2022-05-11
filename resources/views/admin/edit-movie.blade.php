<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="flex flex-col h-full w-full items-center">
            <div class="px-12 h-full overflow-auto">
                <h1 class="text-4xl my-12 text-amber-50">Edit Movie</h1>
                <div class="grid my-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">
                </div>
            </div>
            <form class=" w-3/5 flex flex-col bg-cyan-50 p-7 rounded-xl"
                  method="POST"
                  action="/admin/all-movies/{{ $movie->id }}">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label
                        for="title"
                        class="block font-medium text-gray-700 text-xl">
                        Movie Title
                    </label>
                    <input
                        id="title"
                        name="title"
                        type="text"
                        value="{{ $movie->title }}"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('title')
                    <p class="mt-1 text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div class="mb-4">
                    <label
                        for="slug"
                        class="block font-medium text-gray-700 text-xl">
                        Movie Slug
                    </label>
                    <input
                        id="slug"
                        name="slug"
                        type="text"
                        value="{{ $movie->slug }}"
                        required
                        class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('slug')
                    <p class="mt-1 text-red-600">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <button
                        type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-layout>

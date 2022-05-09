<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="px-12 h-full overflow-auto w-full flex flex-col items-center">
            <h1 class="text-4xl my-5 text-amber-50">All Movies</h1>
            <div class="grid my-5 lg:grid-cols-3 gap-5 md:grid-cols-2 sm:grid-cols-1">
                {{-- movie--}}
                @foreach($movies as $movie)
                    <div class="w-72">
                        @if(!empty($movie->quotes->all()))
                        <img
                            class="border border-slate-900 rounded-xl rounded-b-none  aspect-video"
                            src="{{ asset('storage/' . $movie->quotes[0]->thumbnail) }}" alt="">
                        @else
                            <img
                                class="border border-slate-900 rounded-xl rounded-b-none  aspect-video"
                                src="{{ asset('storage/assets/notfound.png') }}" alt="">
                        @endif
                        <div class="bg-amber-50 p-3 w-full border border-slate-900 rounded-md rounded-t-none">
                            <h1 class="text-xl">{{ $movie->title }}</h1>
                            <div class="flex justify-between w-full border-t pt-1">
                                <a href="/admin/all-movies/{{ $movie->id }}/edit" class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">edit</a>
                                <form action="/admin/all-movies/{{ $movie->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full h-auto mb-12">
                {{ $movies->links() }}
            </div>
        </div>
    </div>
</x-layout>

{{--@dd(Auth::user())--}}
<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="px-12 h-full overflow-auto">
            <h1 class="text-4xl my-5 text-amber-50">All Quotes</h1>
            <div class="grid my-5 lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-5">
                {{-- movie--}}
                @foreach($quotes as $quote)
                    <div class="w-72">
                        <img
                            class="border border-slate-900 rounded-xl rounded-b-none  aspect-video"
                            src="{{ URL::asset('images/imagemovieImage.png') }}" alt="">
                        <div class="bg-amber-50 p-3 w-full border border-slate-900 rounded-md rounded-t-none">
                            <h2 class="text-gray-600 italic">"{{ $quote->title }}"</h2>
                            <h1 class="text-center text-xl underline">{{ $quote->movie->title }}</h1>
                            <div class="flex justify-between w-full border-t pt-1">
                                <button class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">edit</button>
                                <button class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">delete</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-layout>
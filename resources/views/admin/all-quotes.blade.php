<x-layout>
    <div class="flex">
        <x-admin.navigation/>
        <div class="px-12 h-full overflow-auto w-full flex flex-col items-center">
            <h1 class="text-4xl my-5 text-amber-50">{{ __('ui.all_quotes') }}</h1>
            <div class="grid my-5 lg:grid-cols-3 auto-rows-auto md:grid-cols-2 sm:grid-cols-1 gap-5">
                @foreach($quotes as $quote)
                    <div class="w-72">
                        <img
                            class="border border-slate-900 rounded-xl rounded-b-none  aspect-video"
                            src="{{ asset('storage/thumbnails/' . $quote->thumbnail) }}" alt="">
                        <div class="bg-amber-50 p-3 w-full border border-slate-900 rounded-md rounded-t-none">
                            <h2 class="text-gray-600 italic">"{{ $quote->title }}"</h2>
                            <h1 class="text-center text-xl underline">{{ $quote->movie->title }}</h1>
                            <div class="flex justify-between w-full border-t pt-1">
                                <a href="/admin/quotes/{{ $quote->id }}/edit" class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">{{ __('ui.edit') }}</a>
                                <form action="/admin/quotes/{{ $quote->id }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-amber-300 py-1 px-2 rounded-md hover:bg-amber-500">{{__('ui.delete')}}</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="w-full h-auto mb-12">
                {{ $quotes->links() }}
            </div>
        </div>
    </div>
</x-layout>

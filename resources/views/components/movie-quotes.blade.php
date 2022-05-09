<x-layout>
    <x-wrapper>
        <div class="max-w-xl flex flex-col justify-center items-center absolute top-0">
            <div class="w-full text-center p-1 text-gray-200">
                <h1 class="text-left mt-10 text-4xl">{{ $movie->title }}</h1>
            </div>
            @foreach($movie->quotes as $quote)
                <div class="rounded-xl my-6">
                    <div>
                        {{--TODO IMAGE--}}
                        <img
                            class="w-full border max-w-3xl border-slate-900 rounded-xl rounded-b-none"
                            src="{{ asset('storage/thumbnails/' . $quote->thumbnail) }}" alt="">
                    </div>
                    <div class="text-2xl text-gray-700 bg-slate-50 px-2 py-5 border rounded-b-md">
                        <h2>“{{ $quote->title }}”</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </x-wrapper>
</x-layout>

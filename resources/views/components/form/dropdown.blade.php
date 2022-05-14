@props(['quote' => null])
<label
    for="movie_id"
    class="block font-medium text-gray-700 text-xl">
    {{__('ui.Movie Title')}}
</label>
<select name="movie_id" id="movie_id"  class="rounded-xl p-3 mt-1">
    @foreach(\App\Models\Movie::all() as $movie)
        <option
            {{ $quote !== null && ($movie->id === $quote->movie->id ? 'selected' : '') }}
            value="{{ $movie->id }}"
        >
            {{ ucwords($movie->title) }}
        </option>
    @endforeach
</select>
@error('movie_id')
<p class="mt-1 text-red-600">{{ $message }}</p>
@enderror

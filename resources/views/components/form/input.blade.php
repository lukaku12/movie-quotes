@props(['name', 'type' => 'text', 'translatable', 'value' => '', 'required' => 'required'])
<div class="mb-4">
    <label
        for="{{ $name }}"
        class="block text-xl font-semibold text-gray-700">
        {{__("ui." . ucwords($translatable))}}
    </label>
    <div class="mt-1">
        <input
            id="{{ $name }}"
            name="{{ $name }}"
            type="{{ $type }}"
            value="{{ $value }}"
            {{ $required }}
            class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
    </div>
    @error($name)
        <p class="text-xs text-red-600 mt-5">{{ $message }}</p>
    @enderror
</div>

@props(['language','active' => false])

@php
    $classes =
    'w-8 h-8 border rounded-full flex items-center justify-center hover:bg-slate-50 hover:text-black z-50';

    if ($active) {
        $classes .= ' bg-slate-50 text-black';
    }else {
        $classes .= ' bg-transparent text-white';
    }
@endphp

<a href="/{{ $language }}" {{ $attributes(['class' => $classes]) }}>
    {{ $language }}
</a>

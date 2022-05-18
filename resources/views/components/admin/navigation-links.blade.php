@props(['href', 'name'])
@php
    $active = false;
    $active = \Request::getRequestUri() == $href;

    $classes = 'p-3 rounded-xl border m-1';
    if ($active) {
        $classes .= ' bg-amber-300';
    }
@endphp

<div class=" {{ $classes }}">
    <a href="{{ $href }}">{{ $name }}</a>
</div>

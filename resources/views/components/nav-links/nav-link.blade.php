@props(['active' => false])

@php
    $classes = $active
        ? 'text-yellow-500'
        : 'text-white';
@endphp

<a {{ $attributes->merge(['class' => "$classes block rounded-md px-3 py-2 text-base font-medium hover:text-yellow-500"]) }}
   @if($active) aria-current="page" @endif>
   {{ $slot }}
</a>

<a {{ $attributes->merge(['class' => "$classes block rounded-md px-3 py-2 text-base font-medium hover:text-yellow-500"]) }}
   @if($active) aria-current="page" @endif>
   {{ $slot }}
</a>
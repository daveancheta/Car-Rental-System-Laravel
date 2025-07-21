@props(['active' => false])

@php
$classes = $active
? 'bg-gray-700 group dark:text-white'
: 'dark:text-white';
@endphp

<a {{ $attributes->merge(['class' => "$classes flex items-center p-2 rounded-lg group dark:hover:bg-gray-700"])}}
    @if($active) aria-current="page" @endif>
                              {{ $slot }}
  
</a>

@props(['active' => false])

@php
$classes = $active
? 'dark:text-white'
: '';
@endphp

<div {{ $attributes->merge(['class' => "$classes shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"])}}
    @if($active) aria-current="page" @endif>
                              {{ $slot }}
  
    </div>

@props(['active' => false])

@php
$classes = $active
? 'dark:bg-white/50 '
: '';
@endphp

<div {{ $attributes->merge(['class' => "$classes space-y-2 font-medium mt-6 ml-2 hover:bg-white/50 p-2 rounded-xl"])}}
    @if($active) aria-current="page" @endif >
    {{ $slot }}
</div>
@props(['hovered' => false])

<div {{ $attributes->merge(['class' => 'p-4 bg-white dark:bg-gray-800 shadow rounded-lg transition-all duration-200 ease-in-out ' . ($hovered ? 'hover:scale-105 hover:mx-1 hover:shadow-xl' : '')]) }}>
    {{ $slot }}
</div>
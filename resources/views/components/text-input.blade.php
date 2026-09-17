@props(['disabled' => false])
@php
$classes = "block w-full px-3 py-2 bg-gray-800 border border-gray-600 rounded-md text-gray-200 placeholder-gray-400 focus:border-app-blue focus:ring-app-blue focus:ring-1 focus:outline-none transition-colors";
@endphp
<input @disabled($disabled) {{ $attributes->merge(['class' => $classes]) }}>
@props(['status'])

@if ($status)
    <div {{ $attributes->merge(['class' => 'font-medium text-sm text-app-green']) }}>
        {{ $status }}
    </div>
@endif
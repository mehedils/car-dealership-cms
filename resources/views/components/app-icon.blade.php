@props([
    'icon' => null,
    'class' => '',
    'style' => '',
    'alt' => '',
])

@php
    $iconStr = trim((string) $icon);
@endphp

@if(!empty($iconStr))
    @if(str_starts_with($iconStr, 'http://') || str_starts_with($iconStr, 'https://'))
        <img src="{{ $iconStr }}" alt="{{ $alt }}" class="{{ $class }}" style="object-fit: contain; max-height: 100%; max-width: 100%; {{ $style }}">
    @elseif(str_starts_with($iconStr, 'storage/') || str_starts_with($iconStr, 'icons/') || str_contains($iconStr, '/') || preg_match('/\.(svg|png|jpe?g|webp|gif)$/i', $iconStr))
        @php
            $src = str_starts_with($iconStr, 'storage/') ? asset($iconStr) : asset('storage/' . ltrim($iconStr, '/'));
        @endphp
        <img src="{{ $src }}" alt="{{ $alt }}" class="{{ $class }}" style="object-fit: contain; max-height: 100%; max-width: 100%; {{ $style }}">
    @elseif(str_starts_with($iconStr, 'fi ') || str_starts_with($iconStr, 'fi-') || str_starts_with($iconStr, 'fa ') || str_starts_with($iconStr, 'fas ') || str_starts_with($iconStr, 'far '))
        <i class="{{ $iconStr }} {{ $class }}" style="{{ $style }}"></i>
    @else
        @php
            $isComponent = false;
            try {
                $isComponent = view()->exists("components.{$iconStr}") || app(\BladeUI\Icons\Factory::class)->svg($iconStr);
            } catch (\Throwable $e) {
                $isComponent = false;
            }
        @endphp
        @if($isComponent)
            <x-dynamic-component :component="$iconStr" class="{{ $class }}" style="display: inline-block; width: 1.25em; height: 1.25em; vertical-align: -0.15em; fill: currentColor; {{ $style }}" />
        @else
            <i class="{{ $iconStr }} {{ $class }}" style="{{ $style }}"></i>
        @endif
    @endif
@endif

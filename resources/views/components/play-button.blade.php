@props([
    'size' => 80,
    'bg' => null,
    'color' => null,
])

@php
    $bgFill = $bg ?? setting('primary_color', '#70f46d');
    $iconFill = $color ?? setting('button_text_color', '#ffffff');
@endphp

<div class="play-button-wrapper d-inline-flex align-items-center justify-content-center position-relative">
    <div class="play-button-icon rounded-circle d-flex align-items-center justify-content-center"
         style="width: {{ $size }}px; height: {{ $size }}px; background-color: {{ $bgFill }};">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M8 5V19L19 12L8 5Z" fill="{{ $iconFill }}"/>
        </svg>
    </div>
</div>

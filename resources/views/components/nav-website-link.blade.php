@props(['active'])

@php
    $classes = $active ?? false ? 'custom-link-active' : '';
@endphp
<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes . ' my-auto mx-2 nav-link']) }}>
        {{ $slot }}
    </a>
</li>

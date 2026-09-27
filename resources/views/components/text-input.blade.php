@props(['name' => null, 'disabled' => false])

@php
    // Check if there is an error for the specific field name dynamically
    $hasError = $name && $errors->has($name);
    $classes = 'form-control' . ($hasError ? ' is-invalid' : '');
@endphp

<input @disabled($disabled) name="{{ $name }}" {{ $attributes->merge(['class' => $classes]) }}>
@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-capitalize']) }}>
    {{ $value ?? $slot }}
</label>

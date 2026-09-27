@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'small list-unstyled ps-0 mb-0 d-flex flex-column gap-1 text-danger']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif

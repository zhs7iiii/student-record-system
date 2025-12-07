@php
    $realMethod = $attributes->get('method', 'GET');
    $httpMethod = $realMethod === 'GET' ? 'GET' : 'POST';
@endphp

<form {{ $attributes->merge(['method' => $httpMethod, 'class' => 'text-xl w-full']) }}>
    @if ($realMethod !== 'GET')
        @csrf
        @method($realMethod)
    @endif

    {{ $slot }}
</form>

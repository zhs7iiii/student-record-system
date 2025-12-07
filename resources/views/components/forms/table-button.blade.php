@props(['bg', 'textColor'])
@php
    $classes = $bg . ' ' . $textColor . ' px-2 py-1 rounded font-bold'; 
@endphp
<button {{ $attributes(['class' => $classes]) }}>
    {{ $slot }}
</button>
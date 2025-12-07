@props(['label', 'name'])

@php
    $defaults = [
        'type' => 'date',
        'id' => $name,
        'name' => $name,
        'class' => 'border-b',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>

</x-forms.field>
@error($name)
    <p class="text-xs text-red-500 font-semibold ml-[11rem]">{{ $message }}</p>
@enderror
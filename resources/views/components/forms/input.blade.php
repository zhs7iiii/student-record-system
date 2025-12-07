@props(['label', 'name'])


@php
    $defaults =[
        'type' => 'text',
        'id' => $name,
        'name' => $name,
        'class' => 'flex-1 border border-gray-300',
        'value' => old($name)
    ];
@endphp

<x-forms.field :$label :$name>
    <input {{ $attributes($defaults) }}>
</x-forms.field>
@error($name)
    <p class="text-xs text-red-500 font-semibold ml-[11rem]">{{ $message }}</p>
@enderror
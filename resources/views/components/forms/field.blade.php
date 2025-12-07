@props(['label', 'name'])

<div class="flex w-full items-center mb-2">
    @if($label)
        <x-forms.label :$name :$label />
    @endif

    {{ $slot }}
</div>
@props(['card', 'color', 'borderColor'])

@php
    $linkAttributes = $borderColor.' flex justify-between border px-5 py-1 bg-gray-200 font-bold rounded-b ';

    if($attributes['href'] == ''){
        $headerClasses = $color.' w-full h-32 flex justify-between rounded ';
    }else{
        $headerClasses = $color.' w-full h-32 flex justify-between ';
    }

@endphp

<div class="w-1/3 py-4 px-5">
    <!-- Card Header -->
    <div class="{{ $headerClasses }}">
        <span class="text-5xl pl-10 pt-1 text-white font-bold">{{   $card['title']  }}</span>
        <div class=" flex flex-col justify-between items-end text-white pt-5 pb-1 px-5">
            <span class="text-5xl font-bold">{{ $card['num'] }}</span>
            <p class="text-sm">{{ $card['caption'] }}</p>
        </div>
    </div>
    @if ($attributes['href'])
        <!-- Card Link -->
        <a {{ $attributes->merge(['class' => $linkAttributes ]) }}>
            <span>{{ $card['details'] }}</span>
            <span>Go!</span>
        </a>
    @endif
</div>
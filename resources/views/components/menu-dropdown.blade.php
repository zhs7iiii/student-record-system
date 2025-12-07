@props(['links', 'title'])
<div x-data="{ open: false }" class="text-xl">
    <button @click="open = !open"
        class="flex items-center justify-between w-full px-3 py-2 rounded-md hover:bg-gray-300 transition shadow-sm">
        <span class="flex items-center gap-2">
            <!-- Icon -->
            {{ $title }}
        </span>

        <!-- Chevron -->
        <svg class="w-4 h-4 transform transition-transform" :class="open ? 'rotate-90' : ''" fill="none"
            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
        </svg>
    </button>

    <!-- DROPDOWN LINKS -->
    <div x-show="open" x-collapse class="mt-1 ml-8 space-y-1">
        @foreach ($links as $link)
            <a href="{{ $link['link'] }}" class="block px-3 py-1 rounded-md hover:bg-gray-300">{{ $link['caption'] }}</a>
        @endforeach
    </div>
</div>
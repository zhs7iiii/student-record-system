@props(['seasons'])
<x-layout title="Seasons">
    <x-slot:heading>View Seasons</x-slot:heading>
    <div class="mx-10 my-5 w-full">
        <div class="flex w-full">
            <div class="w-1/3">
                <span>Season*</span>
            </div>
            <div class="w-2/3">
                <span>Current Season: </span>
                <form action="/seasons" method="POST" class="mt-5">
                    @csrf
                    @foreach ($seasons as $season)
                        @if ($season->active)
                            <input name="active_season" type="text" hidden value="{{ $season->id }}">
                            <input checked type="radio" name="season" value="{{ $season->id }}">
                        @else
                            <input type="radio" name="season" value="{{ $season->id }}">
                        @endif
                        {{ $season->season_start }} - {{ $season->season_end }}
                        <br>
                    @endforeach
                    <x-forms.button>Update Session</x-forms.button>
                </form>
            </div>
        </div>
    </div>
</x-layout>
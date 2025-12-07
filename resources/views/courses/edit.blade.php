@props(['course'])
<x-layout title="Edit Course">
    <x-slot:heading>Edit Course</x-slot:heading>
    <form action="/courses/{{ $course->id }}" method="POST" class="w-full mx-10 my-5 text-xl">
        @csrf
        @method('PATCH')
        <x-forms.input label="Course Short Name:" name="shortName" value="{{ $course->short_name }}" />
        <x-forms.input label="Course Full Name:" name="fullName" value="{{ $course->full_name }}" />
        <x-forms.date label="Creation Date:" name="creationDate" value="{{ $course->created_at?->format('Y-m-d') }}"
            disabled />
        <x-forms.button>
            Update
        </x-forms.button>
    </form>
</x-layout>
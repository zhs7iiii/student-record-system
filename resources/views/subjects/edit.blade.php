@props(['subject', 'courses'])
<x-layout title="Edit Subject">
    <x-slot:heading>Edit Subject</x-slot:heading>
    <form action="/subjects/{{ $subject->id }}" method="POST" class="w-full mx-10 my-5 text-xl">
        @csrf
        @method('PATCH')
        <x-forms.select label="Course Short Name:" name="course">
            @foreach ($courses as $course)
                @if ($subject->course->id == $course->id)
                    <option selected value="{{ $course->id }}">{{ $course->short_name }}</option>
                @else
                    <option value="{{ $course->id }}">{{ $course->short_name }}</option>

                @endif
            @endforeach
        </x-forms.select>
        <x-forms.input label="Subject1:" name="subject1" value="{{ $subject->subject1 }}" />
        <x-forms.input label="Subject2:" name="subject2" value="{{ $subject->subject2 }}" />
        <x-forms.input label="Subject3:" name="subject3" value="{{ $subject->subject3 }}" />
        <x-forms.input label="Subject4:" name="subject4" value="{{ $subject->subject4 }}" />
        <x-forms.button>
            Update
        </x-forms.button>
    </form>
</x-layout>
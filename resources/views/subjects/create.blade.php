
@props(['courses'])
<x-layout title="Add Subject">
    <x-slot:heading>Add Subject</x-slot:heading>
    <x-forms.form action="/subjects" method="post" class="mx-10 my-5 text-xl">
        <x-forms.select label="Course Short Name" name="course">
            <option value="">--SELECT--</option>
            @foreach ($courses as $course)
                <option value="{{ $course->id }}">{{ $course->short_name }}</option>
            @endforeach
        </x-forms.select>
        <x-forms.input label="Subject1:" name="subject1" placeholder="Subject..." />
        <x-forms.input label="Subject2:" name="subject2" placeholder="Subject..." />
        <x-forms.input label="Subject3:" name="subject3" placeholder="Subject..." />
        <x-forms.input label="Subject4:" name="subject4" placeholder="Subject..." />
        <x-forms.button>
            Submit
        </x-forms.button>
    </x-forms.form>
</x-layout>
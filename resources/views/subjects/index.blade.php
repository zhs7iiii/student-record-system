@props(['subjects'])
@php
    $headers = ['No.', 'Course', 'Subject1', 'Subject2', 'Subject3', 'Subject4','Actions'];
@endphp
<x-layout title="Manage Courses">
    <x-slot:heading>Manage Courses</x-slot:heading>
    <div class="w-full mx-10 my-5">
        <table class="min-w-full border border-gray-300">
            <thead class="bg-gray-100">
                <tr>
                    @foreach ($headers as $header)
                        <th class="px-4 py-2 text-left border-b shadow-md">{{ $header }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($subjects as $subject)
                    <tr class="hover:bg-gray-200">
                        <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border-b">{{ $subject->course->short_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $subject->subject1 }}</td>
                        <td class="px-4 py-2 border-b">{{ $subject->subject2 }}</td>
                        <td class="px-4 py-2 border-b">{{ $subject->subject3 }}</td>
                        <td class="px-4 py-2 border-b">{{ $subject->subject4 }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="/subjects/{{ $subject->id }}/edit"
                                class="bg-green-400 px-2 py-1 text-white rounded font-bold">Edit</a>
                            <form action="/subjects/{{ $subject->id }}" method="post" class="inline">
                                @csrf
                                @method('DELETE')
                                <x-forms.table-button bg="bg-red-500" textColor="text-white">Delete</x-forms.table-button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layout>
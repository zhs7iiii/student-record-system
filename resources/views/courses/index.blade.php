@props(['courses'])
@php
    $headers = ['No.', 'Short Name', 'Full Name', 'Created Date', 'Action'];
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
                @foreach ($courses as $course)
                    <tr class="hover:bg-gray-200">
                        <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                        <td class="px-4 py-2 border-b">{{ $course->short_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $course->full_name }}</td>
                        <td class="px-4 py-2 border-b">{{ $course->created_at }}</td>
                        <td class="px-4 py-2 border-b">
                            <a href="/courses/{{ $course->id }}/edit"
                                class="bg-green-400 px-2 py-1 text-white rounded font-bold">Edit</a>
                            <form action="/courses/{{ $course->id }}" method="post" class="inline">
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
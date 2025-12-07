@props(['students'])
@php
    $headers = ['No.', 'Name', 'Email', 'Mob.No', 'Course', 'Subject', 'Action'];
@endphp
<x-layout title="View Students">
    <x-slot:heading>View Students</x-slot:heading>

    <table class="min-w-full border border-gray-300">
        <thead class="bg-gray-100">
            <tr>
                @foreach ($headers as $header)
                    <th class="px-4 py-2 text-left border-b shadow-md">{{ $header }}</th>
                @endforeach
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
                <tr class="hover:bg-gray-200">
                    <td class="px-4 py-2 border-b">{{ $loop->iteration }}</td>
                    <td class="px-4 py-2 border-b">{{ $student->first_name.' '.$student->middle_name.' '.$student->last_name }}</td>
                    <td class="px-4 py-2 border-b">{{ $student->email }}</td>
                    <td class="px-4 py-2 border-b">{{ $student->mobile_number }}</td>
                    <td class="px-4 py-2 border-b">{{ $student->course->short_name }}</td>
                    <td class="px-4 py-2 border-b">{{ $student->subject->subject1.'+'.$student->subject->subject2.'+'.$student->subject->subject3.'+'.$student->subject->subject4 }}</td>
                    <td class="px-4 py-2 border-b">
                        <a href="/students/{{ $student->id }}/edit"
                            class="bg-green-400 px-2 py-1 text-white rounded font-bold">Edit</a>
                        <form action="/students/{{ $student->id }}" method="post" class="inline">
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
<x-layout title="Add Course">
    <x-slot:heading>Add Course</x-slot:heading>

    <x-forms.form action="/courses" method="post" class="mx-10 my-5 text-xl">
        <x-forms.input label="Course Short Name:" name="shortName" placeholder="short name..." />
        <x-forms.input label="Course Full Name:" name="fullName" placeholder="full name..." />
        <x-forms.button>
            Submit
        </x-forms.button>
    </x-forms.form>
</x-layout>

@props(['user'=>null])
<x-layout title="Admin">
    <x-slot:heading>Admin Profile</x-slot:heading>

    <x-forms.form action="/admin" method="POST" class="mx-10 my-5 text-xl">
        <x-forms.input label="Name:" name="name" value="{{ $user->name }}"/>
        <x-forms.input label="Email ID:" name="email" value="{{ $user->email }}"/>
        <x-forms.button>
            Update Profile
        </x-forms.button>
    </x-forms.form>
</x-layout>
@props(['user'])
<x-layout title="Change Password">
    <x-slot:heading>Admin Change Password</x-slot:heading>
    <x-forms.form action="/password" method="POST" class="mx-10 my-5 text-xl">
        <x-forms.input label="Current Password:" name="current_password" type="password"/>
        <x-forms.input label="New Password:" name="password" type="password"/>
        <x-forms.input label="Confirm Password:" name="password_confirmation" type="password"/>
        <x-forms.button>
            Change
        </x-forms.button>
    </x-forms.form>
</x-layout>
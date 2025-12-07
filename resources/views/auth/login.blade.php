<x-layout title="Login">
    <x-slot:heading>Admin Login</x-slot:heading>

    <x-forms.form action="/login" method="POST" class="mx-10 my-5 text-xl">
        <x-forms.input label="Email:" name="email" />
        <x-forms.input label="Password:" name="password" type="password" />
        <x-forms.button>
            Login
        </x-forms.button>
    </x-forms.form>
</x-layout>
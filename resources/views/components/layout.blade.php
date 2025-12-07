<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{   $title  }}</title>
    <!-- Alpine -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>

    @vite('resources/css/app.css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Xanh+Mono:ital@0;1&display=swap" rel="stylesheet">

</head>

<body class="xanh-mono-regular">
    <!-- navbar -->
    <x-navbar>Student Management System</x-navbar>

    <div class="flex min-h-screen">
        <!-- sidebar -->

        <x-sidebar>
            @auth
                <x-sidebar-item href="/">Dashboard</x-sidebar-item>
                <x-menu-dropdown title="Course" :links="[['caption' => 'Add Course', 'link' => '/courses/create'], ['caption' => 'View', 'link' => '/courses']]" />
                <x-menu-dropdown title="Subject" :links="[['caption' => 'Add Subject', 'link' => '/subjects/create'], ['caption' => 'View', 'link' => '/subjects']]" />

                <x-sidebar-item href="/students/create">Register</x-sidebar-item>
                <x-sidebar-item href="/students">View Students</x-sidebar-item>
                <x-sidebar-item href="/seasons">Season</x-sidebar-item>

                <x-sidebar-item href="/password">Change Password</x-sidebar-item>
                <x-sidebar-item href="/admin">Admin Profile</x-sidebar-item>
                <form action="/logout" method="POST" class="">
                    @csrf
                    @method('DELETE')
                    <button class="shadow-sm mb-3 mx-2 text-xl block hover:bg-gray-300 py-2 w-full text-left">Logout</button>
                </form>
            @endauth
        </x-sidebar>

        <!-- main content -->
        <div class="flex-1 bg-white py-10 px-20">
            <h1 class="text-4xl">Welcome Admin</h1>
            <div class="mt-10">
                <h2 class="text-2xl w-full bg-gray-300 border px-5 py-1">{{ $heading }}</h2>
                <div class="flex flex-wrap w-full border-l border-r border-b rounded-b">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </div>
</body>

</html>
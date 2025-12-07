<x-layout title="Dashboard">
    <x-slot:heading>Dashboard</x-slot:heading>
    <x-dashboard-card color="bg-blue-400" borderColor="border-blue-400" href="/courses" :card="[
        'title' => 'Courses',
        'num' => 6,
        'caption' => 'Listed Courses',
        'details' => 'View Details'
    ]" />
    <x-dashboard-card color="bg-green-400" borderColor="border-green-400" href="/subjects" :card="[
        'title' => 'Subjects',
        'num' => 4,
        'caption' => 'List Subjects',
        'details' => 'Courses Wise Subjects'
    ]" />
    <x-dashboard-card color="bg-yellow-400" borderColor="border-yellow-400" href="/students" :card="[
        'title' => 'Students',
        'num' => 3,
        'caption' => 'Total Students',
        'details' => 'View Details'
    ]" />


    <x-dashboard-card color="bg-red-400" borderColor="border-red-400" href="" :card="[
        'title' => 'Countries',
        'num' => 246,
        'caption' => 'Listed Countries',
        'details' => 'View Details'
    ]" />
    <x-dashboard-card color="bg-yellow-400" borderColor="border-yellow-400" href="" :card="[
        'title' => 'States',
        'num' => 4200,
        'caption' => 'Listed States',
        'details' => 'View Details'
    ]" />
    <x-dashboard-card color="bg-blue-400" borderColor="border-blue-400" href="" :card="[
        'title' => 'Cities',
        'num' => 47576,
        'caption' => 'List Cities',
        'details' => 'View Details'
    ]" />
</x-layout>
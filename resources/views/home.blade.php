@extends('layouts.guest')

@section('content')
<div class="flex flex-col items-center text-center space-y-8">

    {{-- Logo --}}
    <img src="{{ asset('logo.png') }}" alt="Public Transport Logo" class="w-40 h-auto drop-shadow-md">

    {{-- Title --}}
    <h1 class="text-4xl font-extrabold text-green-700 leading-tight">
        Welcome to the Public Transport System
    </h1>

    {{-- Subtitle --}}
    <p class="text-gray-600 text-base max-w-xl">
        Book your rides, view schedules, and manage transport efficiently — all in one place.
    </p>

    {{-- Login Button --}}
    <a href="{{ route('login') }}"
   class="bg-green-600 text-white text-lg font-bold px-8 py-3 rounded-lg shadow hover:bg-green-700 transition duration-300 ease-in-out">
    Login
</a>



    {{-- Feature Highlights --}}
    <div class="grid md:grid-cols-2 gap-6 mt-10 max-w-4xl">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-green-700 mb-2">🗺️ Routes</h3>
            <p class="text-gray-600 text-sm">Explore available routes and plan your journey with ease.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-green-700 mb-2">🚐 Vehicles</h3>
            <p class="text-gray-600 text-sm">View vehicle details and capacity before booking.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-green-700 mb-2">📅 Schedules</h3>
            <p class="text-gray-600 text-sm">Stay updated with real-time scheduling and availability.</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
            <h3 class="text-lg font-semibold text-green-700 mb-2">📋 Bookings</h3>
            <p class="text-gray-600 text-sm">Book your seat, track status, and manage your trips.</p>
        </div>
    </div>

</div>
@endsection


@extends('layouts.guest')

@section('content')
<div class="space-y-8">

    {{-- Title --}}
    <div class="text-center">
        <h1 class="text-4xl font-extrabold text-green-700 mb-2">About the Public Transport System</h1>
        <p class="text-gray-600 max-w-2xl mx-auto">
            A modern platform designed to simplify commuting, improve transparency, and ensure reliable journeys.
        </p>
    </div>

    {{-- Mission Section --}}
    <section class="bg-green-50 p-6 rounded-lg shadow-sm">
        <h2 class="text-2xl font-semibold text-green-800 mb-3">🎯 Our Mission</h2>
        <p class="text-gray-700 leading-relaxed">
            To modernize public transport management by combining technology with real-world workflows. 
            We aim to reduce overcrowding, improve transparency, and ensure every passenger enjoys a safe and reliable journey.
        </p>
    </section>

    {{-- Features Section --}}
    <section class="grid md:grid-cols-2 gap-6">
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-green-700 mb-2">🚐 Vehicle Management</h3>
            <p class="text-gray-600">Admins can add, edit, and monitor vehicles with capacity tracking.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-green-700 mb-2">🛣️ Route Management</h3>
            <p class="text-gray-600">Define and manage routes with origin, destination, and distance details.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-green-700 mb-2">📅 Scheduling</h3>
            <p class="text-gray-600">Create and update schedules to match real commuter needs.</p>
        </div>
        <div class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
            <h3 class="text-xl font-semibold text-green-700 mb-2">📋 Bookings</h3>
            <p class="text-gray-600">Passengers can book seats, view history, and track status (pending, confirmed, cancelled).</p>
        </div>
    </section>

    {{-- Roles Section --}}
    <section class="bg-green-50 p-6 rounded-lg shadow-sm">
        <h2 class="text-2xl font-semibold text-green-800 mb-3">👥 Who Can Use the System?</h2>
        <ul class="list-disc pl-6 text-gray-700 space-y-1">
            <li><strong>Admins:</strong> Full control over routes, vehicles, schedules, and bookings.</li>
            <li><strong>Passengers:</strong> Easy booking and schedule viewing.</li>
            <li><strong>Inspectors:</strong> Monitoring and compliance tools to ensure smooth operations.</li>
        </ul>
    </section>

    {{-- Future Plans --}}
    <section class="bg-white p-6 rounded-lg shadow hover:shadow-md transition">
        <h2 class="text-2xl font-semibold text-green-700 mb-3">🚀 Future Plans</h2>
        <p class="text-gray-700 leading-relaxed">
            We plan to integrate mobile notifications, real-time vehicle tracking, and advanced analytics dashboards 
            to provide even more value to commuters and administrators.
        </p>
    </section>

    {{-- Contact --}}
    <section class="text-center">
        <h2 class="text-2xl font-semibold text-green-800 mb-2">📩 Contact Us</h2>
        <p class="text-gray-600">
            For inquiries, feedback, or support, reach out at 
            <a href="mailto:support@publictransport.com" class="text-green-700 hover:underline">support@publictransport.com</a>.
        </p>
    </section>

</div>
@endsection

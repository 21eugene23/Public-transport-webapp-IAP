@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Schedule Details</h2>

<div class="space-y-3 bg-white border rounded shadow p-4">
    <p><strong>ID:</strong> {{ $schedule->id }}</p>
    <p><strong>Route:</strong> {{ $schedule->route_id }}</p>
    <p><strong>Vehicle:</strong> {{ $schedule->vehicle_id }}</p>
    <p><strong>Departure Time:</strong> {{ $schedule->departure_time }}</p>
    <p><strong>Arrival Time:</strong> {{ $schedule->arrival_time }}</p>
</div>

<div class="flex gap-3 mt-6">
    <a href="{{ route('schedules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Back
    </a>
    <a href="{{ route('schedules.edit', $schedule->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit
    </a>
    <form action="{{ route('schedules.destroy', $schedule->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Delete
        </button>
    </form>
</div>
@endsection

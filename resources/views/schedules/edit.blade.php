@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Schedule</h2>

<form action="{{ route('schedules.update', $schedule->id) }}" method="POST" class="space-y-4 bg-white border rounded shadow p-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-medium">Route</label>
        <input type="text" name="route_id" value="{{ $schedule->route_id }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Vehicle</label>
        <input type="text" name="vehicle_id" value="{{ $schedule->vehicle_id }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Departure Time</label>
        <input type="datetime-local" name="departure_time" value="{{ $schedule->departure_time }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Arrival Time</label>
        <input type="datetime-local" name="arrival_time" value="{{ $schedule->arrival_time }}" class="w-full border rounded px-3 py-2" required>
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Update
    </button>
    <a href="{{ route('schedules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Cancel
    </a>
</form>
@endsection

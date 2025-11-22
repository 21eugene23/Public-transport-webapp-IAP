@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Create New Schedule</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('schedules.store') }}" method="POST" class="space-y-4 bg-white border rounded shadow p-4">
    @csrf

    <div>
        <label class="block font-medium">Route</label>
        <select name="route_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Select Route --</option>
            @foreach($routes as $route)
                <option value="{{ $route->id }}">{{ $route->name }}</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium">Vehicle</label>
        <select name="vehicle_id" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Select Vehicle --</option>
            @foreach($vehicles as $vehicle)
                <option value="{{ $vehicle->id }}">{{ $vehicle->name }} ({{ $vehicle->registration_number }})</option>
            @endforeach
        </select>
    </div>

    <div>
        <label class="block font-medium">Departure Time</label>
        <input type="datetime-local" name="departure_time" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Arrival Time</label>
        <input type="datetime-local" name="arrival_time" class="w-full border rounded px-3 py-2" required>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Save
        </button>
        <a href="{{ route('schedules.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Cancel
        </a>
    </div>
</form>
@endsection

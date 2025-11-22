@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Vehicle Details</h2>

<div class="space-y-3 bg-white border rounded shadow p-4">
    <p><strong>Name:</strong> {{ $vehicle->name }}</p>
    <p><strong>Type:</strong> {{ $vehicle->type }}</p>
    <p><strong>Registration Number:</strong> {{ $vehicle->registration_number }}</p>
    <p><strong>Capacity:</strong> {{ $vehicle->capacity }}</p>
</div>

<div class="flex gap-3 mt-6">
    <a href="{{ route('vehicles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Back
    </a>
    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit
    </a>
</div>
@endsection

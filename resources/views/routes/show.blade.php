@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Route Details</h2>

<div class="space-y-3 bg-white border rounded shadow p-4">
    <p><strong>Origin:</strong> {{ $route->origin }}</p>
    <p><strong>Destination:</strong> {{ $route->destination }}</p>
    <p><strong>Distance (km):</strong> {{ $route->distance_km }}</p>
</div>

<div class="flex gap-3 mt-6">
    <a href="{{ route('routes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Back
    </a>
    <a href="{{ route('routes.edit', $route->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit
    </a>
</div>
@endsection

@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Route</h2>

<form action="{{ route('routes.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label class="block font-semibold">Origin</label>
        <input type="text" name="origin" class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Destination</label>
        <input type="text" name="destination" class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Distance (km)</label>
        <input type="number" name="distance_km" class="border p-2 w-full rounded" required>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Save
        </button>
        <a href="{{ route('routes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
</form>
@endsection

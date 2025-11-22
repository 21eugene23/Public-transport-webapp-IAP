@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Route</h2>

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('routes.update', $route->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Origin</label>
        <input type="text" name="origin" value="{{ old('origin', $route->origin) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Destination</label>
        <input type="text" name="destination" value="{{ old('destination', $route->destination) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Distance (km)</label>
        <input type="number" name="distance_km" value="{{ old('distance_km', $route->distance_km) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Route
        </button>
        <a href="{{ route('routes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
</form>
@endsection

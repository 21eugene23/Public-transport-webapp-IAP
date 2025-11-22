@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Vehicle</h2>

@if($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('vehicles.update', $vehicle->id) }}" method="POST" class="space-y-4">
    @csrf
    @method('PUT')

    <div>
        <label class="block font-semibold">Name</label>
        <input type="text" name="name" value="{{ old('name', $vehicle->name) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Type</label>
        <input type="text" name="type" value="{{ old('type', $vehicle->type) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Registration Number</label>
        <input type="text" name="registration_number" value="{{ old('registration_number', $vehicle->registration_number) }}" 
               class="border p-2 w-full rounded" required>
    </div>

    <div>
        <label class="block font-semibold">Capacity</label>
        <input type="number" name="capacity" value="{{ old('capacity', $vehicle->capacity) }}" 
               class="border p-2 w-full rounded">
    </div>

    <div class="flex gap-3">
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
            Update Vehicle
        </button>
        <a href="{{ route('vehicles.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Back
        </a>
    </div>
</form>
@endsection

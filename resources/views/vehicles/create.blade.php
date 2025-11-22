@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Add Vehicle</h2>

<form action="{{ route('vehicles.store') }}" method="POST" class="space-y-4">
    @csrf

    <div>
        <label>Name</label>
        <input type="text" name="name" class="border p-2 w-full" required>
    </div>

    <div>
        <label>Type</label>
        <input type="text" name="type" class="border p-2 w-full" required>
    </div>

    <div>
        <label>Registration Number</label>
        <input type="text" name="registration_number" class="border p-2 w-full" required>
    </div>

    <div>
        <label>Capacity</label>
        <input type="number" name="capacity" class="border p-2 w-full">
    </div>

    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">
        Save
    </button>
</form>
@endsection

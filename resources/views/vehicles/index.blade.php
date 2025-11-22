@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Vehicles</h2>
        <a href="{{ route('vehicles.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Vehicle
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($vehicles->count())
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">Name</th>
                    <th class="px-4 py-2">Type</th>
                    <th class="px-4 py-2">Registration</th>
                    <th class="px-4 py-2">Capacity</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vehicles as $vehicle)
                    <tr class="border-t">
                        <td class="px-4 py-2 font-semibold">{{ $vehicle->name }}</td>
                        <td class="px-4 py-2">{{ ucfirst($vehicle->type) }}</td>
                        <td class="px-4 py-2">{{ $vehicle->registration_number }}</td>
                        <td class="px-4 py-2">{{ $vehicle->capacity }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            {{-- View --}}
                            <a href="{{ route('vehicles.show', $vehicle) }}" class="text-blue-600 hover:text-blue-800" title="View Vehicle">
                                👁️
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('vehicles.edit', $vehicle) }}" class="text-yellow-500 hover:text-yellow-700" title="Edit Vehicle">
                                ✏️
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('vehicles.destroy', $vehicle) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this vehicle?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Delete Vehicle">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No vehicles available.</p>
    @endif
@endsection

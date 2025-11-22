@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Routes</h2>
        <a href="{{ route('routes.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">New Route</a>
    </div>

    @if ($routes->count())
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">Origin</th>
                    <th class="px-4 py-2">Destination</th>
                    <th class="px-4 py-2">Distance (km)</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($routes as $route)
                    <tr class="border-t">
                        <td class="px-4 py-2">{{ $route->origin }}</td>
                        <td class="px-4 py-2">{{ $route->destination }}</td>
                        <td class="px-4 py-2">{{ $route->distance_km }}</td>
                        <td class="px-4 py-2 flex space-x-2">
                            {{-- View --}}
                            <a href="{{ route('routes.show', $route) }}" class="text-blue-600 hover:text-blue-800" title="View">
                                👁️
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('routes.edit', $route) }}" class="text-yellow-500 hover:text-yellow-700" title="Edit">
                                ✏️
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('routes.destroy', $route) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-800" title="Delete">
                                    🗑️
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p class="text-gray-600">No routes found.</p>
    @endif
@endsection


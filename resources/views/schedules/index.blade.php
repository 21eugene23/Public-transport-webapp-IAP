@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Schedules</h2>

        <a href="{{ route('schedules.create') }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Schedule
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($schedules->count())
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Route</th>
                    <th class="px-4 py-2">Vehicle</th>
                    <th class="px-4 py-2">Departure</th>
                    <th class="px-4 py-2">Arrival</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($schedules as $schedule)
                    <tr class="border-t">
                        <td class="px-4 py-2 font-semibold">{{ $schedule->id }}</td>

                        <td class="px-4 py-2">
                            {{ $schedule->route->origin }} → {{ $schedule->route->destination }}
                        </td>

                        <td class="px-4 py-2">{{ $schedule->vehicle->name }}</td>

                        <td class="px-4 py-2">{{ $schedule->departure_time }}</td>
                        <td class="px-4 py-2">{{ $schedule->arrival_time }}</td>

                        <td class="px-4 py-2 flex space-x-3">

                            {{-- View --}}
                            <a href="{{ route('schedules.show', $schedule) }}"
                               class="text-blue-600 hover:text-blue-800"
                               title="View Schedule">
                                👁️
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('schedules.edit', $schedule) }}"
                               class="text-yellow-500 hover:text-yellow-700"
                               title="Edit Schedule">
                                ✏️
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('schedules.destroy', $schedule) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this schedule?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800"
                                        title="Delete Schedule">
                                    🗑️
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p class="text-gray-600">No schedules available.</p>
    @endif
@endsection

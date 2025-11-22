@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Bookings</h2>

        <a href="{{ route('bookings.create') }}" 
           class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Add Booking
        </a>
    </div>

    {{-- Success Message --}}
    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if ($bookings->count())
        <table class="min-w-full bg-white border rounded shadow">
            <thead class="bg-gray-100 text-left">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">Passenger</th>
                    <th class="px-4 py-2">Route / Vehicle</th>
                    <th class="px-4 py-2">Seat</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($bookings as $booking)
                    <tr class="border-t">
                        <td class="px-4 py-2 font-semibold">{{ $booking->id }}</td>

                        <td class="px-4 py-2">{{ $booking->passenger_name }}</td>

                        <td class="px-4 py-2">
                            {{ $booking->schedule->route->origin ?? 'N/A' }}
                            →
                            {{ $booking->schedule->route->destination ?? 'N/A' }},
                            Vehicle: {{ $booking->schedule->vehicle->name ?? 'N/A' }}
                        </td>

                        <td class="px-4 py-2">Seat {{ $booking->seat_number }}</td>

                        <td class="px-4 py-2">
                            @if($booking->status === 'pending')
                                <span class="bg-yellow-100 text-yellow-800 px-2 py-1 rounded-full text-sm font-semibold">
                                    Pending
                                </span>
                            @elseif($booking->status === 'cancelled')
                                <span class="bg-red-100 text-red-800 px-2 py-1 rounded-full text-sm font-semibold">
                                    Cancelled
                                </span>
                            @elseif($booking->status === 'success')
                                <span class="bg-green-100 text-green-800 px-2 py-1 rounded-full text-sm font-semibold">
                                    Success
                                </span>
                            @else
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded-full text-sm font-semibold">
                                    {{ ucfirst($booking->status) }}
                                </span>
                            @endif
                        </td>

                        <td class="px-4 py-2 flex space-x-3">

                            {{-- View --}}
                            <a href="{{ route('bookings.show', $booking->id) }}"
                               class="text-blue-600 hover:text-blue-800"
                               title="View Booking">
                                👁️
                            </a>

                            {{-- Edit --}}
                            <a href="{{ route('bookings.edit', $booking->id) }}"
                               class="text-yellow-500 hover:text-yellow-700"
                               title="Edit Booking">
                                ✏️
                            </a>

                            {{-- Delete --}}
                            <form action="{{ route('bookings.destroy', $booking->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Are you sure you want to delete this booking?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-red-600 hover:text-red-800"
                                        title="Delete Booking">
                                    🗑️
                                </button>
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

    @else
        <p class="text-gray-600">No bookings available.</p>
    @endif
@endsection

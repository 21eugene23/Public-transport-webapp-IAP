@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Booking Details</h2>

<div class="space-y-3 bg-white border rounded shadow p-4">
    <p><strong>ID:</strong> {{ $booking->id }}</p>
    <p><strong>Passenger:</strong> {{ $booking->user->name }}</p>
    <p><strong>Schedule:</strong> #{{ $booking->schedule->id }}</p>
    <p><strong>Seats:</strong> {{ $booking->seats }}</p>
    <p><strong>Status:</strong> {{ ucfirst($booking->status) }}</p>
</div>

<div class="flex gap-3 mt-6">
    <a href="{{ route('bookings.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
        Back
    </a>
    <a href="{{ route('bookings.edit', $booking->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Edit
    </a>
    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Are you sure?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
            Delete
        </button>
    </form>
</div>
@endsection

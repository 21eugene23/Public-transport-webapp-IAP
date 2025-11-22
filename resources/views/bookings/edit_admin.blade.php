@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit Booking Status</h2>

<form action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf @method('PUT')

    <div>
        <label class="block font-medium">Status</label>
        <select name="status" class="w-full border rounded px-3 py-2">
            <option value="pending" {{ $booking->status == 'pending' ? 'selected' : '' }}>Pending</option>
            <option value="confirmed" {{ $booking->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
            <option value="cancelled" {{ $booking->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
        </select>
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Update</button>
</form>
@endsection

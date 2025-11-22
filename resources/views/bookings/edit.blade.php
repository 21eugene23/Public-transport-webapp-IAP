@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Edit My Booking</h2>

<form action="{{ route('bookings.update', $booking->id) }}" method="POST">
    @csrf @method('PUT')

    <div>
        <label class="block font-medium">Passenger Name</label>
        <input type="text" name="passenger_name" value="{{ $booking->passenger_name }}" class="w-full border rounded px-3 py-2">
    </div>

    <div>
        <label class="block font-medium">Seat Number</label>
        <input type="number" name="seat_number" value="{{ $booking->seat_number }}" class="w-full border rounded px-3 py-2">
    </div>

    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded mt-4">Update</button>
</form>
@endsection


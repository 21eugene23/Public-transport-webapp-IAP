@extends('layouts.app')

@section('content')
<h2 class="text-xl font-bold mb-4">Create New Booking</h2>

@if ($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
        <ul class="list-disc pl-5">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

{{-- Step 1: Select schedule --}}
<form method="GET" action="{{ route('bookings.create') }}" class="mb-6">
    <label class="block font-medium mb-2">Choose Schedule</label>
    <select name="schedule_id" class="w-full border rounded px-3 py-2 mb-2" required>
        <option value="">-- Select Schedule --</option>
        @foreach($schedules as $schedule)
            <option value="{{ $schedule->id }}" {{ request('schedule_id') == $schedule->id ? 'selected' : '' }}>
                Schedule #{{ $schedule->id }} 
                (Route {{ $schedule->route->name ?? $schedule->route_id }}, 
                 Vehicle {{ $schedule->vehicle->name ?? $schedule->vehicle_id }})
            </option>
        @endforeach
    </select>
    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
        Load Seats
    </button>
</form>

{{-- Step 2: Booking form --}}
@if(request('schedule_id') && count($availableSeats))
<form action="{{ route('bookings.store') }}" method="POST" class="space-y-4 bg-white border rounded shadow p-4">
    @csrf
    <input type="hidden" name="schedule_id" value="{{ request('schedule_id') }}">

    <div>
        <label class="block font-medium">Passenger Name</label>
        <input type="text" name="passenger_name" class="w-full border rounded px-3 py-2" required>
    </div>

    <div>
        <label class="block font-medium">Seat Number</label>
        <select name="seat_number" class="w-full border rounded px-3 py-2" required>
            <option value="">-- Select Seat --</option>
            @foreach($availableSeats as $seat)
                <option value="{{ $seat }}">Seat {{ $seat }}</option>
            @endforeach
        </select>
    </div>

    <div class="flex gap-4">
        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            Save
        </button>
        <a href="{{ route('bookings.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Cancel
        </a>
    </div>
</form>
@elseif(request('schedule_id'))
    <div class="text-red-600 font-medium">No available seats for this schedule.</div>
@endif
@endsection

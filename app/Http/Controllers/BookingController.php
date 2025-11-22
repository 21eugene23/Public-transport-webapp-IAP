<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Schedule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of bookings.
     */
    public function index()
    {
        // eager load schedule, vehicle, route for display
        $bookings = Booking::with(['schedule.vehicle', 'schedule.route'])->get();
        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new booking.
     * Only passengers can create bookings.
     */
    public function create(Request $request)
    {
        if (Auth::user()->role !== 'passenger') {
            abort(403, 'Forbidden');
        }

        $schedules = Schedule::with('vehicle', 'route')->get();
        $availableSeats = [];

        // If a schedule is selected, calculate available seats
        if ($request->has('schedule_id')) {
            $schedule = Schedule::with('vehicle')->findOrFail($request->schedule_id);

            $takenSeats = Booking::where('schedule_id', $schedule->id)
                                 ->pluck('seat_number')
                                 ->toArray();

            $capacity = $schedule->vehicle->capacity;
            $availableSeats = collect(range(1, $capacity))->diff($takenSeats);
        }

        return view('bookings.create', compact('schedules', 'availableSeats'));
    }

    /**
     * Store a newly created booking in storage.
     * Only passengers can store bookings.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'passenger') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'schedule_id'     => 'required|exists:schedules,id',
            'seat_number'     => 'required|integer|min:1',
            'passenger_name'  => 'required|string|max:255',
        ]);

        // prevent double booking
        if (Booking::where('schedule_id', $validated['schedule_id'])
                   ->where('seat_number', $validated['seat_number'])
                   ->exists()) {
            return back()->withErrors(['seat_number' => 'This seat is already taken.']);
        }

        Booking::create([
            'schedule_id'    => $validated['schedule_id'],
            'user_id'        => Auth::id(), // who made the booking
            'seat_number'    => $validated['seat_number'],
            'passenger_name' => $validated['passenger_name'],
            'status'         => 'pending',
        ]);

        return redirect()->route('bookings.index')->with('success', 'Seat booked successfully.');
    }

    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     * Admin → edit status only
     * Passenger → edit own booking (name + seat only)
     * Inspector → forbidden
     */
    public function edit(Booking $booking)
    {
        $role = Auth::user()->role;

        if ($role === 'inspector') {
            abort(403, 'Forbidden');
        }

        if ($role === 'passenger' && $booking->user_id !== Auth::id()) {
            abort(403, 'Forbidden');
        }

        if ($role === 'admin') {
            return view('bookings.edit_admin', compact('booking'));
        }

        if ($role === 'passenger' && $booking->user_id !== Auth::id()) {
         abort(403, 'Forbidden');
}
        return view('bookings.edit', compact('booking'));
    }

    /**
     * Update the specified booking.
     */
    public function update(Request $request, Booking $booking)
    {
        $role = Auth::user()->role;

        if ($role === 'inspector') {
            abort(403, 'Forbidden');
        }

        if ($role === 'passenger') {
            $validated = $request->validate([
                'passenger_name' => 'required|string|max:255',
                'seat_number'    => 'required|integer|min:1',
            ]);

            if ($booking->user_id !== Auth::id()) {
                abort(403, 'Forbidden');
            }

            $booking->update($validated);
        }

        if ($role === 'admin') {
            $validated = $request->validate([
                'status' => 'required|string|in:pending,confirmed,cancelled',
            ]);

            $booking->update($validated);
        }

        return redirect()->route('bookings.index')->with('success','Booking updated successfully.');
    }

    /**
     * Remove the specified booking from storage.
     * Only passengers can delete their own bookings.
     */
    public function destroy(Booking $booking)
    {
        if (Auth::user()->role !== 'passenger') {
            abort(403, 'Forbidden');
        }

        if ($booking->user_id !== Auth::id()) {
            abort(403, 'Forbidden');
        }

        $booking->delete();
        return back()->with('success','Booking deleted successfully.');
    }
}

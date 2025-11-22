<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Route;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
    /**
     * Display a listing of schedules.
     * Everyone can view schedules.
     */
    public function index()
    {
        $schedules = Schedule::with(['vehicle','route'])->get();
        return view('schedules.index', compact('schedules'));
    }

    /**
     * Display the specified schedule.
     * Everyone can view a single schedule.
     */
    public function show(Schedule $schedule)
    {
        return view('schedules.show', compact('schedule'));
    }

    /**
     * Show the form for creating a new schedule.
     * Only admin can create.
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $routes = Route::all();
        $vehicles = Vehicle::all();
        return view('schedules.create', compact('routes','vehicles'));
    }

    /**
     * Store a newly created schedule.
     * Only admin can store.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'route_id'   => 'required|exists:routes,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'departure_time' => 'required|date',
            'arrival_time'   => 'required|date|after:departure_time',
        ]);

        Schedule::create($validated);

        return redirect()->route('schedules.index')->with('success','Schedule created successfully.');
    }

/**
 * Show the form for editing the specified schedule.
 * Only admin can edit.
 */
public function edit(Schedule $schedule)
{
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Forbidden');
    }

    $routes = Route::all();
    $vehicles = Vehicle::all();
    return view('schedules.edit', compact('schedule', 'routes', 'vehicles'));
}

public function update(Request $request, Schedule $schedule)
{
    if (Auth::user()->role !== 'admin') {
        abort(403, 'Forbidden');
    }

    $validated = $request->validate([
        'route_id'   => 'required|exists:routes,id',
        'vehicle_id' => 'required|exists:vehicles,id',
        'departure_time' => 'required|date',
        'arrival_time'   => 'required|date|after:departure_time',
    ]);

    $schedule->update($validated);

    return redirect()->route('schedules.index')->with('success','Schedule updated successfully.');
}


    /**
     * Remove the specified schedule.
     * Only admin can delete.
     */
    public function destroy(Schedule $schedule)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $schedule->delete();
        return back()->with('success','Schedule deleted successfully.');
    }
}

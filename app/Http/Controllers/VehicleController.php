<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VehicleController extends Controller
{
    /**
     * Display a listing of vehicles.
     * Everyone can view vehicles.
     */
    public function index()
    {
        $vehicles = Vehicle::all();
        return view('vehicles.index', compact('vehicles'));
    }

    /**
     * Display the specified vehicle.
     * Everyone can view a single vehicle.
     */
    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    /**
     * Show the form for creating a new vehicle.
     * Only admin can create.
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        return view('vehicles.create');
    }

    /**
     * Store a newly created vehicle.
     * Only admin can store.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'type'     => 'required|string|max:255',
            'registration_number'    => 'required|string|max:50|unique:vehicles,registration_number',
        ]);

        Vehicle::create($validated);

        return redirect()->route('vehicles.index')->with('success','Vehicle created successfully.');
    }

    /**
     * Show the form for editing the specified vehicle.
     * Only admin can edit.
     */
    public function edit(Vehicle $vehicle)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        return view('vehicles.edit', compact('vehicle'));
    }

    /**
     * Update the specified vehicle.
     * Only admin can update.
     */
    public function update(Request $request, Vehicle $vehicle)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'type'     => 'required|string|max:255',
            'capacity' => 'required|integer|min:1',
            'registration_number'    => 'required|string|max:50|unique:vehicles,registration_number,' . $vehicle->id,
        ]);

        $vehicle->update($validated);

        return redirect()->route('vehicles.index')->with('success','Vehicle updated successfully.');
    }

    /**
     * Remove the specified vehicle.
     * Only admin can delete.
     */
    public function destroy(Vehicle $vehicle)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $vehicle->delete();
        return back()->with('success','Vehicle deleted successfully.');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RouteController extends Controller
{
    /**
     * Display a listing of routes.
     * Everyone can view routes.
     */
    public function index()
    {
        $routes = Route::all();
        return view('routes.index', compact('routes'));
    }

    /**
     * Display the specified route.
     * Everyone can view a single route.
     */
    public function show(Route $route)
    {
        return view('routes.show', compact('route'));
    }

    /**
     * Show the form for creating a new route.
     * Only admin can create.
     */
    public function create()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        return view('routes.create');
    }

    /**
     * Store a newly created route.
     * Only admin can store.
     */
    public function store(Request $request)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'origin'      => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance_km' => 'required|integer|min:1',
        ]);

        Route::create($validated);

        return redirect()->route('routes.index')->with('success', 'Route created successfully!');
    }

    /**
     * Show the form for editing the specified route.
     * Only admin can edit.
     */
    public function edit(Route $route)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        return view('routes.edit', compact('route'));
    }

    /**
     * Update the specified route.
     * Only admin can update.
     */
    public function update(Request $request, Route $route)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $validated = $request->validate([
            'origin'      => 'required|string|max:255',
            'destination' => 'required|string|max:255',
            'distance_km' => 'required|integer|min:1',
        ]);

        $route->update($validated);

        return redirect()->route('routes.index')->with('success', 'Route updated successfully!');
    }

    /**
     * Remove the specified route.
     * Only admin can delete.
     */
    public function destroy(Route $route)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Forbidden');
        }

        $route->delete();
        return redirect()->route('routes.index')->with('success', 'Route deleted successfully.');
    }
}

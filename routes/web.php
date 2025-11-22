<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public pages
Route::get('/', function () {
    return view('home');   // Home page
})->name('home');

Route::get('/about', function () {
    return view('about');  // About page
})->name('about');

// Auth routes (Breeze, Jetstream, etc.)
require __DIR__.'/auth.php';

// Protected routes
Route::middleware(['auth'])->group(function () {

    // Role-aware dashboard redirect
    Route::get('/dashboard', function () {
        $role = Auth::user()->role;
        return match ($role) {
            'admin'     => redirect()->route('admin.dashboard'),
            'passenger' => redirect()->route('passenger.dashboard'),
            'inspector' => redirect()->route('inspector.dashboard'),
            default     => abort(403),
        };
    })->name('dashboard');

    // CRUD routes
    Route::resource('routes', RouteController::class);
    Route::resource('vehicles', VehicleController::class);
    Route::resource('schedules', ScheduleController::class);
    Route::resource('bookings', BookingController::class);

    // Role-specific dashboards
    Route::get('/dashboard/admin', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/dashboard/passenger', fn() => view('passenger.dashboard'))->name('passenger.dashboard');
    Route::get('/dashboard/inspector', fn() => view('inspector.dashboard'))->name('inspector.dashboard');
});

// Logout redirect to home
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('home');
})->name('logout');

<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('routes', RouteController::class);
Route::resource('vehicles', VehicleController::class);
Route::resource('schedules', ScheduleController::class);
Route::resource('bookings', BookingController::class);


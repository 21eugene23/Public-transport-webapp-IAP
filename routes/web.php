<?php
use Illuminate\Support\Facades\Route;
Route::get('/', function(){ return view('routes.index'); })->name('home');
Route::resource('routes', 'App\Http\Controllers\RouteController');
Route::resource('vehicles', 'App\Http\Controllers\VehicleController');
Route::resource('schedules', 'App\Http\Controllers\ScheduleController');
Route::resource('bookings', 'App\Http\Controllers\BookingController');
Route::get('login', function(){ return view('auth.login'); })->name('login');
Route::get('register', function(){ return view('auth.register'); })->name('register');

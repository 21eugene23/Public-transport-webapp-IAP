@extends('layouts.guest')
@section('title','Login')

@section('content')
<div class="max-w-md mx-auto bg-white p-8 rounded-xl shadow-lg space-y-6">

    {{-- Logo --}}
    <div class="flex justify-center">
        <img src="{{ asset('logo.png') }}" alt="Public Transport Logo" class="w-24 h-auto drop-shadow-md">
    </div>

    {{-- Title --}}
    <h2 class="text-2xl font-bold text-center text-green-700">Login to Your Account</h2>
    <p class="text-gray-600 text-center text-sm">
        Access routes, schedules, and bookings with ease.
    </p>
    {{-- Error Messages --}}
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            <ul class="list-disc pl-5 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form --}}
    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        {{-- Email --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
            <input name="email" type="email"
                   class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   required>
        </div>

        {{-- Password --}}
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
            <input name="password" type="password"
                   class="w-full border border-gray-300 px-3 py-2 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-green-500"
                   required>
        </div>

        {{-- Actions --}}
        <div class="flex items-center justify-between">
            <button type="submit"
                    class="px-6 py-2 bg-gradient-to-r from-green-600 to-emerald-500 text-white font-semibold rounded-full shadow hover:scale-105 hover:shadow-lg transition duration-300 ease-in-out">
                Login
            </button>
            <a href="{{ route('register') }}" class="text-sm text-green-700 hover:underline">
                Create account
            </a>
        </div>
    </form>
</div>
@endsection

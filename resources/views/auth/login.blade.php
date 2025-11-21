@extends('layouts.app')
@section('title','Login')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Login</h2>
  <form method="POST" action="{{ route('login') }}">
    @csrf
    <div class="mb-4">
      <label class="block mb-1">Email</label>
      <input name="email" type="email" class="w-full border px-3 py-2 rounded">
    </div>
    <div class="mb-4">
      <label class="block mb-1">Password</label>
      <input name="password" type="password" class="w-full border px-3 py-2 rounded">
    </div>
    <div class="flex items-center justify-between">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Login</button>
      <a href="{{ route('register') }}" class="text-sm">Create account</a>
    </div>
  </form>
</div>
@endsection

@extends('layouts.app')
@section('title','Register')
@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
  <h2 class="text-xl mb-4">Create account</h2>
  <form method="POST" action="{{ route('register') }}">
    @csrf
    <div class="mb-4">
      <label class="block mb-1">Name</label>
      <input name="name" class="w-full border px-3 py-2 rounded">
    </div>
    <div class="mb-4">
      <label class="block mb-1">Email</label>
      <input name="email" type="email" class="w-full border px-3 py-2 rounded">
    </div>
    <div class="mb-4">
      <label class="block mb-1">Password</label>
      <input name="password" type="password" class="w-full border px-3 py-2 rounded">
    </div>
    <div class="flex items-center justify-between">
      <button class="px-4 py-2 bg-green-600 text-white rounded">Register</button>
      <a href="{{ route('login') }}" class="text-sm">Already have an account?</a>
    </div>
  </form>
</div>
@endsection

@extends('layouts.app')
@section('title','Create Route')
@section('content')
<div class="bg-white p-6 rounded shadow max-w-xl">
  <h2 class="text-xl mb-4">Create Route</h2>
  <form action="{{ route('routes.store') }}" method="POST" class="space-y-4">
    @csrf
    <div>
      <label class="block mb-1">Name</label>
      <input name="name" class="w-full border px-3 py-2 rounded" value="{{ old('name') }}">
    </div>
    <div>
      <label class="block mb-1">Start point</label>
      <input name="start_point" class="w-full border px-3 py-2 rounded" value="{{ old('start_point') }}">
    </div>
    <div>
      <label class="block mb-1">End point</label>
      <input name="end_point" class="w-full border px-3 py-2 rounded" value="{{ old('end_point') }}">
    </div>
    <div class="flex space-x-2">
      <button class="px-4 py-2 bg-blue-600 text-white rounded">Save</button>
      <a href="{{ route('routes.index') }}" class="px-4 py-2 border rounded">Cancel</a>
    </div>
  </form>
</div>
@endsection

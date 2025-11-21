@extends('layouts.app')
@section('title','Routes')
@section('content')
<div class="bg-white p-6 rounded shadow">
  <div class="flex justify-between items-center mb-4">
    <h1 class="text-2xl font-bold">Routes</h1>
    <a href="{{ route('routes.create') }}" class="px-3 py-2 bg-green-600 text-white rounded">New Route</a>
  </div>
  <table class="min-w-full table-auto">
    <thead>
      <tr class="bg-gray-50">
        <th class="px-4 py-2 text-left">Name</th>
        <th class="px-4 py-2 text-left">Start</th>
        <th class="px-4 py-2 text-left">End</th>
        <th class="px-4 py-2">Actions</th>
      </tr>
    </thead>
    <tbody>
      {{-- Loop routes --}}
      @forelse($routes as $route)
        <tr class="border-t">
          <td class="px-4 py-2">{{ $route->name }}</td>
          <td class="px-4 py-2">{{ $route->start_point }}</td>
          <td class="px-4 py-2">{{ $route->end_point }}</td>
          <td class="px-4 py-2 text-center">
            <a href="{{ route('routes.edit', $route) }}" class="mr-2">Edit</a>
            <form action="{{ route('routes.destroy', $route) }}" method="POST" class="inline">
              @csrf @method('DELETE')
              <button type="submit" onclick="return confirm('Delete this route?')" class="text-red-600">Delete</button>
            </form>
          </td>
        </tr>
      @empty
        <tr><td colspan="4" class="px-4 py-4">No routes yet.</td></tr>
      @endforelse
    </tbody>
  </table>
</div>
@endsection

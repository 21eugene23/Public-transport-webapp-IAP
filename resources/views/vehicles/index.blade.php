@extends('layouts.app')
@section('title','Vehicles')
@section('content')
<div class="bg-white p-6 rounded shadow">
  <div class="flex justify-between items-center">
    <h1 class="text-2xl font-bold">Vehicles</h1>
    <a href="#" class="px-3 py-2 bg-green-600 text-white rounded">Add Vehicle</a>
  </div>
  <p class="mt-4 text-sm text-gray-600">List of vehicles with capacity and assigned route.</p>
</div>
@endsection

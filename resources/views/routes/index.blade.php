@extends('layouts.app')

@section('content')
    <h1>Available Routes</h1>
    <a href="{{ route('routes.create') }}">Add New Route</a>
    <ul>
        @foreach($routes as $route)
            <li>{{ $route->origin }} → {{ $route->destination }} ({{ $route->distance_km }} km)</li>
        @endforeach
    </ul>
@endsection

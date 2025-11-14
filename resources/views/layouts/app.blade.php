<!DOCTYPE html>
<html>
<head>
    <title>Transport Scheduler</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <nav>
        <a href="{{ route('routes.index') }}">Routes</a>
        <a href="{{ route('vehicles.index') }}">Vehicles</a>
        <a href="{{ route('schedules.index') }}">Schedules</a>
        <a href="{{ route('bookings.index') }}">Bookings</a>
    </nav>

    <div class="container">
        @yield('content')
    </div>
</body>
</html>

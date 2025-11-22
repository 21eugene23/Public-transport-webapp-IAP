@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Welcome</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Line Chart: My Bookings Over Time --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">My Bookings Over Time</h3>
            <canvas id="myBookingsOverTime"></canvas>
        </div>

        {{-- Pie Chart: My Booking Status --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">My Booking Status</h3>
            <canvas id="myBookingStatus"></canvas>
        </div>

        {{-- Bar Chart: Seats Taken per Vehicle --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Seats Taken per Vehicle</h3>
            <canvas id="mySeatsPerVehicle"></canvas>
        </div>

        {{-- Doughnut Chart: Routes Travelled --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Routes Travelled</h3>
            <canvas id="myRoutesTravelled"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('myBookingsOverTime'), {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr'],
                datasets: [{ label: 'My Bookings', data: [1,2,3,1], borderColor: '#3b82f6', fill: false }]
            }
        });

        new Chart(document.getElementById('myBookingStatus'), {
            type: 'pie',
            data: {
                labels: ['Pending','Confirmed','Cancelled'],
                datasets: [{ data: [2,3,1], backgroundColor: ['#facc15','#22c55e','#ef4444'] }]
            }
        });

        new Chart(document.getElementById('mySeatsPerVehicle'), {
            type: 'bar',
            data: {
                labels: ['Bus','Van','Train'],
                datasets: [{ label: 'Seats Taken', data: [2,1,3], backgroundColor: 'rgba(34,197,94,0.7)' }]
            }
        });

        new Chart(document.getElementById('myRoutesTravelled'), {
            type: 'doughnut',
            data: {
                labels: ['Route 1','Route 2','Route 3'],
                datasets: [{ data: [3,2,1], backgroundColor: ['#6366f1','#f97316','#22c55e'] }]
            }
        });
    </script>
@endsection


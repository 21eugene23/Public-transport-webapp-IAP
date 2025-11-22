@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Welcome</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Bar Chart: Bookings per Route --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Bookings per Route</h3>
            <canvas id="bookingsByRoute"></canvas>
        </div>

        {{-- Pie Chart: Booking Status Distribution --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Booking Status</h3>
            <canvas id="bookingStatus"></canvas>
        </div>

        {{-- Line Chart: Bookings Over Time --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Bookings Over Time</h3>
            <canvas id="bookingsOverTime"></canvas>
        </div>

        {{-- Doughnut Chart: Vehicle Usage --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Vehicle Usage</h3>
            <canvas id="vehicleUsage"></canvas>
        </div>

        {{-- Bar Chart: Routes Managed --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Routes Managed</h3>
            <canvas id="routesManaged"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('bookingsByRoute'), {
            type: 'bar',
            data: {
                labels: ['Route 1', 'Route 2', 'Route 3'],
                datasets: [{ label: 'Bookings', data: [12, 19, 7], backgroundColor: 'rgba(34,197,94,0.7)' }]
            }
        });

        new Chart(document.getElementById('bookingStatus'), {
            type: 'pie',
            data: {
                labels: ['Pending', 'Confirmed', 'Cancelled'],
                datasets: [{ data: [10, 5, 2], backgroundColor: ['#facc15','#22c55e','#ef4444'] }]
            }
        });

        new Chart(document.getElementById('bookingsOverTime'), {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr'],
                datasets: [{ label: 'Bookings', data: [5,10,8,12], borderColor: '#3b82f6', fill: false }]
            }
        });

        new Chart(document.getElementById('vehicleUsage'), {
            type: 'doughnut',
            data: {
                labels: ['Bus','Van','Train'],
                datasets: [{ data: [15,8,5], backgroundColor: ['#22c55e','#f97316','#6366f1'] }]
            }
        });

        new Chart(document.getElementById('routesManaged'), {
            type: 'bar',
            data: {
                labels: ['Admin 1','Admin 2','Admin 3'],
                datasets: [{ label: 'Routes', data: [3,5,2], backgroundColor: 'rgba(239,68,68,0.7)' }]
            }
        });
    </script>
@endsection



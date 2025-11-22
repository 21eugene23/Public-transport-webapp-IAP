@extends('layouts.app')

@section('content')
    <h2 class="text-2xl font-bold mb-6">Welcome</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        {{-- Pie Chart: Vehicle Inspection Status --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Vehicle Inspection Status</h3>
            <canvas id="inspectionStatus"></canvas>
        </div>

        {{-- Line Chart: Inspections Over Time --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Inspections Over Time</h3>
            <canvas id="inspectionsOverTime"></canvas>
        </div>

        {{-- Bar Chart: Compliance by Route --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Compliance by Route</h3>
            <canvas id="complianceByRoute"></canvas>
        </div>

        {{-- Doughnut Chart: Inspector Activity --}}
        <div class="bg-white shadow rounded p-4">
            <h3 class="text-lg font-semibold mb-2">Inspector Activity</h3>
            <canvas id="inspectorActivity"></canvas>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        new Chart(document.getElementById('inspectionStatus'), {
            type: 'pie',
            data: {
                labels: ['Passed','Pending','Failed'],
                datasets: [{ data: [20,5,3], backgroundColor: ['#22c55e','#facc15','#ef4444'] }]
            }
        });

        new Chart(document.getElementById('inspectionsOverTime'), {
            type: 'line',
            data: {
                labels: ['Jan','Feb','Mar','Apr'],
                datasets: [{ label: 'Inspections', data: [5,8,6,10], borderColor: '#3b82f6', fill: false }]
            }
        });

        new Chart(document.getElementById('complianceByRoute'), {
            type: 'bar',
            data: {
                labels: ['Route 1','Route 2','Route 3'],
                datasets: [{ label: 'Compliant Vehicles', data: [10,7,12], backgroundColor: 'rgba(34,197,94,0.7)' }]
            }
        });

        new Chart(document.getElementById('inspectorActivity'), {
            type: 'doughnut',
            data: {
                labels: ['Inspector A','Inspector B','Inspector C'],
                datasets: [{ data: [12,8,5], backgroundColor: ['#6366f1','#f97316','#22c55e'] }]
            }
        });
    </script>
@endsection



<aside class="w-64 bg-white border-r h-screen p-6 space-y-6">
    <nav>
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Navigation</h2>
        <ul class="space-y-2 text-sm">
            

            @auth
                @php $role = auth()->user()->role; @endphp

                @if ($role === 'admin')
                    <li><a href="{{ route('routes.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-50">🛣️ Routes</a></li>
                    <li><a href="{{ route('vehicles.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-50">🚐 Vehicles</a></li>
                    <li><a href="{{ route('schedules.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-50">📅 Scheduling</a></li>
                    <li><a href="{{ route('bookings.index') }}" class="flex items-center px-3 py-2 rounded hover:bg-blue-50">📋 Booking</a></li>
                @endif
            @endauth
        </ul>
    </nav>
</aside>



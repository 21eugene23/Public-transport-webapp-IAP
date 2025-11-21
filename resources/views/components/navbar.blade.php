<nav class="bg-white shadow mb-6">
  <div class="container mx-auto px-4 py-3 flex items-center justify-between">
    <a href="/" class="font-bold text-xl">TranSys</a>
    <div class="space-x-4">
      <a href="{{ route('routes.index') }}" class="hover:underline">Routes</a>
      <a href="{{ route('vehicles.index') }}" class="hover:underline">Vehicles</a>
      <a href="{{ route('schedules.index') }}" class="hover:underline">Schedules</a>
      <a href="{{ route('bookings.index') }}" class="hover:underline">Bookings</a>
    </div>
    <div>
      <!-- simple auth links -->
      <a href="{{ route('login') }}" class="mr-3">Login</a>
      <a href="{{ route('register') }}" class="px-3 py-1 bg-blue-600 text-white rounded">Sign up</a>
    </div>
  </div>
</nav>

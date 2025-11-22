<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Public Transport System</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- Tailwind CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss/dist/tailwind.min.css">
</head>
<body class="bg-emerald-50 text-gray-800">

    {{-- Header --}}
    <header class="bg-green-700 text-white px-6 py-4 flex justify-between items-center shadow-md">
        <div class="text-xl font-bold tracking-wide flex items-center gap-2">
            🚍 Public Transport System
        </div>

        @auth
            <div class="flex items-center gap-4">
                <span class="text-sm font-medium">
                    {{ Auth::user()->name }}   {{-- ✅ Only show the user’s name --}}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm underline hover:text-green-200">Logout</button>
                </form>
            </div>
        @else
            <div>
                <a href="{{ route('login') }}" class="text-sm underline hover:text-green-200">Login</a>
            </div>
        @endauth
    </header>

    <div class="flex">

        {{-- Sidebar --}}
        <aside class="w-64 bg-white text-black min-h-screen shadow-lg border-r">

            <nav class="flex flex-col mt-6 space-y-1">
                <a href="{{ route('routes.index') }}"
                   class="flex items-center gap-3 px-5 py-3 hover:bg-green-100 hover:text-green-700 transition">
                    <span>🗺️</span> <span>Routes</span>
                </a>

                <a href="{{ route('vehicles.index') }}"
                   class="flex items-center gap-3 px-5 py-3 hover:bg-green-100 hover:text-green-700 transition">
                    <span>🚚</span> <span>Vehicles</span>
                </a>

                <a href="{{ route('schedules.index') }}"
                   class="flex items-center gap-3 px-5 py-3 hover:bg-green-100 hover:text-green-700 transition">
                    <span>📅</span> <span>Schedules</span>
                </a>

                <a href="{{ route('bookings.index') }}"
                   class="flex items-center gap-3 px-5 py-3 hover:bg-green-100 hover:text-green-700 transition">
                    <span>🧾</span> <span>Bookings</span>
                </a>
            </nav>
        </aside>

        {{-- Main Content --}}
        <main class="flex-1 bg-white p-8">
            @yield('content')
        </main>
    </div>

    {{-- Footer --}}
    <footer class="bg-green-100 text-center py-4 text-sm text-green-800 shadow-inner">
        &copy; {{ date('Y') }} Public Transport System
    </footer>

</body>
</html>


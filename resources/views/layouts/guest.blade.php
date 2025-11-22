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
                    {{ Auth::user()->name }}   {{-- ✅ Show logged-in user’s name --}}
                </span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="text-sm underline hover:text-green-200">Logout</button>
                </form>
            </div>
        @else
            <div class="flex gap-4">
                <a href="{{ route('home') }}" class="text-sm underline hover:text-green-200">Home</a>
                <a href="{{ route('about') }}" class="text-sm underline hover:text-green-200">About</a>
                <a href="{{ route('login') }}" class="text-sm underline hover:text-green-200">Login</a>
            </div>
        @endauth
    </header>

    {{-- Main Content --}}
    <main class="max-w-4xl mx-auto bg-white p-8 mt-6 rounded shadow">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-green-100 text-center py-4 text-sm text-green-800 shadow-inner mt-6">
        &copy; {{ date('Y') }} Public Transport System
    </footer>

</body>
</html>



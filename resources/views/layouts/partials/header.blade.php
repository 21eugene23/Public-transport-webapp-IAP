<header class="bg-blue-700 text-white px-6 py-4 flex justify-between items-center shadow">
    <h1 class="text-xl font-bold tracking-wide">🚍 Public Transport System</h1>

    @auth
        <div class="flex items-center space-x-4">
            <span class="text-sm font-medium">
                {{ ucfirst(Auth::user()->role) }} User — {{ Auth::user()->name }}
            </span>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="text-sm underline hover:text-gray-200">Logout</button>
            </form>
        </div>
    @endauth
</header>

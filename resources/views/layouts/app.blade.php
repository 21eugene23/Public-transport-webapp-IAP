<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>@yield('title', 'Transport App')</title>
    <!-- Tailwind CDN for quick styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-100 text-gray-900">
    @include('components.navbar')
    <div class="container mx-auto p-4">
        @include('components.flash')
        @yield('content')
    </div>
    @include('components.footer')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>

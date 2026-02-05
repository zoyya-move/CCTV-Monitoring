<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CCTV Dashboard</title>
    <link rel="icon" type="image/png" href="{{ asset('assets/logo ikon pdam.png') }}"/>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @yield('head') {{-- Tambahan head opsional seperti Leaflet CSS --}}
</head>
<body class="min-h-screen text-gray-800 bg-gray-100">
    <!-- Navbar -->
    <nav class="sticky top-0 z-50 bg-white shadow-sm">
        <div class="flex items-center justify-between px-4 py-3 mx-auto max-w-7xl">
            <div class="flex items-center gap-2">
                <img src="{{ asset('assets/logo ikon pdam.png') }}" alt="Life Media" class="w-auto h-8 hover:cursor-pointer" onclick="window.location.href='{{ url('/') }}'">
                <a href="#" class="text-lg font-bold text-[#B03A4B]">PDAM KOTA TEGAL</a>
            </div>
            <div class="flex items-center gap-6">
                <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-700 hover:text-red-600">HOME</a>
                <a href="{{ url('/dashboard') }}" class="text-sm font-semibold text-red-600 hover:underline">DASHBOARD CCTV</a>
                <a href="{{ url('/map') }}" class="text-sm font-semibold text-red-600 hover:underline">PETA GIS</a>
            </div>
        </div>
    </nav>
    <!-- Main content -->
    <main class="p-4 max-w-[90rem] mx-auto">
        @yield('content')
    </main>
    @yield('scripts')
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>@yield('title', 'Notes App')</title>

    {{-- Vite assets --}}
    {{ Vite::useBuildDirectory('dist')->withEntryPoints(['resources/css/app.css', 'resources/js/app.js']) }}

    {{-- Optional: kung gusto mong gamitin CDN for Tailwind (development only) --}}
    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}
</head>
<body class="bg-gray-100 text-gray-900">
    <div class="min-h-screen flex flex-col">
        {{-- Navbar or header --}}
        <header class="bg-white shadow p-4">
            <h1 class="text-xl font-bold">Notes App</h1>
        </header>

        {{-- Main content --}}
        <main class="flex-grow container mx-auto p-4">
            @yield('content')
        </main>

        {{-- Footer --}}
        <footer class="bg-white shadow p-4 text-center text-sm text-gray-500">
            &copy; {{ date('Y') }} Notes App
        </footer>
    </div>
</body>
</html>

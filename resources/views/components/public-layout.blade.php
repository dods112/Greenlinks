<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'GreenLink' }} | GreenLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-stone-900 antialiased flex flex-col">
    <header class="border-b border-stone-200 bg-white">
        <nav class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
            <a href="{{ route('home') }}" class="text-xl font-bold text-emerald-800">GreenLink</a>
            <div class="flex items-center gap-6 text-sm font-medium">
                <a href="{{ route('home') }}" class="hover:text-emerald-700">Home</a>
                <a href="{{ route('dashboard') }}" class="hover:text-emerald-700">My Reports</a>
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-md bg-emerald-800 px-4 py-2 text-white hover:bg-emerald-700">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="hover:text-emerald-700">Sign in</a>
                    <a href="{{ route('register') }}" class="rounded-md bg-emerald-800 px-4 py-2 text-white hover:bg-emerald-700">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="mx-auto w-full max-w-6xl flex-1 px-4 py-8">
        {{ $slot }}
    </main>

    <footer class="border-t border-stone-200 bg-white">
        <div class="mx-auto max-w-6xl px-4 py-6 text-sm text-stone-500">
            GreenLink, Community Resource and Environmental Information Platform. Tandag City, Surigao del Sur.
        </div>
    </footer>
</body>
</html>
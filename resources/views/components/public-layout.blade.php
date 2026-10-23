<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'GreenLink' }} | GreenLink</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-50 text-stone-900 antialiased flex flex-col">
    <header class="sticky top-0 z-20 border-b border-stone-200 bg-white/95 backdrop-blur">
        <nav class="mx-auto flex max-w-[1600px] items-center justify-between gap-8 px-6 py-3">
            <a href="{{ route('home') }}" class="flex shrink-0 items-center gap-3">
                <span class="flex h-11 w-11 items-center justify-center rounded-full bg-teal-700 text-white">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M5 19c0-8 5-13 14-14-1 9-6 14-14 14zM5 19l7-7"/></svg>
                </span>
                <span>
                    <span class="block text-xl font-bold leading-tight text-teal-800">GreenLink</span>
                    <span class="block whitespace-nowrap text-xs text-stone-500">Community Resources. A Greener Tomorrow.</span>
                </span>
            </a>

            <div class="hidden items-center gap-5 whitespace-nowrap text-sm text-stone-700 xl:flex">
                <a href="{{ route('home') }}" class="border-b-2 border-teal-600 pb-1 font-semibold text-teal-800">Home</a>
                <a href="{{ route('map') }}" class="hover:text-teal-700">Map</a>
                <a href="#resources" class="hover:text-teal-700">Resources</a>
                <a href="{{ route('register') }}" class="hover:text-teal-700">Environmental Reports</a>
                <a href="#resources" class="hover:text-teal-700">Agriculture &amp; Aquaculture</a>
                <a href="#resources" class="hover:text-teal-700">Tourism</a>
                <a href="#resources" class="hover:text-teal-700">Community Facilities</a>
                <a href="#announcements" class="hover:text-teal-700">Announcements</a>
            </div>

            <div class="flex shrink-0 items-center gap-3 whitespace-nowrap text-sm font-semibold">
                @auth
                    <a href="{{ route('dashboard') }}" class="rounded-lg bg-teal-700 px-5 py-2.5 text-white hover:bg-teal-800">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="rounded-lg border border-teal-700 px-5 py-2.5 text-teal-800 hover:bg-teal-50">Login</a>
                    <a href="{{ route('register') }}" class="rounded-lg bg-teal-700 px-5 py-2.5 text-white hover:bg-teal-800">Register</a>
                @endauth
            </div>
        </nav>
    </header>

    <main class="mx-auto w-full max-w-[1600px] flex-1 px-6 py-6">
        {{ $slot }}
    </main>

    <footer class="bg-teal-950 text-teal-100">
        <div class="mx-auto flex max-w-[1600px] flex-col gap-6 px-6 py-8 text-sm md:flex-row md:items-center md:justify-between">
            <div>
                <p class="text-lg font-bold text-white">GreenLink</p>
                <p class="text-teal-300">Community Resources. A Greener Tomorrow.</p>
            </div>
            <div class="flex flex-wrap gap-6 text-teal-200">
                <span>About</span>
                <span>Privacy Policy</span>
                <span>Terms of Service</span>
                <span>Contact</span>
            </div>
            <p class="text-teal-400">&copy; {{ date('Y') }} GreenLink. Tandag City, Surigao del Sur.</p>
        </div>
    </footer>
</body>
</html>
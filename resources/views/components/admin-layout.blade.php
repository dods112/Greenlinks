<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Admin' }} | GreenLink Admin</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-stone-100 text-stone-900 antialiased">
    <div class="flex min-h-screen">
        <aside class="hidden w-60 shrink-0 bg-emerald-950 p-6 text-emerald-100 md:block">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-white">GreenLink Admin</a>
            <nav class="mt-8 flex flex-col gap-3 text-sm">
                <a href="{{ route('dashboard') }}" class="hover:text-white">Overview</a>
                <span class="text-emerald-400">Reports queue (Phase 3)</span>
                <span class="text-emerald-400">Users and roles (Phase 3)</span>
            </nav>
        </aside>
        <div class="flex min-w-0 flex-1 flex-col">
            <header class="flex items-center justify-between border-b border-stone-200 bg-white px-6 py-4">
                <h1 class="text-lg font-semibold">{{ $title ?? 'Admin' }}</h1>
                <span class="text-sm text-stone-500">{{ auth()->user()->name ?? '' }}</span>
            </header>
            <main class="flex-1 p-6">
                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>
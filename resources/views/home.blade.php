<x-public-layout title="Home">
    {{-- Hero with search and statistics --}}
    <section class="py-10">
        <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Tandag City, Surigao del Sur</p>
        <h1 class="mt-2 text-3xl font-bold leading-tight text-emerald-950 sm:text-4xl">
            Report environmental concerns and find community information
        </h1>

        <form action="{{ route('home') }}" method="GET" class="mt-6 flex flex-col gap-3 sm:flex-row">
            <label for="q" class="sr-only">Search resources</label>
            <input id="q" name="q" type="search" value="{{ request('q') }}"
                placeholder="Search resources, guides, or facilities"
                class="min-w-0 flex-1 rounded-md border border-stone-300 bg-white px-4 py-3 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-700/30">
            <button type="submit" class="rounded-md border border-emerald-800 px-5 py-3 font-semibold text-emerald-800 hover:bg-emerald-50">Search</button>
        </form>

        <div class="mt-4 flex flex-wrap gap-3">
            <a href="{{ route('register') }}" class="rounded-md bg-emerald-800 px-5 py-3 font-semibold text-white hover:bg-emerald-700">Report an Environmental Concern</a>
            <a href="#resources" class="rounded-md px-5 py-3 font-semibold text-emerald-800 hover:bg-emerald-50">Browse Resources</a>
        </div>

        {{-- Live statistics: one compact strip --}}
        <dl class="mt-8 grid grid-cols-3 divide-x divide-stone-200 rounded-lg border border-stone-200 bg-white text-center">
            <div class="p-4">
                <dt class="text-xs font-medium text-stone-500">Submitted</dt>
                <dd class="mt-1 text-2xl font-bold text-emerald-900">{{ number_format($totalReports) }}</dd>
            </div>
            <div class="p-4">
                <dt class="text-xs font-medium text-stone-500">Open or in review</dt>
                <dd class="mt-1 text-2xl font-bold text-emerald-900">{{ number_format($openReports) }}</dd>
            </div>
            <div class="p-4">
                <dt class="text-xs font-medium text-stone-500">Resolved by staff</dt>
                <dd class="mt-1 text-2xl font-bold text-emerald-900">{{ number_format($resolvedReports) }}</dd>
            </div>
        </dl>
    </section>

    {{-- How it works: one compact row --}}
    <section class="border-t border-stone-200 py-8">
        <ol class="grid gap-4 text-sm md:grid-cols-3">
            <li class="rounded-lg bg-white p-5 ring-1 ring-stone-200">
                <h2 class="font-semibold text-emerald-950">1. Submit</h2>
                <p class="mt-1 text-stone-600">Describe the issue and its location. You get a reference number right away.</p>
            </li>
            <li class="rounded-lg bg-white p-5 ring-1 ring-stone-200">
                <h2 class="font-semibold text-emerald-950">2. Review</h2>
                <p class="mt-1 text-stone-600">Staff check the report and may ask you for more information.</p>
            </li>
            <li class="rounded-lg bg-white p-5 ring-1 ring-stone-200">
                <h2 class="font-semibold text-emerald-950">3. Track</h2>
                <p class="mt-1 text-stone-600">Follow every status change. Resolved only means staff confirmed it.</p>
            </li>
        </ol>
    </section>

    {{-- Community categories as chips --}}
    <section id="resources" class="border-t border-stone-200 py-8">
        <h2 class="text-lg font-bold text-emerald-950">Community information</h2>
        <p class="mt-1 text-sm text-stone-500">Listings appear here once staff publish verified records.</p>
        <div class="mt-4 flex flex-wrap gap-2">
            @foreach (['Agriculture', 'Aquaculture', 'Eco-tourism', 'Community facilities'] as $category)
                <span class="rounded-full border border-stone-300 bg-white px-4 py-1.5 text-sm text-stone-700">{{ $category }}</span>
            @endforeach
        </div>
    </section>

    {{-- Announcements: single line --}}
    <section class="border-t border-stone-200 py-8">
        <h2 class="text-lg font-bold text-emerald-950">Announcements and advisories</h2>
        <p class="mt-1 text-sm text-stone-500">No published announcements right now. Official notices appear here with their source and date.</p>
    </section>
</x-public-layout>
<x-public-layout title="Home">
    {{-- Hero --}}
    <section class="grid items-center gap-10 overflow-hidden rounded-3xl border border-emerald-100 bg-gradient-to-br from-sky-50 via-emerald-50 to-emerald-100 p-8 shadow-sm lg:grid-cols-12 lg:p-14">
        <div class="lg:col-span-6">
            <p class="text-xs font-semibold uppercase tracking-widest text-emerald-800">Connecting people &middot; Resources &middot; A sustainable future</p>
            <h1 class="mt-5 text-4xl font-extrabold leading-tight tracking-tight text-emerald-950 xl:text-5xl">
                Your Community,
                <span class="block text-emerald-600">Our Shared Environment</span>
            </h1>
            <p class="mt-6 max-w-xl text-lg leading-relaxed text-stone-700">
                GreenLink provides verified local information, community resources, and a simple way to report environmental concerns for a cleaner, safer, and more sustainable future.
            </p>
            <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('register') }}" class="rounded-lg bg-emerald-700 px-6 py-3.5 text-center font-semibold text-white shadow-lg shadow-emerald-700/25 transition hover:-translate-y-0.5 hover:bg-emerald-800">Report an Environmental Concern &rarr;</a>
                <a href="#resources" class="rounded-lg border border-emerald-700 bg-white px-6 py-3.5 text-center font-semibold text-emerald-800 transition hover:-translate-y-0.5 hover:bg-emerald-50">Explore Resources</a>
            </div>
        </div>

        <div class="lg:col-span-6">
            <div class="overflow-hidden rounded-2xl shadow-xl ring-1 ring-emerald-900/5">
                @include('components.island-model')
            </div>
        </div>
    </section>

    {{-- Module cards with icon tiles --}}
    <section class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        @php
            $modules = [
                ['Agriculture & Aquaculture', 'Guides, advisories and resources', '#resources', 'leaf'],
                ['Tourism', 'Discover local destinations', '#resources', 'mountain'],
                ['Community Facilities', 'Health centers and public services', '#resources', 'building'],
                ['Environmental Reports', 'Report and track concerns', route('register'), 'document'],
                ['Interactive Map', 'Find resources and locations', '#map', 'map'],
            ];
        @endphp

        @foreach ($modules as [$name, $desc, $link, $icon])
            <a href="{{ $link }}" class="group flex items-center gap-4 rounded-xl border border-stone-200 bg-white p-5 shadow-sm transition hover:-translate-y-0.5 hover:border-emerald-300 hover:shadow-md">
                <span class="flex h-11 w-11 shrink-0 items-center justify-center rounded-lg bg-emerald-700 text-white">
                    @switch($icon)
                        @case('leaf')
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M5 19c0-8 5-13 14-14-1 9-6 14-14 14zM5 19l7-7"/></svg>
                            @break
                        @case('mountain')
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M3 20l6-10 4 6 2-3 6 7H3z"/></svg>
                            @break
                        @case('building')
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4 21V5a1 1 0 011-1h8a1 1 0 011 1v16M14 9h4a1 1 0 011 1v11M3 21h18M8 8h2M8 12h2M8 16h2"/></svg>
                            @break
                        @case('document')
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6M9 16h6M9 8h2M7 3h7l5 5v11a2 2 0 01-2 2H7a2 2 0 01-2-2V5a2 2 0 012-2z"/></svg>
                            @break
                        @case('map')
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9 20l-6 2V6l6-2 6 2 6-2v14l-6 2-6-2zM9 4v14M15 6v14"/></svg>
                            @break
                    @endswitch
                </span>
                <span class="min-w-0 flex-1">
                    <span class="block text-sm font-semibold text-stone-900">{{ $name }}</span>
                    <span class="mt-1 block text-xs text-stone-500">{{ $desc }}</span>
                </span>
                <span class="shrink-0 text-emerald-700 transition group-hover:translate-x-0.5">&rarr;</span>
            </a>
        @endforeach
    </section>

    {{-- Map, advisories, and steps: equal heights --}}
    <section class="mt-8 grid items-stretch gap-6 lg:grid-cols-3">
        <div id="map" class="flex flex-col rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">Explore Our Interactive Map</h2>
            <p class="mt-2 text-sm leading-relaxed text-stone-500">Resources, facilities, and public reports appear here once they are published.</p>
            <div class="mt-6 flex flex-1 items-center justify-center rounded-lg border border-dashed border-stone-300 bg-stone-50 p-6 text-center text-sm text-stone-500">
                The map arrives in Phase 4. No locations are shown until verified records exist.
            </div>
        </div>

        <div id="announcements" class="flex flex-col rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">Latest Advisories</h2>
            <div class="mt-6 flex flex-1 items-center justify-center rounded-lg border border-dashed border-stone-300 bg-stone-50 p-6 text-center text-sm text-stone-500">
                No published advisories right now. Official notices appear here with their source and date.
            </div>
        </div>

        <div class="flex flex-col rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">How GreenLink Works</h2>
            <ol class="mt-5 flex-1 space-y-5 text-sm">
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">1</span><span><span class="block font-semibold text-stone-900">Find information</span><span class="mt-1 block leading-relaxed text-stone-600">Search for resources, facilities, and useful guides.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">2</span><span><span class="block font-semibold text-stone-900">Report concerns</span><span class="mt-1 block leading-relaxed text-stone-600">Submit environmental issues with location and details.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">3</span><span><span class="block font-semibold text-stone-900">Track progress</span><span class="mt-1 block leading-relaxed text-stone-600">Check each status change and its reason on your tracking page.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">4</span><span><span class="block font-semibold text-stone-900">Build a greener community</span><span class="mt-1 block leading-relaxed text-stone-600">Resolved means staff confirmed the outcome.</span></span></li>
            </ol>
        </div>
    </section>

    <section id="resources" class="mt-8 rounded-xl border border-stone-200 bg-white p-6 text-center shadow-sm">
        <h2 class="font-bold text-stone-900">Community information</h2>
        <p class="mt-2 text-sm text-stone-500">Listings appear here once staff publish verified records, with their source and last-verified date.</p>
    </section>
</x-public-layout>
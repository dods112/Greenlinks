<x-public-layout title="Home">
    {{-- Hero --}}
    <section class="grid items-center gap-8 overflow-hidden rounded-2xl bg-gradient-to-r from-sky-50 via-emerald-50 to-emerald-100 p-8 lg:grid-cols-2 lg:p-12">
        <div>
            <p class="text-xs font-semibold uppercase tracking-widest text-emerald-800">Connecting people &middot; Resources &middot; A sustainable future</p>
            <h1 class="mt-4 text-4xl font-extrabold leading-tight text-emerald-950 sm:text-5xl">
                Your Community,
                <span class="block text-emerald-600">Our Shared Environment</span>
            </h1>
            <p class="mt-5 max-w-lg text-lg text-stone-700">
                GreenLink provides verified local information, community resources, and a simple way to report environmental concerns for a cleaner, safer, and more sustainable future.
            </p>
            <div class="mt-8 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('register') }}" class="rounded-lg bg-emerald-700 px-6 py-3.5 text-center font-semibold text-white shadow-lg shadow-emerald-700/25 hover:bg-emerald-800">Report an Environmental Concern &rarr;</a>
                <a href="#resources" class="rounded-lg border border-emerald-700 bg-white px-6 py-3.5 text-center font-semibold text-emerald-800 hover:bg-emerald-50">Explore Resources</a>
            </div>
        </div>

        <div>
            @include('components.island-model')
        </div>
    </section>

    {{-- Module cards --}}
    <section class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-5">
        @foreach ([
            ['Agriculture & Aquaculture', 'Guides, advisories and resources', '#resources'],
            ['Tourism', 'Discover local destinations', '#resources'],
            ['Community Facilities', 'Health centers and public services', '#resources'],
            ['Environmental Reports', 'Report and track concerns', route('register')],
            ['Interactive Map', 'Find resources and locations', '#map'],
        ] as [$name, $desc, $link])
            <a href="{{ $link }}" class="flex items-center justify-between gap-3 rounded-xl border border-stone-200 bg-white p-5 shadow-sm hover:border-emerald-300">
                <span>
                    <span class="block text-sm font-semibold text-stone-900">{{ $name }}</span>
                    <span class="block text-xs text-stone-500">{{ $desc }}</span>
                </span>
                <span class="text-emerald-700">&rarr;</span>
            </a>
        @endforeach
    </section>

    {{-- Map, advisories, and steps --}}
    <section class="mt-6 grid gap-6 lg:grid-cols-3">
        <div id="map" class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">Explore Our Interactive Map</h2>
            <p class="mt-2 text-sm text-stone-500">Resources, facilities, and public reports appear here once they are published.</p>
            <div class="mt-6 flex h-56 items-center justify-center rounded-lg border border-dashed border-stone-300 bg-stone-50 p-6 text-center text-sm text-stone-500">
                The map arrives in Phase 4. No locations are shown until verified records exist.
            </div>
        </div>

        <div id="announcements" class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">Latest Advisories</h2>
            <div class="mt-6 flex h-56 items-center justify-center rounded-lg border border-dashed border-stone-300 bg-stone-50 p-6 text-center text-sm text-stone-500">
                No published advisories right now. Official notices appear here with their source and date.
            </div>
        </div>

        <div class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <div class="flex items-center justify-between">
                <h2 class="font-bold text-stone-900">How GreenLink Works</h2>
            </div>
            <ol class="mt-5 space-y-4 text-sm">
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">1</span><span><span class="block font-semibold text-stone-900">Find information</span><span class="text-stone-600">Search for resources, facilities, and useful guides.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">2</span><span><span class="block font-semibold text-stone-900">Report concerns</span><span class="text-stone-600">Submit environmental issues with location and details.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">3</span><span><span class="block font-semibold text-stone-900">Track progress</span><span class="text-stone-600">Check each status change and its reason on your tracking page.</span></span></li>
                <li class="flex gap-3"><span class="flex h-7 w-7 shrink-0 items-center justify-center rounded-full bg-emerald-800 font-bold text-white">4</span><span><span class="block font-semibold text-stone-900">Build a greener community</span><span class="text-stone-600">Resolved means staff confirmed the outcome.</span></span></li>
            </ol>
        </div>
    </section>

    <section id="resources" class="mt-6 rounded-xl border border-stone-200 bg-white p-6 text-center shadow-sm">
        <h2 class="font-bold text-stone-900">Community information</h2>
        <p class="mt-1 text-sm text-stone-500">Listings appear here once staff publish verified records, with their source and last-verified date.</p>
    </section>
</x-public-layout>
<x-public-layout title="Home">
    {{-- Hero --}}
    <section class="grid gap-10 py-10 lg:grid-cols-5 lg:items-center">
        <div class="lg:col-span-3">
            <p class="text-sm font-semibold uppercase tracking-wide text-emerald-700">Tandag City, Surigao del Sur</p>
            <h1 class="mt-3 text-4xl font-bold leading-tight text-emerald-950 sm:text-5xl">
                Report environmental concerns and find community information in one place
            </h1>
            <p class="mt-5 max-w-2xl text-lg text-stone-600">
                GreenLink lets residents submit environmental concerns, track each report from submission to resolution, and find published local resources.
            </p>

            <form action="{{ route('home') }}" method="GET" class="mt-8 flex flex-col gap-3 sm:flex-row">
                <label for="q" class="sr-only">Search resources</label>
                <input id="q" name="q" type="search" value="{{ request('q') }}"
                    placeholder="Search resources, guides, or facilities"
                    class="min-w-0 flex-1 rounded-md border border-stone-300 bg-white px-4 py-3 text-stone-900 focus:border-emerald-700 focus:outline-none focus:ring-2 focus:ring-emerald-700/30">
                <button type="submit" class="rounded-md border border-emerald-800 px-5 py-3 font-semibold text-emerald-800 hover:bg-emerald-50">Search</button>
            </form>

            <div class="mt-6 flex flex-col gap-3 sm:flex-row">
                <a href="{{ route('register') }}" class="rounded-md bg-emerald-800 px-5 py-3 text-center font-semibold text-white hover:bg-emerald-700">Report an Environmental Concern</a>
                <a href="#resources" class="rounded-md px-5 py-3 text-center font-semibold text-emerald-800 hover:bg-emerald-50">Browse Resources</a>
            </div>
        </div>

        <aside class="rounded-lg border border-stone-200 bg-white p-6 shadow-sm lg:col-span-2">
            <h2 class="text-base font-semibold text-stone-900">Your reports</h2>
            <p class="mt-2 text-sm text-stone-600">
                Sign in to submit a report and see its reference number, current status, and history.
            </p>
            <a href="{{ route('login') }}" class="mt-5 inline-block text-sm font-semibold text-emerald-800 hover:underline">Sign in to track reports</a>
        </aside>
    </section>

    {{-- Live statistics from the database --}}
    <section aria-labelledby="stats-heading" class="border-t border-stone-200 py-10">
        <h2 id="stats-heading" class="text-2xl font-bold text-emerald-950">Reporting activity</h2>
        <p class="mt-2 text-sm text-stone-500">Counts are read from the GreenLink database. They do not include personal details.</p>
        <dl class="mt-6 grid gap-4 sm:grid-cols-3">
            <div class="rounded-lg border border-stone-200 bg-white p-6">
                <dt class="text-sm font-medium text-stone-600">Concerns submitted</dt>
                <dd class="mt-2 text-3xl font-bold text-emerald-900">{{ number_format($totalReports) }}</dd>
            </div>
            <div class="rounded-lg border border-stone-200 bg-white p-6">
                <dt class="text-sm font-medium text-stone-600">Open or under review</dt>
                <dd class="mt-2 text-3xl font-bold text-emerald-900">{{ number_format($openReports) }}</dd>
            </div>
            <div class="rounded-lg border border-stone-200 bg-white p-6">
                <dt class="text-sm font-medium text-stone-600">Marked resolved by staff</dt>
                <dd class="mt-2 text-3xl font-bold text-emerald-900">{{ number_format($resolvedReports) }}</dd>
            </div>
        </dl>
    </section>

    {{-- How it works --}}
    <section class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">How GreenLink works</h2>
        <ol class="mt-8 grid gap-6 md:grid-cols-4">
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 1</span>
                <h3 class="mt-2 font-semibold text-stone-900">Submit</h3>
                <p class="mt-2 text-sm text-stone-600">Describe the issue, mark its location, and add optional photos. You receive a reference number right away.</p>
            </li>
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 2</span>
                <h3 class="mt-2 font-semibold text-stone-900">Review</h3>
                <p class="mt-2 text-sm text-stone-600">Authorized reviewers check the report and may ask you for more information.</p>
            </li>
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 3</span>
                <h3 class="mt-2 font-semibold text-stone-900">Track</h3>
                <p class="mt-2 text-sm text-stone-600">Follow every status change and its reason on your tracking page.</p>
            </li>
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 4</span>
                <h3 class="mt-2 font-semibold text-stone-900">Resolve</h3>
                <p class="mt-2 text-sm text-stone-600">A report is marked resolved only when staff confirm the outcome, never just because it was viewed.</p>
            </li>
        </ol>
    </section>

    {{-- What you can report --}}
    <section class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">What you can report</h2>
        <ul class="mt-6 grid gap-3 text-stone-700 sm:grid-cols-2 lg:grid-cols-3">
            @foreach (['Illegal dumping or solid waste', 'Water pollution in rivers or coastal areas', 'Air quality and burning of waste', 'Damaged or cleared mangrove and forest areas', 'Fish kills or aquaculture concerns', 'Other environmental concerns'] as $item)
                <li class="flex items-start gap-3 rounded-md bg-white px-4 py-3 ring-1 ring-stone-200">
                    <span class="mt-1.5 h-2 w-2 shrink-0 rounded-full bg-emerald-600"></span>
                    <span>{{ $item }}</span>
                </li>
            @endforeach
        </ul>
    </section>

    {{-- Community categories --}}
    <section id="resources" class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">Community information</h2>
        <p class="mt-2 text-stone-600">Browse by category. Listings appear here once staff publish verified records.</p>
        <div class="mt-8 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            @foreach (['Agriculture', 'Aquaculture', 'Eco-tourism', 'Community facilities'] as $category)
                <div class="rounded-lg border border-stone-200 bg-white p-5">
                    <h3 class="font-semibold text-stone-900">{{ $category }}</h3>
                    <p class="mt-2 text-sm text-stone-500">No published listings yet.</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Trust and verification --}}
    <section class="border-t border-stone-200 py-12">
        <div class="rounded-lg bg-emerald-950 p-8 text-emerald-50">
            <h2 class="text-xl font-bold text-white">How information is verified</h2>
            <p class="mt-3 max-w-3xl text-emerald-100">
                Every resource and announcement shows its source and the date it was last verified. GreenLink organizes reports and information. It does not dispatch personnel or contact government offices on its own.
            </p>
        </div>
    </section>

    {{-- Announcements --}}
    <section class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">Latest announcements and advisories</h2>
        <div class="mt-6 rounded-lg border border-dashed border-stone-300 bg-white p-8 text-center">
            <p class="text-stone-600">No published announcements right now. Official notices will appear here with their source and date once staff publish them.</p>
        </div>
    </section>
</x-public-layout>
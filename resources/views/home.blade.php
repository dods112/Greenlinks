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

    {{-- How it works --}}
    <section class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">How GreenLink works</h2>
        <ol class="mt-8 grid gap-6 md:grid-cols-3">
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 1</span>
                <h3 class="mt-2 font-semibold text-stone-900">Submit</h3>
                <p class="mt-2 text-sm text-stone-600">Describe the issue, mark its location, and add optional photos. You receive a reference number right away.</p>
            </li>
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 2</span>
                <h3 class="mt-2 font-semibold text-stone-900">Review</h3>
                <p class="mt-2 text-sm text-stone-600">Authorized reviewers check the report. They may ask you for more information, and you will be notified of each status change.</p>
            </li>
            <li class="rounded-lg border border-stone-200 bg-white p-6">
                <span class="text-sm font-semibold text-emerald-700">Step 3</span>
                <h3 class="mt-2 font-semibold text-stone-900">Track</h3>
                <p class="mt-2 text-sm text-stone-600">Follow the status history on your tracking page. A report is marked resolved only after staff confirm it.</p>
            </li>
        </ol>
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

    {{-- Announcements --}}
    <section class="border-t border-stone-200 py-12">
        <h2 class="text-2xl font-bold text-emerald-950">Latest announcements and advisories</h2>
        <div class="mt-6 rounded-lg border border-dashed border-stone-300 bg-white p-8 text-center">
            <p class="text-stone-600">No published announcements right now. Official notices will appear here once staff publish them, with their source and date.</p>
        </div>
    </section>
</x-public-layout>
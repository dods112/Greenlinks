<x-public-layout title="Home">
    <section class="relative -mx-4 overflow-hidden bg-gradient-to-b from-emerald-50/60 via-sky-50/40 to-stone-50 px-4 pb-16 pt-16 text-center">
        <div class="pointer-events-none absolute -left-24 top-0 h-72 w-72 rounded-full bg-emerald-200/30 blur-3xl"></div>
        <div class="pointer-events-none absolute -right-24 bottom-0 h-72 w-72 rounded-full bg-sky-200/30 blur-3xl"></div>

        <div class="relative">
            <span class="inline-flex items-center gap-2 rounded-full border border-emerald-200 bg-white/80 px-4 py-1.5 text-sm font-medium text-emerald-700">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 3v4m0 10v4m9-9h-4M7 12H3m14.364-6.364-2.828 2.828M8.464 15.536l-2.828 2.828m11.728 0-2.828-2.828M8.464 8.464 5.636 5.636"/></svg>
                Environmental reporting for Tandag City
            </span>

            <h1 class="mx-auto mt-6 max-w-3xl text-4xl font-extrabold leading-tight tracking-tight text-stone-900 sm:text-6xl">
                <span class="text-emerald-600">GreenLink</span>
                <span class="block text-stone-900">Cleaner, Connected Communities</span>
            </h1>

            <p class="mx-auto mt-6 max-w-2xl text-lg text-stone-600">
                Report environmental concerns, track each one from submission to resolution, and find verified local resources in one place.
            </p>

            <form action="{{ route('home') }}" method="GET" class="mx-auto mt-8 flex max-w-xl flex-col gap-3 sm:flex-row">
                <label for="q" class="sr-only">Search resources</label>
                <input id="q" name="q" type="search" value="{{ request('q') }}"
                    placeholder="Search resources, guides, or facilities"
                    class="min-w-0 flex-1 rounded-lg border border-stone-300 bg-white px-4 py-3 shadow-sm focus:border-emerald-600 focus:outline-none focus:ring-2 focus:ring-emerald-600/30">
                <button type="submit" class="rounded-lg border border-emerald-700 bg-white px-6 py-3 font-semibold text-emerald-800 shadow-sm hover:bg-emerald-50">Search</button>
            </form>

            <div class="mt-5 flex flex-col items-center justify-center gap-3 sm:flex-row">
                <a href="{{ route('register') }}" class="inline-flex items-center gap-2 rounded-lg bg-emerald-600 px-6 py-3 font-semibold text-white shadow-lg shadow-emerald-600/25 hover:bg-emerald-700">
                    Report an Environmental Concern
                </a>
                <a href="#how-it-works" class="rounded-lg border border-stone-300 bg-white px-6 py-3 font-semibold text-stone-800 shadow-sm hover:bg-stone-50">Learn How It Works</a>
            </div>
        </div>

        <dl class="relative mx-auto mt-14 grid max-w-4xl grid-cols-1 gap-4 sm:grid-cols-3">
            <div class="rounded-2xl border border-white bg-white/80 p-6 text-center shadow-sm backdrop-blur">
                <dt class="text-sm text-stone-500">Concerns submitted</dt>
                <dd class="mt-2 text-3xl font-bold text-stone-900">{{ number_format($totalReports) }}</dd>
            </div>
            <div class="rounded-2xl border border-white bg-white/80 p-6 text-center shadow-sm backdrop-blur">
                <dt class="text-sm text-stone-500">Open or in review</dt>
                <dd class="mt-2 text-3xl font-bold text-stone-900">{{ number_format($openReports) }}</dd>
            </div>
            <div class="rounded-2xl border border-white bg-white/80 p-6 text-center shadow-sm backdrop-blur">
                <dt class="text-sm text-stone-500">Resolved by staff</dt>
                <dd class="mt-2 text-3xl font-bold text-stone-900">{{ number_format($resolvedReports) }}</dd>
            </div>
        </dl>
    </section>

    <section id="how-it-works" class="py-14">
        <h2 class="text-center text-2xl font-bold text-stone-900">How GreenLink works</h2>
        <ol class="mt-8 grid gap-5 md:grid-cols-3">
            <li class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 font-bold text-emerald-700">1</span>
                <h3 class="mt-4 font-semibold text-stone-900">Submit</h3>
                <p class="mt-2 text-sm text-stone-600">Describe the issue and its location. You get a reference number right away.</p>
            </li>
            <li class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 font-bold text-emerald-700">2</span>
                <h3 class="mt-4 font-semibold text-stone-900">Review</h3>
                <p class="mt-2 text-sm text-stone-600">Staff check the report and may ask you for more information.</p>
            </li>
            <li class="rounded-2xl border border-stone-200 bg-white p-6 shadow-sm">
                <span class="flex h-9 w-9 items-center justify-center rounded-lg bg-emerald-100 font-bold text-emerald-700">3</span>
                <h3 class="mt-4 font-semibold text-stone-900">Track</h3>
                <p class="mt-2 text-sm text-stone-600">Follow every status change. Resolved means staff confirmed the outcome.</p>
            </li>
        </ol>
    </section>

    <section id="resources" class="border-t border-stone-200 py-12">
        <h2 class="text-center text-2xl font-bold text-stone-900">Community information</h2>
        <p class="mt-2 text-center text-sm text-stone-500">Listings appear here once staff publish verified records.</p>
        <div class="mt-6 flex flex-wrap justify-center gap-3">
            @foreach (['Agriculture', 'Aquaculture', 'Eco-tourism', 'Community facilities'] as $category)
                <span class="rounded-full border border-stone-300 bg-white px-5 py-2 text-sm font-medium text-stone-700 shadow-sm">{{ $category }}</span>
            @endforeach
        </div>
    </section>

    <section class="border-t border-stone-200 py-10 text-center">
        <h2 class="text-lg font-bold text-stone-900">Announcements and advisories</h2>
        <p class="mt-1 text-sm text-stone-500">No published announcements right now. Official notices appear here with their source and date.</p>
    </section>
</x-public-layout>
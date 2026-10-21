<x-public-layout title="Home">
    <section class="py-12">
        <h2 class="text-3xl font-bold text-emerald-900">Report and find environmental information in Tandag City</h2>
        <p class="mt-4 max-w-2xl text-stone-600">
            GreenLink helps residents submit environmental concerns, track their reports, and find verified community resources in one place.
        </p>
        <div class="mt-8 flex gap-4">
            <a href="{{ route('register') }}" class="rounded-md bg-emerald-800 px-5 py-3 text-white hover:bg-emerald-700">Report an Environmental Concern</a>
        </div>
    </section>
</x-public-layout>
<x-public-layout title="Dashboard">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-teal-950">Your dashboard</h1>
        <a href="{{ route('reports.create') }}" class="rounded-lg bg-teal-700 px-5 py-2.5 font-semibold text-white hover:bg-teal-800">Report a concern</a>
    </div>

    <dl class="mt-8 grid gap-4 sm:grid-cols-3">
        <div class="rounded-xl border border-stone-200 bg-white p-6 text-center shadow-sm">
            <dt class="text-sm text-stone-500">Total reports</dt>
            <dd class="mt-2 text-3xl font-bold text-stone-900">{{ $total }}</dd>
        </div>
        <div class="rounded-xl border border-stone-200 bg-white p-6 text-center shadow-sm">
            <dt class="text-sm text-stone-500">Open</dt>
            <dd class="mt-2 text-3xl font-bold text-stone-900">{{ $open }}</dd>
        </div>
        <div class="rounded-xl border border-stone-200 bg-white p-6 text-center shadow-sm">
            <dt class="text-sm text-stone-500">Resolved by staff</dt>
            <dd class="mt-2 text-3xl font-bold text-stone-900">{{ $resolved }}</dd>
        </div>
    </dl>

    <div class="mt-8 rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
        <div class="flex items-center justify-between">
            <h2 class="font-bold text-stone-900">Recent reports</h2>
            <a href="{{ route('reports.index') }}" class="text-sm font-semibold text-teal-800 hover:underline">View all</a>
        </div>

        @forelse ($recent as $report)
            <a href="{{ route('reports.show', $report) }}" class="mt-4 flex flex-wrap items-center justify-between gap-3 rounded-lg border border-stone-200 p-4 hover:bg-stone-50">
                <span>
                    <span class="block font-semibold text-stone-900">{{ $report->title }}</span>
                    <span class="block text-xs text-stone-500">{{ $report->reference_code }}</span>
                </span>
                <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-800">{{ $report->status->label() }}</span>
            </a>
        @empty
            <p class="mt-4 text-sm text-stone-600">No reports yet. Use "Report a concern" to submit your first one.</p>
        @endforelse
    </div>
</x-public-layout>
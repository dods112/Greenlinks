<x-public-layout title="My reports">
    <div class="flex flex-wrap items-center justify-between gap-4">
        <h1 class="text-2xl font-bold text-teal-950">My reports</h1>
        <a href="{{ route('reports.create') }}" class="rounded-lg bg-teal-700 px-5 py-2.5 font-semibold text-white hover:bg-teal-800">New report</a>
    </div>

    @if ($reports->isEmpty())
        <div class="mt-8 rounded-xl border border-dashed border-stone-300 bg-white p-10 text-center text-sm text-stone-600">
            You have not submitted any reports yet.
        </div>
    @else
        <div class="mt-8 overflow-hidden rounded-xl border border-stone-200 bg-white shadow-sm">
            <ul class="divide-y divide-stone-200">
                @foreach ($reports as $report)
                    <li>
                        <a href="{{ route('reports.show', $report) }}" class="flex flex-wrap items-center justify-between gap-4 p-5 hover:bg-stone-50">
                            <span>
                                <span class="block font-semibold text-stone-900">{{ $report->title }}</span>
                                <span class="mt-1 block text-xs text-stone-500">{{ $report->reference_code }} &middot; Observed {{ $report->date_observed->format('M j, Y') }}</span>
                            </span>
                            <span class="rounded-full bg-teal-50 px-3 py-1 text-xs font-semibold text-teal-800">{{ $report->status->label() }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="mt-6">{{ $reports->links() }}</div>
    @endif
</x-public-layout>
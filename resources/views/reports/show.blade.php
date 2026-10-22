<x-public-layout title="Report {{ $report->reference_code }}">
    <div class="mx-auto max-w-3xl space-y-6">
        @if (session('status'))
            <div class="rounded-lg border border-teal-200 bg-teal-50 px-4 py-3 text-sm text-teal-900">{{ session('status') }}</div>
        @endif

        <div class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <p class="text-xs font-semibold uppercase tracking-widest text-teal-700">Reference {{ $report->reference_code }}</p>
            <h1 class="mt-2 text-2xl font-bold text-stone-900">{{ $report->title }}</h1>
            <p class="mt-2 text-sm text-stone-600">Current status: <span class="font-semibold text-stone-900">{{ $report->status->label() }}</span></p>

            <dl class="mt-6 grid gap-4 text-sm sm:grid-cols-2">
                <div><dt class="text-stone-500">Category</dt><dd class="font-medium text-stone-900">{{ config('greenlink.categories')[$report->category] ?? $report->category }}</dd></div>
                <div><dt class="text-stone-500">Date observed</dt><dd class="font-medium text-stone-900">{{ $report->date_observed->format('M j, Y') }}</dd></div>
                <div><dt class="text-stone-500">Barangay</dt><dd class="font-medium text-stone-900">{{ $report->barangay }}</dd></div>
                <div><dt class="text-stone-500">Location</dt><dd class="font-medium text-stone-900">{{ $report->location_text }}</dd></div>
                <div class="sm:col-span-2"><dt class="text-stone-500">Summary</dt><dd class="text-stone-900">{{ $report->short_description }}</dd></div>
                <div class="sm:col-span-2"><dt class="text-stone-500">Details</dt><dd class="whitespace-pre-line text-stone-900">{{ $report->detailed_description }}</dd></div>
            </dl>
        </div>

        <div class="rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            <h2 class="font-bold text-stone-900">Status history</h2>
            <ol class="mt-4 space-y-4 text-sm">
                @foreach ($report->statusHistories as $history)
                    <li class="border-l-2 border-teal-500 pl-4">
                        <span class="block font-semibold text-stone-900">{{ $history->to_status->label() }}</span>
                        <span class="block text-xs text-stone-500">{{ $history->created_at->format('M j, Y g:i A') }}</span>
                        @if ($history->reason)
                            <span class="mt-1 block text-stone-600">{{ $history->reason }}</span>
                        @endif
                    </li>
                @endforeach
            </ol>
        </div>

        <a href="{{ route('reports.index') }}" class="inline-block text-sm font-semibold text-teal-800 hover:underline">&larr; Back to my reports</a>
    </div>
</x-public-layout>
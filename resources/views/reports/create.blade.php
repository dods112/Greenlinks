<x-public-layout title="Report a concern">
    <div class="mx-auto max-w-3xl">
        <h1 class="text-2xl font-bold text-teal-950">Report an environmental concern</h1>
        <p class="mt-2 text-sm text-stone-600">Describe what you observed. You will receive a reference code to track the report.</p>

        <form method="POST" action="{{ route('reports.store') }}" class="mt-8 space-y-6 rounded-xl border border-stone-200 bg-white p-6 shadow-sm">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-stone-900">Report title</label>
                <input id="title" name="title" type="text" value="{{ old('title') }}" required maxlength="150"
                    class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                @error('title') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="category" class="block text-sm font-semibold text-stone-900">Issue category</label>
                <select id="category" name="category" required
                    class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                    <option value="">Select a category</option>
                    @foreach ($categories as $key => $label)
                        <option value="{{ $key }}" @selected(old('category') === $key)>{{ $label }}</option>
                    @endforeach
                </select>
                @error('category') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="short_description" class="block text-sm font-semibold text-stone-900">Short description</label>
                <input id="short_description" name="short_description" type="text" value="{{ old('short_description') }}" required maxlength="255"
                    class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                @error('short_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="detailed_description" class="block text-sm font-semibold text-stone-900">Detailed description</label>
                <textarea id="detailed_description" name="detailed_description" rows="6" required minlength="20" maxlength="5000"
                    class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">{{ old('detailed_description') }}</textarea>
                @error('detailed_description') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label for="barangay" class="block text-sm font-semibold text-stone-900">Barangay</label>
                    <select id="barangay" name="barangay" required
                        class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                        <option value="">Select a barangay</option>
                        @foreach ($barangays as $barangay)
                            <option value="{{ $barangay }}" @selected(old('barangay') === $barangay)>{{ $barangay }}</option>
                        @endforeach
                    </select>
                    @error('barangay') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label for="date_observed" class="block text-sm font-semibold text-stone-900">Date observed</label>
                    <input id="date_observed" name="date_observed" type="date" value="{{ old('date_observed') }}" required max="{{ now()->toDateString() }}"
                        class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                    @error('date_observed') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="location_text" class="block text-sm font-semibold text-stone-900">Street or exact location</label>
                <input id="location_text" name="location_text" type="text" value="{{ old('location_text') }}" required maxlength="255"
                    placeholder="For example: near the public market, along the river path"
                    class="mt-2 w-full rounded-lg border border-stone-300 px-4 py-2.5 focus:border-teal-600 focus:outline-none focus:ring-2 focus:ring-teal-600/30">
                @error('location_text') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('reports.index') }}" class="text-sm font-semibold text-stone-600 hover:text-stone-900">Cancel</a>
                <button type="submit" class="rounded-lg bg-teal-700 px-6 py-3 font-semibold text-white shadow-lg shadow-teal-700/25 hover:bg-teal-800">Submit report</button>
            </div>
        </form>
    </div>
</x-public-layout>
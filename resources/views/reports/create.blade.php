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

            <div>
                <label class="block text-sm font-semibold text-stone-900">Pin the location on the map (optional)</label>
                <p class="mt-1 text-xs text-stone-500">Click the map to place a pin. Leave it empty if you are unsure.</p>
                <div id="picker" class="mt-2 h-72 w-full overflow-hidden rounded-lg border border-stone-300"></div>
                <input type="hidden" name="latitude" id="latitude" value="{{ old('latitude') }}">
                <input type="hidden" name="longitude" id="longitude" value="{{ old('longitude') }}">
                @error('latitude') <p class="mt-1 text-sm text-red-600">{{ $message }}</p> @enderror
            </div>

            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
            <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
            <script>
                (function () {
                    const map = L.map('picker').setView([9.0742, 126.1980], 13);
                    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', { maxZoom: 19, attribution: '&copy; OpenStreetMap contributors' }).addTo(map);
                    let marker = null;
                    const lat = document.getElementById('latitude');
                    const lng = document.getElementById('longitude');
                    if (lat.value && lng.value) {
                        marker = L.marker([lat.value, lng.value]).addTo(map);
                    }
                    map.on('click', function (e) {
                        if (marker) marker.remove();
                        marker = L.marker(e.latlng).addTo(map);
                        lat.value = e.latlng.lat.toFixed(7);
                        lng.value = e.latlng.lng.toFixed(7);
                    });
                })();
            </script>
            <div class="flex items-center justify-between gap-4">
                <a href="{{ route('reports.index') }}" class="text-sm font-semibold text-stone-600 hover:text-stone-900">Cancel</a>
                <button type="submit" class="rounded-lg bg-teal-700 px-6 py-3 font-semibold text-white shadow-lg shadow-teal-700/25 hover:bg-teal-800">Submit report</button>
            </div>
        </form>
    </div>
</x-public-layout>
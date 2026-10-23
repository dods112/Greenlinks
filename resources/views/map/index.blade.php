<x-public-layout title="Interactive map">
    <section class="mb-4 grid gap-4 md:grid-cols-3">
        <div class="rounded-xl border border-stone-200 bg-white p-4 shadow-sm md:col-span-2">
            <h1 class="text-2xl font-bold text-teal-950">Interactive map of Tandag City</h1>
            <p class="mt-2 text-sm text-stone-700">Verified environmental reports and local trails. Pins show the general area only.</p>
            <ul class="mt-3 grid gap-1 text-sm text-stone-600 sm:grid-cols-2">
                <li><span class="font-semibold text-stone-800">Drag</span> to move around</li>
                <li><span class="font-semibold text-stone-800">Scroll</span> to zoom</li>
                <li><span class="font-semibold text-stone-800">Click a pin</span> for details</li>
                <li><span class="font-semibold text-stone-800">Click a trail</span> for its name</li>
            </ul>
        </div>
        <div class="rounded-xl border border-stone-200 bg-white p-4 shadow-sm">
            <h2 class="text-sm font-bold text-stone-900">Legend</h2>
            <div class="mt-2 space-y-2 text-sm text-stone-700">
                <div class="flex items-center gap-2"><span class="inline-block h-3 w-3 rounded-full bg-teal-600"></span> Verified report</div>
                <div class="flex items-center gap-2"><span class="inline-block h-0 w-6 border-t-4 border-lime-500"></span> Trail</div>
                <div class="flex items-center gap-2"><span class="inline-block h-0 w-6 border-t-4 border-dashed border-amber-500"></span> Example (not real)</div>
            </div>
        </div>
    </section>

    @if ($markers->isEmpty())
        <div class="mb-3 rounded-lg border border-dashed border-stone-300 bg-white p-3 text-sm text-stone-600">
            No verified reports are on the map yet.
        </div>
    @endif

    <div class="relative left-1/2 w-screen -translate-x-1/2 px-4 lg:px-8">
        <div id="map" class="h-[70vh] min-h-[480px] w-full overflow-hidden rounded-2xl border border-stone-200 shadow-sm"></div>
        <p class="mt-2 text-xs text-stone-500">Imagery &copy; MapTiler &copy; OpenStreetMap contributors</p>
    </div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        (function () {
            const markers = @json($markers);
            const trails = @json($trails);
            const maptilerKey = @json(config('services.maptiler.key'));

            const map = L.map('map', { minZoom: 10, maxZoom: 19 }).setView([9.0742, 126.1980], 15);

            const satellite = maptilerKey
                ? 'https://api.maptiler.com/tiles/satellite-v2/{z}/{x}/{y}.jpg?key=' + maptilerKey
                : 'https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';

            L.tileLayer(satellite, {
                maxZoom: 19,
                attribution: '&copy; MapTiler &copy; OpenStreetMap contributors',
            }).addTo(map);

            markers.forEach(function (m) {
                const popup = document.createElement('div');
                const title = document.createElement('strong');
                title.textContent = m.title;
                const meta = document.createElement('div');
                meta.textContent = m.category + ' | ' + m.status;
                const ref = document.createElement('small');
                ref.textContent = m.reference_code + ' | ' + m.barangay + ' | Approximate location';
                popup.append(title, meta, ref);
                L.circleMarker([m.lat, m.lng], { radius: 8, color: '#fff', weight: 2, fillColor: '#0d9488', fillOpacity: 1 })
                    .addTo(map).bindPopup(popup);
            });

            trails.forEach(function (t) {
                const line = L.polyline(t.coordinates, {
                    color: '#84cc16',
                    weight: 4,
                    dashArray: t.is_example ? '8 8' : null,
                }).addTo(map);
                const label = document.createElement('div');
                const name = document.createElement('strong');
                name.textContent = t.name;
                const desc = document.createElement('div');
                desc.textContent = t.description || '';
                label.append(name, desc);
                line.bindPopup(label);
            });
        })();
    </script>
</x-public-layout>
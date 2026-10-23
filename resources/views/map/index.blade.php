<x-public-layout title="Interactive map">
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-teal-950">Interactive map</h1>
        <p class="mt-2 text-sm text-stone-600">Verified environmental reports in Tandag City. Reporter details are never shown.</p>
    </div>

    @if ($markers->isEmpty())
        <div class="mb-4 rounded-lg border border-dashed border-stone-300 bg-white p-4 text-sm text-stone-600">
            No verified reports have locations yet. Markers appear here once staff verify a report.
        </div>
    @endif

    <div id="map" class="h-[560px] w-full overflow-hidden rounded-xl border border-stone-200 shadow-sm"></div>

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="">
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <script>
        (function () {
            const markers = @json($markers);
            const map = L.map('map').setView([9.0742, 126.1980], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors',
            }).addTo(map);

            markers.forEach(function (m) {
                const popup = document.createElement('div');
                const title = document.createElement('strong');
                title.textContent = m.title;
                const meta = document.createElement('div');
                meta.textContent = m.category + ' | ' + m.status;
                const ref = document.createElement('small');
                ref.textContent = m.reference_code + ' | ' + m.barangay;
                popup.append(title, meta, ref);

                L.marker([m.lat, m.lng]).addTo(map).bindPopup(popup);
            });
        })();
    </script>
</x-public-layout>
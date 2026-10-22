<div id="island-wrap" class="relative overflow-hidden rounded-xl" style="height: 420px; background: #45d3c9;">
    <iframe
        title="The Wandering Island"
        style="position: absolute; left: -20%; width: 140%; height: 800px; margin-top: -200px; border: 0; transform: scale(0.6); transform-origin: center center;"
        allowfullscreen
        allow="autoplay; fullscreen; xr-spatial-tracking"
        src="https://sketchfab.com/models/f0427d69d2bc4122bcb4248fed42c3e1/embed?autostart=1&autospin=0.3&ui_controls=0&ui_infos=0&ui_hint=0&ui_stop=0&ui_watermark=0&ui_inspector=0&ui_help=0&ui_settings=0&ui_vr=0&ui_fullscreen=0&transparent=1">
    </iframe>
    <div id="island-cover" style="position: absolute; inset: 0; background: #ffffff; transition: opacity 0.8s ease; pointer-events: none;"></div>
</div>
<script>
(function () {
    var cover = document.getElementById('island-cover');
    var frame = document.querySelector('#island-wrap iframe');
    if (!cover || !frame) return;

    var hidden = false;
    function reveal() {
        if (hidden) return;
        hidden = true;
        cover.style.opacity = '0';
        setTimeout(function () { cover.remove(); }, 900);
    }

    frame.addEventListener('load', function () { setTimeout(reveal, 4000); });
    setTimeout(reveal, 12000);
})();
</script>
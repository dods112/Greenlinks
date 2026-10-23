<div id="globe" class="h-[420px] w-full overflow-hidden rounded-2xl"></div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cesium@1.119.0/Build/Cesium/Widgets/widgets.css">
<script src="https://cdn.jsdelivr.net/npm/cesium@1.119.0/Build/Cesium/Cesium.js"></script>
<script>
    (function () {
        if (!window.Cesium) return;

        const maptilerKey = @json(config('services.maptiler.key'));

        const viewer = new Cesium.Viewer('globe', {
            baseLayer: false,
            baseLayerPicker: false,
            geocoder: false,
            homeButton: false,
            sceneModePicker: false,
            navigationHelpButton: false,
            animation: false,
            timeline: false,
            fullscreenButton: false,
            infoBox: false,
            selectionIndicator: false,
            terrainProvider: new Cesium.EllipsoidTerrainProvider(),
        });

        // Remove any default imagery so the Cesium ion watermark doesn't appear.
        viewer.imageryLayers.removeAll();

        if (maptilerKey) {
            viewer.imageryLayers.addImageryProvider(
                new Cesium.UrlTemplateImageryProvider({
                    url: 'https://api.maptiler.com/maps/streets-v2/{z}/{x}/{y}.png?key=' + maptilerKey,
                    maximumLevel: 18,
                    credit: '© MapTiler © OpenStreetMap contributors',
                })
            );
        }

        viewer.scene.globe.baseColor = Cesium.Color.fromCssColorString('#2a8fbf');
        viewer.scene.globe.enableLighting = false;
        viewer.scene.skyAtmosphere.show = true;
        viewer.scene.backgroundColor = Cesium.Color.fromCssColorString('#06202a');
        viewer.cesiumWidget.creditContainer.style.display = 'none';

        viewer.scene.screenSpaceCameraController.enableZoom = false;

        viewer.camera.setView({
            destination: Cesium.Cartesian3.fromDegrees(126.1980, 9.0742, 14000000),
        });

        viewer.scene.postRender.addEventListener(function () {
            viewer.camera.rotateRight(0.0003);
        });

        viewer.container.addEventListener('dblclick', function () {
            window.location.href = @json(route('map'));
        });
    })();
</script>
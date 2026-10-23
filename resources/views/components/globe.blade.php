<div id="globe" class="h-[420px] w-full overflow-hidden rounded-2xl"></div>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/cesium@1.119.0/Build/Cesium/Widgets/widgets.css">
<script src="https://cdn.jsdelivr.net/npm/cesium@1.119.0/Build/Cesium/Cesium.js"></script>
<script>
    (function () {
        if (!window.Cesium) return;

        const viewer = new Cesium.Viewer('globe', {
            imageryProvider: false,
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

        viewer.imageryLayers.addImageryProvider(
            new Cesium.OpenStreetMapImageryProvider({ url: 'https://tile.openstreetmap.org/' })
        );

        viewer.cesiumWidget.creditContainer.style.display = 'none';
        viewer.scene.screenSpaceCameraController.enableZoom = false;

        viewer.camera.setView({
            destination: Cesium.Cartesian3.fromDegrees(126.1980, 9.0742, 9000000),
        });

        // Slow rotation for the hero. Decorative only, no data.
        viewer.scene.postRender.addEventListener(function () {
            viewer.camera.rotateRight(0.0003);
        });

        // Button in the hero links to the local map.
        viewer.container.addEventListener('dblclick', function () {
            window.location.href = @json(route('map'));
        });
    })();
</script>
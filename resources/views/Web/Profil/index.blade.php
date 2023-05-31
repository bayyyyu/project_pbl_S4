<!DOCTYPE html>
<html>

<head>
    <title>Marker Event dan Tanaman</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.css">
    <style>
        #map {
            height: 400px;
        }
    </style>
</head>

<body>
    <div id="map"></div>

    <script src="https://cdn.jsdelivr.net/npm/leaflet@1.7.1/dist/leaflet.js"></script>
    <script>
        var map;
        var eventMarkers = [];
        var tanamanMarkers = [];
        var removedEventMarkers = [];

        // Mendapatkan data marker event dan tanaman dari database
        var eventMarkersData = [];
        <?php foreach ($list_event as $event): ?>
        eventMarkersData.push({
            event_id: <?php echo $event->id; ?>,
            lat: <?php echo $event->lat; ?>,
            lng: <?php echo $event->lng; ?>,
            title: "<?php echo $event->deskripsi; ?>",
        });
        <?php endforeach; ?>


        var tanamanMarkersData = [];
        <?php foreach ($list_tanaman as $tanaman): ?>
        tanamanMarkersData.push({
            event_id: <?php echo $tanaman->eventPenanaman->id; ?>,
            eventPenanaman: "<?php echo $tanaman->eventPenanaman->nama_event; ?>",
            lat: <?php echo $tanaman->lat; ?>,
            lng: <?php echo $tanaman->lng; ?>,
            lokasi: "<?php echo $tanaman->lokasi; ?>",
            sample: "<?php echo $tanaman->sample; ?>",
            tanggal_penanaman: "<?php echo $tanaman->tanggal_penanaman; ?>",
            jenis_mangrove: "<?php echo $tanaman->jenis_mangrove; ?>",
            jenis_tanah: "<?php echo $tanaman->jenis_tanah; ?>",
            masa_tumbuh: "<?php echo $tanaman->masa_tumbuh; ?>",
            umur_tanaman: "<?php echo $tanaman->umur_tanaman; ?>",
            foto: "<?php echo $tanaman->foto; ?>",
            deskripsi: "<?php echo $tanaman->deskripsi; ?>"
        });
        <?php endforeach; ?>

        // Custom icon untuk event
        var greenIcon = L.icon({
            iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/event.png',
            iconSize: [32, 35], // Ukuran icon dalam piksel
            iconAnchor: [16, 32] // Anchor icon relatif terhadap posisi titik koordinat
        });

        // Custom icon untuk penanaman
        var redIcon = L.icon({
            iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/tree.png',
            iconSize: [32, 35],
            iconAnchor: [16, 32]
        });

        function initMap() {
            // Membuat peta
            map = L.map('map').setView([-1.790597, 110.410990], 9);

            // Menambahkan tile layer
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors',
                maxZoom: 18,
            }).addTo(map);

            // Menambahkan marker event ke peta
            eventMarkersData.forEach(function(markerData) {
                var marker = L.marker([markerData.lat, markerData.lng], {
                    icon: greenIcon
                }).addTo(map);
                marker.bindPopup(markerData.title);

                // Menyimpan event_id sebagai properti pada marker
                marker.event_id = markerData.event_id;

                // Menambahkan event listener pada marker event
                marker.on('click', function() {
                    // Menyembunyikan semua marker event yang lain
                    eventMarkers.forEach(function(eventMarker) {
                        if (eventMarker !== this) {
                            eventMarker.setOpacity(0);
                        }
                    }, this);

                    // Menghapus marker event yang saat ini ditekan
                    var currentEventMarkerIndex = eventMarkers.indexOf(this);
                    if (currentEventMarkerIndex > -1) {
                        var removedMarker = eventMarkers.splice(currentEventMarkerIndex, 1)[0];
                        removedEventMarkers.push(removedMarker);
                        removedMarker.removeFrom(map);
                    }

                    // Menyembunyikan marker tanaman yang tidak sesuai dengan event_id
                    clearTanamanMarkers();
                    tanamanMarkersData.forEach(function(tanamanMarkerData) {
                        if (tanamanMarkerData.event_id === this.event_id) {
                            var tanamanMarker = L.marker([tanamanMarkerData.lat, tanamanMarkerData
                                .lng
                            ], {
                                icon: redIcon
                            }).addTo(map);
                            // Mengatur offset vertikal untuk popup
                             var popupOffset = L.point(0, -tanamanMarker.options.icon.options.iconSize[1] / 2);
                            tanamanMarker.bindPopup(`
                            <div class="popup-content" style="max-height: 200px; overflow-y: auto; width: 250px;">
                                <label style="color:black; font-weight:bolder; display: flex; align-items: center; justify-content: center;">
                                    Detail Penanaman
                                </label>
                                <table class="table table-sm mt-2">
                                    <tbody>
                                        <tr>
                                            <td style="width:145px">Lokasi</td>
                                            <td>${tanamanMarkerData.lokasi}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Event Penanaman</td>
                                            <td>${tanamanMarkerData.eventPenanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Sample Penanaman</td>
                                            <td>${tanamanMarkerData.sample}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Tanggal Penanaman</td>
                                            <td>${tanamanMarkerData.tanggal_penanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Jenis Mangrove</td>
                                            <td>${tanamanMarkerData.jenis_mangrove}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Masa Pembibitan</td>
                                            <td>${tanamanMarkerData.masa_tumbuh}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Umur Tanaman Saat Ditanam</td>
                                            <td>${tanamanMarkerData.umur_tanaman}</td>
                                        </tr>
                                        <tr>
                                            <td style="width:145px">Foto</td>
                                            <td><img src="${tanamanMarkerData.foto}" loading="lazy" class="img-fluid"></td>
                                        </tr>
                                    </tbody>                   
                                </table>
                                <hr>
                                <label style="color:black; font-weight:bolder; display: flex; align-items: center; justify-content: center;">
                                    Deskripsi Penanaman
                                </label>
                                <div>
                                    <p style="text-align: justify; color:black; font-size:12px; margin-right:15px">${tanamanMarkerData.deskripsi}</p>
                                </div>
                                <hr>
                            </div>
                        `, {
                            offset: popupOffset
                        });
                            tanamanMarkers.push(tanamanMarker);
                        }
                    }, this);

                    // Mengarahkan peta ke marker tanaman dengan animasi zoom
                    if (tanamanMarkers.length > 0) {
                        var selectedTanamanMarker = tanamanMarkers[0];
                        map.flyTo(selectedTanamanMarker.getLatLng(), 10, {
                            duration: 2, // Durasi animasi dalam detik
                            easeLinearity: 0.5
                        });
                    }
                });

                eventMarkers.push(marker);
            });

            // Menambahkan tombol "Tampilkan Semua Marker Event"
            var resetButton = L.control({
                position: 'bottomright'
            });

            resetButton.onAdd = function(map) {
                var div = L.DomUtil.create('div', 'reset-button');
                div.innerHTML = '<button onclick="resetMap()">Tampilkan Kembali Semua Marker Event</button>';
                return div;
            };

            resetButton.addTo(map);
        }

        function clearTanamanMarkers() {
            tanamanMarkers.forEach(function(tanamanMarker) {
                map.removeLayer(tanamanMarker);
            });
            tanamanMarkers = [];
        }

        function resetMap() {
            // Menghapus semua marker event yang telah dihapus sebelumnya
            removedEventMarkers.forEach(function(removedMarker) {
                removedMarker.addTo(map);
                eventMarkers.push(removedMarker);
            });
            removedEventMarkers = [];

            // Menampilkan kembali semua marker event
            eventMarkers.forEach(function(eventMarker) {
                eventMarker.setOpacity(1);
            });

            // Menghapus semua marker tanaman
            clearTanamanMarkers();

            // Mengembalikan tampilan peta seperti semula dengan animasi zoom in
            map.setView([-1.8572961278636353, 109.97172781841756], 9, {
                animate: true,
                duration: 2
            });
        }

        window.onload = initMap;
    </script>



</body>

</html>

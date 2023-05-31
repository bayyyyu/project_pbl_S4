<!DOCTYPE html>
<html>

<head>
    <title>Peta Interkatif</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.css" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/MarkerCluster.Default.css" />

    <title>Poultry Farm</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- google fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
        rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets-web2/assets/images/x-icon/01.png">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/all.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/icofont.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/lightcase.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/swiper.min.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web2/assets/css/style.css">
    <!-- leaflet start -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets-web2/assets/css/leaflet.defaultextent.css">
    <script src="{{ url('/') }}/assets-web2/assets/js/leaflet.defaultextent.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>
    <!-- leaflet end -->


</head>

<body>
    <x-web.layout.header />
    <!-- Banner Section Start Here -->
    <!-- Banner Section Ending Here -->
    <div class="pcoded-main-container">
        <div class="pcoded-wrapper">
            <div class="pcoded-content">
                <div class="row mt-2 ml-1 mr-1">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header" >
                                Peta
                            </div>
                            <div class="card-body">
                                <div id="map" style="height: 60vh; width:100%;  margin-left:auto; margin-right:auto" class="banner-style-2 position-relative "></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header" style="height: 50px">
                                <ul class="nav nav-tabs" style=" border-bottom: none;">
                                    <li class="nav-item">
                                        <a class="nav-link " id="info-tab" data-toggle="tab" href="#info" style="height:39px">Info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" id="tools-tab" data-toggle="tab" href="#tools" style="height:39px">Tools</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="detail-tab" data-toggle="tab" href="#detail" style="height:39px">Detail</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body">
                                <div class="tab-content">
                                    <div id="tools" class="tab-pane fade show active" style="height: 60vh; overflow-y: auto;">
                                        <label for="event-checkbox" style="color:black">Pilih Penanaman Berdasarkan
                                            Event:</label>
                                        <div class="search-container">
                                            <input type="text" id="search-input" placeholder="Cari nama event..." style="width: 70%; height:30px; padding-bottom: 4px; color:black">
                                            <button class="search-clear btn btn-sm" style="border-color: #064635; color: #064635; display: none;" id="clear-button">Clear</button>
                                            <button onclick="searchEvent()" class="btn btn-sm"
                                                style="background-color: #064635;color: white;">Cari</button>
                                        </div>
                                        <hr>
                                        <div style="max-height: 200px; overflow-y: auto; max-width: 600px;">
                                            @foreach ($list_event as $event)
                                                <div id="event-checkboxes">
                                                    <input type="checkbox" id="event-checkbox-{{ $event->id }}"
                                                        value="{{ $event->id }}" onchange="filterMarkers()">
                                                    <label for="event-checkbox-{{ $event->id }}"
                                                        style="white-space: nowrap;">{{ $event->nama_event }}</label>
                                                </div>
                                            @endforeach
                                        </div>
                                        <hr>
                                        <div class="mt-3" style="text-align: center;">
                                            <button onclick="resetMap()" class="btn" style="background-color: #064635; color: white;">Tampilkan Kembali Semua Marker Event</button>
                                        </div>
                                    </div>
                                    <div id="info" class="tab-pane fade" style="height: 60vh; overflow-y: auto;">
                                        p
                                    </div>
                                    <div id="detail" class="tab-pane fade">
                                        <!-- Konten untuk tab Detail -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="styleSelector">
            </div>
        </div>
    </div>


    <!-- footer section start here -->
    <!-- footer section start here -->
    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span
            class="pluse_2"></span></a>
    <!-- scrollToTop ending here -->

    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/fontawesome.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/waypoints.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/bootstrap.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/swiper.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.countdown.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/jquery.counterup.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/isotope.pkgd.min.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/lightcase.js"></script>
    <script src="{{ url('/') }}/assets-web2/assets/js/functions.js"></script>


    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.markercluster/1.4.1/leaflet.markercluster.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>
<style>
    .card-header {
        background-color: #F6FFF7;

    }
</style>
</html>
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
        title: "<?php echo $event->nama_event; ?>",
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
        tanggal_penanaman: "<?php echo date('d M Y', strtotime($tanaman->tanggal_penanaman)); ?>",
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
        iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/calendar.png',
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
        map = L.map('map').setView([-1.790597, 110.410990], 8);

        // Menambahkan tile layer
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a>  contributors | Bayu Pratama'
        }).addTo(map);

        // Menambahkan marker event ke peta
        eventMarkersData.forEach(function(markerData) {
            var marker = L.marker([markerData.lat, markerData.lng], {
                icon: greenIcon
            }).addTo(map);
            marker.bindTooltip(markerData.title, {
                permanent: false,
                direction: 'top',
                offset: [0, -25]

            });


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
                        var popupOffset = L.point(0, -tanamanMarker.options.icon.options
                            .iconSize[1] / 2);
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
            div.innerHTML = '';
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
        map.setView([-1.790597, 110.410990], 8, {
            animate: true,
            duration: 2,
        });

        // Reset checked status for checkboxes
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        checkboxes.forEach(function(checkbox) {
            checkbox.checked = false;
        });
    }

    // Event listener untuk mengubah tampilan marker berdasarkan pilihan event
    var checkboxes = document.querySelectorAll('input[type="checkbox"]');
    checkboxes.forEach(function(checkbox) {
        checkbox.addEventListener("change", function() {
            if (checkbox.checked) {
                // Menyembunyikan semua marker event yang lain
                eventMarkers.forEach(function(eventMarker) {
                    if (eventMarker !== this) {
                        eventMarker.setOpacity(0);
                    }
                }, this);
            }
            filterMarkers();
        });
    });


    function filterMarkers() {
        var selectedEventIds = [];
        var checkboxes = document.querySelectorAll('input[type="checkbox"]:checked');
        checkboxes.forEach(function(checkbox) {
            selectedEventIds.push(checkbox.value);
        });

        // Menyembunyikan semua marker tanaman
        clearTanamanMarkers();

        // Menampilkan marker tanaman yang sesuai dengan event_id yang dipilih
        tanamanMarkersData.forEach(function(tanamanMarkerData) {
            if (selectedEventIds.includes(String(tanamanMarkerData.event_id))) {
                var tanamanMarker = L.marker([tanamanMarkerData.lat, tanamanMarkerData.lng], {
                    icon: redIcon
                }).addTo(map);
                // Mengatur offset vertikal untuk popup
                var popupOffset = L.point(0, -tanamanMarker.options.icon.options.iconSize[1] / 2);
                tanamanMarker.bindPopup(
                    `
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
                        `
                );
                tanamanMarkers.push(tanamanMarker);
            }
        });

        // Mengarahkan peta ke marker tanaman dengan animasi zoom
        if (tanamanMarkers.length > 0) {
            var selectedTanamanMarker = tanamanMarkers[0];
            map.flyTo(selectedTanamanMarker.getLatLng(), 10, {
                duration: 2,
                easeLinearity: 0.5
            });
        }

    }

    

    // Event listener untuk tombol "Clear"
    var clearButton = document.getElementById('clear-button');
    clearButton.addEventListener('click', function() {
        clearSearch();
        resetMap();
    });

    //ini script untuk search event
    function searchEvent() {
        var searchInput = document.getElementById("search-input").value.toLowerCase();
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var clearButton = document.querySelector(".search-clear");
        var showClearButton = false;

        checkboxes.forEach(function(checkbox) {
            var label = checkbox.nextElementSibling;
            var eventName = label.innerText.toLowerCase();

            if (eventName.includes(searchInput)) {
                checkbox.style.display = "inline-block";
                label.style.display = "inline-block";
                showClearButton = true;
            } else {
                checkbox.style.display = "none";
                label.style.display = "none";
            }
        });

        if (showClearButton) {
            clearButton.style.display = "inline-block";
        } else {
            clearButton.style.display = "none";
        }
    }

    function clearSearch() {
        var searchInput = document.getElementById("search-input");
        var checkboxes = document.querySelectorAll('input[type="checkbox"]');
        var clearButton = document.querySelector(".search-clear");

        searchInput.value = "";
        checkboxes.forEach(function(checkbox) {
            checkbox.style.display = "inline-block";
            checkbox.nextElementSibling.style.display = "inline-block";
            checkbox.checked = false;
        });

        clearButton.style.display = "none";
    }

    window.onload = initMap;

    $(document).ready(function() {
        $('.nav-link').on('click', function() {
            $('.nav-link').removeClass('active');
            $(this).addClass('active');

            // Ambil ID tab yang diklik
            var target = $(this).attr('href');
            
            // Sembunyikan semua konten tab
            $('.tab-pane').removeClass('show active');
            
            // Tampilkan konten tab yang sesuai dengan ID yang diklik
            $(target).addClass('show active');
        });
    });    
</script>

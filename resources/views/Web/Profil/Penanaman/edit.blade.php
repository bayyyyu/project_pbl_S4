<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Pokdarwis Celincing | Penanaman |</title>
    <meta name="robots" content="index, follow" />
    <meta name="description"
        content="Industry, Products Manufacturing Company, building companies, architecture firms, and the like can take to their advantage by using OxyBuild- Construction Bootstrap 5 Template. With this sophisticated exclusive Construction Bootstrap 5 web template, you can quickly have things in order.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/') }}/assets-web/assets/images/favicon.ico" />

    <!-- CSS
    ============================================ -->

    <!-- Vendor CSS (Contain Bootstrap, Icon Fonts) -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/vendor/ionicons.min.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/vendor/font-awesome.min.css" />

    <!-- Plugin CSS (Global Plugins Files) -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/plugins/animate.css">
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/plugins/jquery-ui.min.css">
    <!-- Plugin CSS (Plugins Files for only this Page) -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/plugins/swiper-bundle.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ url('/') }}/assets-web/assets/css/style.css">
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"> --}}

    {{-- //leaflet --}}
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets-web/assets/css/leaflet.defaultextent.css">
    <script src="{{ url('/') }}/assets-web/assets/js/leaflet.defaultextent.js"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="main-wrapper">

        <!-- Begin Main Header Area -->
        <x-web.layout.header />
        <!-- Main Header Area End Here -->
        <x-utils.notif />
        <!-- Slider Area End Here -->

        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-5">
                    <a href="{{ url('Penanaman') }}" class="btn btn-primary"><i
                                class="fa fa-arrow-left "></i>Kembali</a>
                        <div class="">
                            <div class="card-body">
                                <div class="row">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-12 mt-5">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <p> Edit Data Tanaman </p>
                                                        <div class="card-tools">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="card-body">
                                                        <form action="{{ url('Penanaman', $tanaman->id) }}"
                                                            method="post" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PUT')
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="control-label">sample Penanaman </label>
                                                                        <input type="text" class="form-control" name="sample" value="{{ $tanaman->sample }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="" class="control-label">Umur
                                                                            Tanaman Saat Ditanam</label>
                                                                        <input type="text" class="form-control"
                                                                            name="umur_tanaman"
                                                                            value="{{ $tanaman->umur_tanaman }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Tanggal
                                                                            Penanaman</label>
                                                                        <input type="date" class="form-control" name="tanggal_penanaman" value="{{ $tanaman->tanggal_penanaman }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Lokasi</label>
                                                                        <input type="text" class="form-control"
                                                                            name="lokasi"
                                                                            value="{{ $tanaman->lokasi }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Jenis Mangrove</label>
                                                                        <input type="text" class="form-control"
                                                                            name="jenis_mangrove"
                                                                            value="{{ $tanaman->jenis_mangrove }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Jenis Tanah</label>
                                                                        <input type="text" class="form-control"
                                                                            name="jenis_tanah"
                                                                            value="{{ $tanaman->jenis_tanah }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Masa Tumbuh</label>
                                                                        <input type="text" class="form-control"
                                                                            name="masa_tumbuh"
                                                                            value="{{ $tanaman->masa_tumbuh }}">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Foto</label>
                                                                        <input type="file" accept="image/*" class="form-control"
                                                                            name="foto"
                                                                            value="{{ $tanaman->foto }}">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for=""
                                                                    class="control-label">Deskripsi</label>
                                                                <textarea name="deskripsi" id="deskripsi" class="form-control">{{ value($tanaman->deskripsi) }}</textarea>
                                                            </div>
                                                            <br>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Latitude</label>
                                                                        <span style="color: grey"><span
                                                                                style="color: red"> *</span>(click pada
                                                                            peta
                                                                            kemudian drag marker)</span>
                                                                        <input type="float" class="form-control"
                                                                            name="lat" id="latitude"
                                                                            value="{{ $tanaman->lat }}">
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for=""
                                                                            class="control-label">Longitude</label>
                                                                        <span style="color: grey"><span
                                                                                style="color: red"> *</span>(click pada
                                                                            peta
                                                                            kemudian drag marker)</span>
                                                                        <input type="float" class="form-control"
                                                                            name="lng" id="longitude"
                                                                            value="{{ $tanaman->lng }}">
                                                                        <br>
                                                                    </div>
                                                                </div>
                                                                <div id="map"
                                                                    style="width: 80%; height: 300px;margin-left:auto;margin-right:auto">
                                                                </div>
                                                            </div>
                                                            <br>
                                                            <div class="button-group pull-right">
                                                                <button class="btn btn-success float-right"><i
                                                                        class="fa fa-save "></i> Simpan</button>
                                                            </div>
                                                        </form>
                                                        <a href="{{ url('Penanaman') }}"
                                                            class="btn btn-danger pull-right"
                                                            style="margin-right:10px"><i class="fa fa-trash "></i>
                                                            Batal</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
        <br>

        <script>
            var peta1 = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/streets-v11'
                });

            var peta2 = L.tileLayer(
                'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
                    attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
                        '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
                        'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                    id: 'mapbox/satellite-v9'
                });


            var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy;Bayu Pratama</a>'
            });

            var map = L.map('map', {
                center: [{{ $tanaman->lat }}, {{ $tanaman->lng }}],
                zoom: 9,
                layers: [peta3],
            });

            var baseMaps = {
                "Grayscale": peta1,
                "Sattelite": peta2,
                "Streets": peta3,
            };

            var latInput = document.querySelector("[name=latitude]");
            var lngInput = document.querySelector("[name=longitude]");

            var curLocation = [-1.8028443920355783, 109.9684624870144];

            map.attributionControl.setPrefix(false);

            var marker = new L.marker(curLocation, {
                draggable: 'true'
            });

            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
                marker.setLatLng(position, {
                    draggable: 'true'
                }).bindPopup(position).update();
                $("#latitude").val(position.lat);
                $("#longitude").val(position.lng);
            });

            map.addLayer(marker);

            map.on("click", function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                if (!marker) {
                    marker = L.marker(e.latlng).addTo(map);
                } else {
                    marker.setLatLng(e.latlng);
                }
                latInput.value = lat;
                lngInput.value = lng;
            });

            L.Control.geocoder({
                position: 'topleft'
            }).addTo(map);

            L.control.defaultExtent().addTo(map);

            L.control.locate().addTo(map);
        </script>
        <!-- Begin Footer Area -->
        <x-web.layout.footer />
        <!-- Footer Area End Here -->

        <!-- Begin Scroll To Top -->
        <a class="scroll-to-top" href="">
            <i class="ion-android-arrow-up"></i>
        </a>
        <!-- Scroll To Top End Here -->

    </div>

    <!-- Global Vendor, plugins JS -->

    <!-- JS Files
    ============================================ -->
    <!-- Global Vendor, plugins JS -->

    <!-- Vendor JS -->
    <script src="{{ url('/') }}/assets-web/assets/js/vendor/bootstrap.bundle.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/vendor/modernizr-3.11.2.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/vendor/jquery.waypoints.js"></script>

    <!--Plugins JS-->
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/wow.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/jquery-ui.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/tippy.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/mailchimp-ajax.js"></script>

    <!-- Plugins & Activation JS For Only This Page -->
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="{{ url('/') }}/assets-web/assets/js/plugins/jquery.counterup.js"></script>

    <!--Main JS (Common Activation Codes)-->
    <script src="{{ url('/') }}/assets-web/assets/js/main.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>





</html>

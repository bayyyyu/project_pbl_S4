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
                    <div class="col-md-12 mt-5">
                        <a href="{{ url('Penanaman') }}" class="btn btn-primary mb-2"><i
                                class="fa fa-arrow-left "></i>Kembali</a>
                        <div class="card">
                            <div class="card-header">
                                <p>Detail Data penanaman </p>
                                <div class="card-tools">
                                    </a>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 ">
                                        <div class="card-body">
                                            <h3 class="text-center">Detail</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Lokasi</strong>
                                                    @if ($tanaman->lokasi)
                                                        <p style="font-size:15px">{{ $tanaman->lokasi }}</p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Sample</strong>
                                                    @if ($tanaman->sample)
                                                        <p style="font-size:15px">{{ $tanaman->sample }}</p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Tanggal Penanaman</strong>
                                                    @if ($tanaman->tanggal_penanaman)
                                                        <p style="font-size:15px">
                                                            {{ $tanaman->tanggal_penanaman }}</p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Jenis Mangrove</strong>
                                                    @if ($tanaman->jenis_mangrove)
                                                        <p style="font-size:15px">
                                                            {{ $tanaman->jenis_mangrove }}</p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Jenis Tanah</strong>
                                                    @if ($tanaman->jenis_tanah)
                                                        <p style="font-size:15px">{{ $tanaman->jenis_tanah }}
                                                        </p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Masa Tumbuh</strong>
                                                    @if ($tanaman->masa_tumbuh)
                                                        <p style="font-size:15px">{{ $tanaman->masa_tumbuh }}
                                                        </p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Umur Tanaman</strong>
                                                    @if ($tanaman->umur_tanaman)
                                                        <p style="font-size:15px">{{ $tanaman->umur_tanaman }}
                                                        </p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                                <div class="col-md-6 col-sm-3">
                                                    <strong>Deskripsi</strong>
                                                    @if ($tanaman->deskripsi)
                                                        <p style="font-size:15px">{{ $tanaman->deskripsi }}</p>
                                                    @else
                                                        <p style="font-size:15px">-</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <hr>
                                            <h3 class="text-center">Foto</h3>
                                            <hr>
                                            <div class="row">
                                                <div class="product-item">
                                                    <div class="product-img" style="margin-right:10px; margin-left:10px; margin-bottom:20px; margin-top:20px">
                                                            <img src="{{ asset($tanaman->foto) }}" alt="Image"  style=" width:100%; height:auto; object-fit:cover">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <br>

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

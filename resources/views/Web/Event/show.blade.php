<x-web.app-webNoSlider>
    <section class="shop-single" style="margin-top:10vh">
        <i class="icofont-arrow-left btn btn-lg custom-back-button" onclick="goBack()"></i>
        <div class="container">
            <div class="row justify-content-center mb-15">
                <div class=" col-12 sticky-widget">
                    <div class="product-details">
                        <div class="row align-items-center">
                            <div class="col-md-6 col-12">
                                <div class="product-thumb">
                                    <div class="swiper-container gallery-top">
                                        <div class="swiper-wrapper">
                                            <div class="swiper-slide">
                                                <div class="shop-item">
                                                    <div class="shop-thumb">
                                                        <img src="{{ asset($event->foto) }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="post-content">
                                    <h4>{{ $event->nama_event }}</h4>
                                    <p class="rating">
                                        (3 review)
                                    </p>
                                    {{-- <h4>
                                        Waktu Pelaksanaan
                                    </h4>
                                    <p>
                                        {!! date('d F Y', strtotime($event->tanggal_event)) !!} jam {!! date('H:i', strtotime($event->jam)) !!}
                                    </p> --}}
                                    <a href="{{ url('GIS') }}" class="btn btn-lg"
                                        style="background-color:#064635; color:white" type="submit"
                                        onclick="zoomToMarker()">Pantau Lokasi</a>
                                    <div class="progress-container" style="margin-top: 30px">
                                        <strong style="color: black">{{ $jumlah_pohon_hidup }} pohon</strong>
                                        <span style="color: black"> tumbuh dari {{ $jumlah_penanaman }} pohon</span>
                                        <br>
                                        <progress style="width: 80%; height: 30px; transition: width 0.5s;"
                                            value="{{ $jumlah_pohon_hidup }}" max="{{ $jumlah_penanaman }}"></progress>
                                        <a type="button" class="btn btn-more-style collapsed float-right"
                                            data-toggle="collapse" data-target="#collapseContent{{ $event->id }}"
                                            aria-expanded="false" aria-controls="collapseContent{{ $event->id }}"
                                            style="border:none; color:#064635"><i
                                                class="fas fa-chevron-circle-down fa-lg icon-style"></i>
                                        </a>
                                        <div class="collapse" id="collapseContent{{ $event->id }}">
                                            belum ada isi
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" data-toggle="tab" href="#deskripsi">Deskripsi</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" data-toggle="tab" href="#dokumentasi">Dokumentasi</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-5">
                                        <div id="deskripsi" class="tab-pane fade show active">
                                            <div class="row">
                                                <div class="col-lg-8">
                                                    <h5>Deskripsi</h5>
                                                    <p style="color: black; text-align: justify;">
                                                        {!! $event->deskripsi !!}</p>
                                                </div>
                                                <div class="col-lg-4">
                                                    <h5>Keikutsertaan</h5>
                                                    @if ($event->tanggal_event < now())
                                                        <div class="alert alert-danger" role="alert"
                                                            style="color: black;width:100%">
                                                            Telah Berakhir
                                                        </div>
                                                    @else
                                                        <div class="alert alert-success" role="alert"
                                                            style="color: black;width:100%">
                                                            <p style="color: black; text-align: justify;">Jadwal
                                                                Pelaksanaan:
                                                            </p>
                                                            <p style="color: black; text-align: justify;">
                                                                {!! date('d F Y', strtotime($event->tanggal_event)) !!}</p>
                                                            <p style="color: black; text-align: justify;"> jam
                                                                {!! date('H:i', strtotime($event->jam)) !!}</p>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div id="dokumentasi" class="tab-pane fade">
                                            @if ($event->foto_dokumentasi)
                                                {{-- <div class="wrapper" style="max-height:400px; overflow-y: auto; padding:20px">
                                                <p>
                                                    {{$event->deskripsi_foto_dokumentasi}}
                                                </p>
                                                <img src="{{ asset($event->foto_dokumentasi) }}" alt="Foto Dokumentasi" style="width: 100%">
                                            </div> --}}
                                                <div class="wrapper"
                                                    style="max-height:400px; overflow-y: auto; padding:20px">
                                                    @if (pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'jpg' ||
                                                            pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'png')
                                                        <p style="color:black">
                                                            {{ $event->deskripsi_foto_dokumentasi }}
                                                        </p>
                                                        <hr>
                                                        <img src="{{ asset($event->foto_dokumentasi) }}"
                                                            alt="Foto dokumentasi" style="width: 100%" loading="lazy">
                                                    @elseif (pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'mp4')
                                                        <p style="color:black">
                                                            {{ $event->deskripsi_foto_dokumentasi }}
                                                        </p>
                                                        <hr>
                                                        <video controls
                                                            style="width: 100%;height:400px;object-fit:cover">
                                                            <source src="{{ asset($event->foto_dokumentasi) }}"
                                                                type="video/mp4" loading="lazy">
                                                            Maaf, browser Anda tidak mendukung pemutaran video.
                                                        </video>
                                                    @endif
                                                </div>
                                            @else
                                                <div class="alert alert-info" role="alert"
                                                    style="color: black;width:100%">Belum ada dokumentsi yang di unggah
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <h5>Lokasi</h5>
                                        <hr>
                                        <div id="map" style="width: auto; height: 300px;"></div>
                                        <hr>
                                        <div class="card-detail" id="marker-info" style="display: none;">
                                            <button class="btn btn-sm btn-close" onclick="closeDetail()" style="position: absolute; right:0; margin-right:25px; margin-top:5px; z-index: 2; color:white;font-weight:bolder; background-color:rgba(180, 5, 5, 0.527)">X</button>
                                            <img id="marker-image" src=""
                                                style="height: 100%; object-fit: cover;">
                                            <p id="marker-title" style="color: black"></p>
                                            {{-- <a id="detail-link" href="{{ url('GIS') }}" class="btn btn-sm"
                                                style="background-color:#064635; color:white">Lihat Detail</a> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <style>
        #map {
            z-index: 1;
        }

        .nav-tabs .nav-item .nav-link.active {
            background-color: #064635;
            color: white;
        }

        .nav-tabs {
            margin-top: 20px;
        }

        .nav-tabs {
            border-bottom: 2px solid #064635;
        }

        .nav-tabs .nav-link {
            margin-right: 10px;
        }

        .nav-tabs .nav-link.active {
            border-bottom: 4px solid #064635;
        }

        .card

        /* width */
        ::-webkit-scrollbar {
            width: 5px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: #064635;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #064635;
        }

        .custom-back-button {
            color: #064635;
            font-size: 35px;
            cursor: pointer;
        }

            {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
    </style>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

    <script>
        function goBack() {
            window.history.back();
        }
        function closeDetail() {
            var detailCard = document.querySelector('.card-detail');
            detailCard.style.display = 'none';
        }

        function initializeMap() {
            var latitude = {{ $event->lat }};
            var longitude = {{ $event->lng }};
            var zoomLevel = 13;
            var map = L.map('map').setView([latitude, longitude], zoomLevel);

            var greenIcon = L.icon({
                iconUrl: '{{ url('/') }}/assets-web2/assets/images/icon/calendar.png',
                iconSize: [45, 50],
                iconAnchor: [16, 32]
            });

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; OpenStreetMap | Bayu Pratama'
            }).addTo(map);

            var marker = L.marker([{{ $event->lat }}, {{ $event->lng }}], {
                icon: greenIcon
            }).addTo(map);

            marker.on('click', function() {
                document.getElementById('marker-image').src = '{{ asset($event->foto) }}';
                document.getElementById('marker-title').innerText = '{{ $event->nama_event }}';
                document.getElementById('marker-info').style.display = 'block';

                // Update the href attribute of the "Lihat Detail" link with the GIS URL and the event's marker coordinates
                var detailLink = document.getElementById('detail-link');
                var gisUrl = '{{ url('GIS') }}';
                var markerCoordinates = [{{ $event->lat }}, {{ $event->lng }}];
                detailLink.href = gisUrl + '?marker=' + markerCoordinates.join(',');
            });

            map.on('load', function() {
                map.fitBounds(marker.getBounds());
            });
        }

        document.addEventListener('DOMContentLoaded', function() {
            initializeMap();
        });
    </script>
</x-web.app-webNoSlider>

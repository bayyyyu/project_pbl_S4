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
                                                    <p style="color: black; text-align: justify;">{{ $event->deskripsi }}</p>
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
                                                            <p style="color: black; text-align: justify;">Jadwal Pelaksanaan:
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
                                            <div class="wrapper" style="max-height:400px; overflow-y: auto; padding:20px">
                                                @if (pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'jpg' || pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'png')
                                                    <p style="color:black">
                                                        {{$event->deskripsi_foto_dokumentasi}}
                                                    </p>
                                                    <hr>
                                                    <img src="{{ asset($event->foto_dokumentasi) }}" alt="Foto dokumentasi" style="width: 100%" loading="lazy">
                                                @elseif (pathinfo($event->foto_dokumentasi, PATHINFO_EXTENSION) === 'mp4')  
                                                    <p style="color:black">
                                                        {{$event->deskripsi_foto_dokumentasi}}
                                                    </p>
                                                    <hr>    
                                                    <video controls style="width: 100%;height:400px;object-fit:cover">
                                                        <source src="{{ asset($event->foto_dokumentasi) }}" type="video/mp4" loading="lazy">
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
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15951.837396913674!2d109.9854146!3d-1.7490984499999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e051fb95ef37c79%3A0x48398cc6608e4540!2sPantai%20Air%20Mata%20Permai!5e0!3m2!1sid!2sid!4v1686474487100!5m2!1sid!2sid" width="200" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <style>
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

        .card/* width */
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
        } {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
        }
        
        
    </style>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</x-web.app-webNoSlider>

<x-app>
    <div class="container">
        <div class="row">
            <div class="col-md-12 mt-5">
                <div class="col-md-12">
                    <a href="{{ url('Admin/Event') }}" class="btn btn-dark mb-2"><i
                            class="fa fa-arrow-left "></i>Kembali</a>
                    <div class="card">
                        <div class="card-header bg-dark">
                            <p style="color: white">Detail Data penanaman </p>
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
                                                <strong style="font-weight: bolder" >Nama Event</strong>
                                                @if ($event->nama_event)
                                                    <p style="font-size:15px">{{ $event->nama_event }}</p>
                                                @else
                                                    <p style="font-size:15px">-</p>
                                                @endif
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Waktu Kegiatan</strong>
                                                    <p style="font-size:15px">{!! date('d F Y', strtotime($event->tanggal_event)) !!} jam {!! date('H:i', strtotime($event->jam)) !!}</p>
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jumlah Penanaman</strong>
                                                    <p style="font-size:15px">{{ $jumlah_penanaman }} pohon</p>
                                            </div>
                                            <div class="col-md-6 col-sm-3">
                                                <strong style="font-weight: bolder">Jumlah Pohon Yang Hidup</strong>
                                                    <p style="font-size:15px">{{ $jumlah_pohon_hidup[$event->id]}} pohon</p>
                                            </div>
                                            
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="text-center">
                                                    <strong style="font-weight: bolder;">Deskripsi</strong>
                                                </div>
                                                <p style="font-size:15px">{!! $event->deskripsi !!}</p>
                                            </div>
                                        </div>
                                        <hr>
                                        <h3 class="text-center">Foto</h3>
                                        <hr>
                                        <div class="block">
                                            <div class="product-item">
                                                    <img src="{{ asset($event->foto) }}" alt="Image"
                                                        style="  display: block;width: 100%;height: auto;object-fit: cover;object-position: center;box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
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
</x-app>

<x-app>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="fa fa-calendar bg-c-green"></i>
                    <div class="d-inline">
                        <h5>Event</h5>
                        <span>Halaman Event</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('Admin/Dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Event</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Data Event</h5>
                        <a href="{{ url('Admin/Event/create') }}" class="btn btn-inverse float-right mr-2" style="border-radius:5px;"><i
                                class="feather icon-plus"></i> Tambah Event</a>
                        <div class="post-inner float-right">
                            <div class="post-content ">
                                <div class="tab">
                                    <button class="tablink btn btn-sm active" onclick="openTab(event, 'telahSelesai')" id="defaultOpen" style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #37474F; font-weight:bolder; color:#37474F">Telah Selesai</button>
                                    <button class="tablink btn btn-sm" onclick="openTab(event, 'belumSelesai')" style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #37474F; font-weight:bolder; color:#37474F" >Belum Selesai</button>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div id="telahSelesai" class="tabcontent" style="display: none;">
                        <div class="card-block">
                            <div class=" dt-responsive table-responsive">
                                <table id="dom-jqry-telah-selesai" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <th >No</th>
                                        <th>Aksi</th>
                                        <th>Nama Event</th>
                                        <th >Jumlah Penanaman</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_event_telah_selesai->where('tanggal_event', '<', now()) as $event)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="btn-group ml-2">
                                                    <div class="row">
                                                    <a href="{{ url('Admin/Event', $event->id) }}" class="btn btn-inverse btn-mat"><i
                                                            class="feather icon-info"></i></a>
                                                    <a href="{{ url('Admin/Event', $event->id) }}/edit" class="btn btn-warning btn-mat"><i
                                                            class="feather icon-edit"></i></a>
                                                    {{-- @include('components.utils.delete', ['url'=> url('Admin/Event', $event->id)]) --}}
                                                    <x-button.delete id="{{ $event->id }}" />
                                                    <a href="{{ url('Admin/Event', $event->id)}}/dokumentasi" class="btn btn-dark btn-mat" style="margin-left: 5px">
                                                        <i class="feather icon-camera"></i>
                                                    </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$event->nama_event}}</td>
                                            <td>{{ $jumlah_penanaman[$event->id] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div id="belumSelesai" class="tabcontent" style="display: none;">
                        <div class="card-block">
                            <div class=" dt-responsive table-responsive">
                                <table id="dom-jqry-belum-selesai" class="table table-striped table-bordered nowrap">
                                    <thead>
                                        <th>No</th>
                                        <th  width="100px">Aksi</th>
                                        <th>Nama Event</th>
                                        <th>Pohon Yang Hidup</th>
                                        <th>Jumlah Penanaman</th>
                                    </thead>
                                    <tbody>
                                        @foreach ($list_event_belum_selesai->where('tanggal_event', '>', now()) as $event)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="btn-group ml-2">
                                                    <div class="row">
                                                    <a href="{{ url('Admin/Event', $event->id) }}" class="btn btn-inverse btn-mat"><i
                                                            class="feather icon-info"></i></a>
                                                    <a href="{{ url('Admin/Event', $event->id) }}/edit" class="btn btn-warning btn-mat"><i
                                                            class="feather icon-edit"></i></a>
                                                    {{-- @include('components.utils.delete', ['url'=> url('Admin/Event', $event->id)]) --}}
                                                    <x-button.delete id="{{ $event->id }}" />
                                                    </div>
                                                </div>
                                            </td>
                                            <td>{{$event->nama_event}}</td>
                                            <td>{{ $jumlah_pohon_hidup[$event->id]}} pohon</td>
                                            <td>{{ $jumlah_penanaman[$event->id] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app>
<style>
    /* Style untuk tombol tab-link */
        .tab button {
            float: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Style untuk tombol tab-link aktif */
        .tab button.active {
            background-color: #37474F !important;
            color: white !important;
        }
</style>
<script>
        $(document).ready(function() {
            $('#dom-jqry-telah-selesai').DataTable();
            $('#dom-jqry-belum-selesai').DataTable();
        });
        function openTab(evt, tabName) {
            var i, tabcontent, tablinks;
            // Menyembunyikan semua konten tab
            tabcontent = document.getElementsByClassName("tabcontent");
            for (i = 0; i < tabcontent.length; i++) {
                tabcontent[i].style.display = "none";
            }

            // Menghapus class active dari semua tombol tab-link
            tablinks = document.getElementsByClassName("tablink");
            for (i = 0; i < tablinks.length; i++) {
                tablinks[i].className = tablinks[i].className.replace(" active", "");
            }

            // Menampilkan konten tab yang dipilih dan menambahkan class active pada tombol tab-link
            document.getElementById(tabName).style.display = "block";
            evt.currentTarget.className += " active";
        }

        // Menampilkan tab default secara otomatis
        document.getElementById("defaultOpen").click();

        function searchEvent() {
            var input, filter, tabcontent, cards, cardTitle, i;
            input = document.getElementById("searchInput");
            filter = input.value.toUpperCase();
            tabcontent = document.getElementsByClassName("tabcontent");

            for (i = 0; i < tabcontent.length; i++) {
                cards = tabcontent[i].getElementsByClassName("campaign-card");

                for (var j = 0; j < cards.length; j++) {
                    cardTitle = cards[j].querySelector("h3");

                    if (cardTitle.innerText.toUpperCase().indexOf(filter) > -1) {
                        cards[j].style.display = "";

                    } else {
                        cards[j].style.display = "none";
                    }
                }
            }

            var clearSearch = document.getElementById("clearSearch");
            if (filter !== "") {
                clearSearch.style.display = "inline";
            } else {
                clearSearch.style.display = "none";
            }

        }

        function clearSearch() {
            var input = document.getElementById("searchInput");
            input.value = "";
            searchEvent();
        }
        
        function handleSearch(event) {
            if (event.keyCode === 13) {
                searchEvent();
                event.preventDefault();
            }
        }
    </script>
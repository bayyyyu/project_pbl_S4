<x-web.app-webNoSlider>
    <div class="blog-section blog-page mt-5">
        <div class="container">
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <div class=" col-12">
                        <article>
                            <div class="post-item-2">
                                <div class="post-inner">
                                    <div class="post-content ">
                                        <div class="tab">
                                            <button class="tablink btn btn-sm active" onclick="openTab(event, 'telahSelesai')" id="defaultOpen" style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635">Telah Selesai</button>
                                            <button class="tablink btn btn-sm" onclick="openTab(event, 'belumSelesai')" style="margin-right:10px; border-radius:5px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635" >Belum Selesai</button>
                                        </div>
                                        <div class="search-container">
                                            <input class="search" style="border:2px solid #064635; border-radius:5px" type="text" id="searchInput" placeholder=" Cari event..." onkeydown="handleSearch(event)">
                                            <button class="btn btn-sm mr-1" id="clearSearch" style="display: none; cursor: pointer; border-radius:50px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635" onclick="clearSearch()"><i class="icofont-close"></i></button>
                                            <button class="btn btn-sm" onclick="searchEvent()" style="border-radius:50px; background-color:white; border:2px solid #064635; font-weight:bolder; color:#064635"><i class="icofont-search-2"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="telahSelesai" class="tabcontent" style="display: none;">
                                <div class="shop-title d-flex flex-wrap justify-content-between ">
                                    <p>
                                        Daftar Event
                                    </p>
                                    <div class="product-view-mode">
                                        <a class="active" data-target="grids"><i class="icofont-ghost"></i></a>
                                    </div>
                                </div>
                                <div class="shop-product-wrap grids row ">
                                    @foreach ($list_event_telah_selesai->where('tanggal_event', '<', now()) as $event)
                                        <div class="col-lg-4 col-md-6 col-12 mb-3">
                                            <div class="campaign-card" >
                                                <img src="{{ asset($event->foto) }}"
                                                    style="height:170px; object-fit:cover">
                                                <div class="campaign-content">
                                                    <a href="{{ url('Event', $event->id) }}"><h3>{{ $event->nama_event }}</h3></a>
                                                    <p>{!! substr(nl2br($event->deskripsi), 0, 100) !!}..... </p>
                                                    {{-- <a href="{{ url('Event', $event->id) }}"
                                                        class="btn btn-sm">Selengkapnya</a>
                                                    <p class="float-right mt-2" style="color:black; font-size:15px">Telah Berakhir</p> --}}
                                                </div>
                                                <div class="action-buttons">
                                                    <a href="{{ url('Event', $event->id) }}" class="btn btn-sm">Selengkapnya</a>
                                                    <p class="status">Telah Berakhir</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="d-flex flex-wrap justify-content-center mt-2">
                                    {{ $list_event_telah_selesai->onEachSide(1)->links() }}
                                </div>
                                <div class="container">
                                    <div class="text-center">
                                        <p style="color: black; font-size:12px; font-weight:inherit">
                                            Menampilkan
                                            {{ $list_event_telah_selesai->firstItem() }}
                                            Sampai
                                            {{ $list_event_telah_selesai->lastItem() }}
                                            Dari
                                            {{ $list_event_telah_selesai->total() }}
                                            Item
                                        </p>
                                    </div>
                                </div>
                                <br>
                            </div>
                            <div id="belumSelesai" class="tabcontent" style="display: none;">
                                <div class="shop-title d-flex flex-wrap justify-content-between ">
                                    @php
                                        $belumSelesaiEvents = $list_event_belum_selesai->where('tanggal_event', '>', now());
                                        $countBelumSelesaiEvents = count($belumSelesaiEvents);
                                    @endphp
                                    <p>
                                        @if ($countBelumSelesaiEvents > 0)
                                            Daftar Event
                                        @else
                                            Tidak ada event
                                        @endif
                                    </p>
                                    <div class="product-view-mode">
                                        <a class="active" data-target="grids"><i class="icofont-ghost"></i></a>
                                    </div>
                                </div>
                                <div class="shop-product-wrap grids row ">
                                    @foreach ($list_event_belum_selesai->where('tanggal_event', '>', now()) as $event)
                                        <div class="col-lg-4 col-md-6 col-12 mt-3 mb-3">
                                            <div class="campaign-card">
                                                <img src="{{ asset($event->foto) }}"
                                                    style="height:170px; object-fit:cover">
                                                <div class="campaign-content">
                                                    <h3>{{ $event->nama_event }}</h3>
                                                    <p>{!! substr(nl2br($event->deskripsi), 0, 100) !!}..... </p>
                                                </div>
                                                @php
                                                    $tanggalEvent = new DateTime($event->tanggal_event);
                                                    $sekarang = new DateTime();
                                                    $selisih = $sekarang->diff($tanggalEvent);
                                                    $hari = $selisih->days;
                                                @endphp
                                                <div class="action-buttons">
                                                    <a href="{{ url('Event', $event->id) }}"
                                                        class="btn btn-sm">Selengkapnya</a>
                                                    @if ($hari > 0)
                                                        <p class="float-right status" style="color:black; font-size:15px"> <i class="icofont-ui-calendar"> {{ $hari }} hari lagi</i></p>
                                                    @else
                                                        <p class="float-right status" style="color:black; font-size:15px">
                                                        <i class="icofont-ui-calendar"> Besok</i></p>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{-- <div class="d-flex flex-wrap justify-content-center mt-2">
                                    {{ $list_event_belum_selesai->onEachSide(1)->links() }}
                                </div>
                                <div class="container">
                                    <div class="text-center">
                                        <p style="color: black; font-size:12px; font-weight:inherit">
                                            Menampilkan
                                            {{ $list_event_belum_selesai->firstItem() }}
                                            Sampai
                                            {{ $list_event_belum_selesai->lastItem() }}
                                            Dari
                                            {{ $list_event_belum_selesai->total() }}
                                            Item
                                        </p>
                                    </div>
                                </div>
                                <br>     --}}
                            </div>
                        </article>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        /* Style untuk tombol tab-link */
        .tab button {
            float: left;
            cursor: pointer;
            transition: 0.3s;
        }

        /* Style untuk tombol tab-link aktif */
        .tab button.active {
            background-color: #064635 !important;
            color: white !important;
        }

        .search::-webkit-input-placeholder {
            color: #064635;
        }

        .search-container {
            display: flex;
            align-items: center;
            justify-content: flex-end;
            flex-wrap: wrap;
            margin-left: auto;
        }

        #searchInput {
            margin-right: 10px;
        }

        @media screen and (max-width: 768px) {
            .search-container {
                flex-direction: flex;
                align-items: center;
                justify-content: center;
                margin-top: 20px;
            }

            .tab {
                text-align: center;
            }

            .tab button {
                float: none;
                display: inline-block;

            }
        }

        /*card*/
        .campaign-card {
            background-color: white;
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            position: relative;
            height:400px
        }

        .action-buttons {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            padding: 16px;
            background-color: rgba(255, 255, 255, 0.8);
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-sizing: border-box;
            
        }

        .action-buttons .status {
            color: black;
            font-size: 15px;
        }

        .action-buttons .btn {
            display: inline-block;
            background-color: #064635;
            color: white;
            padding: 8px 16px;
            border-radius: 4px;
            text-decoration: none;
        }

        .campaign-card img {
            width: 100%;
            height: auto;
            display: block;
        }

        .campaign-content {
            padding: 16px;
        }

        .campaign-content h3 {
            font-size: 18px;
            margin-top: 0;
        }

        .campaign-content p {
            margin-bottom: 12px;
        }

         /* Pagination*/
        .pagination .page-item.active .page-link {
            background-color: #064635;
            color: white; 
        }
        .pagination .page-item:not(.disabled):first-child .page-link::before {
            content: '\2039'; 
        }

        .pagination .page-item:not(.disabled):last-child .page-link::before {
            content: '\203A';
        }
    </style>
    <script>
        
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
</x-web.app-webNoSlider>

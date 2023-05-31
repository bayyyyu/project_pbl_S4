<x-App>
    <div class="page-header card">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="feather icon-home bg-c-blue"></i>
                    <div class="d-inline">
                        <h5>Dashboard</h5>
                        <span>Selamat datang
                            <strong style="font-weight: bolder">
                                @if (auth()->check())
                                    {{ auth()->user()->nama_lengkap }}
                            </strong>
                            di Halaman Dashboard
                            @endif
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="page-header-breadcrumb">
                    <ul class=" breadcrumb breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{url('Admin/Dashboard')}}"><i class="feather icon-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Dashboard</a> </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="pcoded-inner-content">
        <div class="main-body">
            <div class="page-wrapper">
                <div class="page-body">

                    <div class="row">

                        <div class="col-xl-8 col-md-12">
                            <div class="card sale-card">
                                <div class="card-header">
                                    <h5>Wilayah tertanam</h5>
                                </div>
                                <div class="card-block">
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <div id="allocation-map" class="chart-shadow" style="height:215px"></div>
                                        </div>
                                        <div class="col-sm-4">
                                            <div id="allocation-chart" class="chart-shadow" style="height:215px"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-12">
                            <div class="card prod-p-card card-yellow">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Pengguna</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">178 Pengguna</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user text-c-yellow f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-success m-r-10">+11%</span>From
                                        Previous Month</p>
                                </div>
                            </div>
                            <div class="card prod-p-card card-green">
                                <div class="card-body">
                                    <div class="row align-items-center m-b-30">
                                        <div class="col">
                                            <h6 class="m-b-5 text-white">Total Pohon Tertanam</h6>
                                            <h3 class="m-b-0 f-w-700 text-white">15,830</h3>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-tree text-c-green f-18"></i>
                                        </div>
                                    </div>
                                    <p class="m-b-0 text-white"><span class="label label-warning m-r-10">+12%</span>From
                                        Previous Month</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h5>Data Penanaman </h5>
                                    <div class="card-header-right">
                                        <ul class="list-unstyled card-option">
                                            <li class="first-opt"><i
                                                    class="feather icon-chevron-left open-card-option"></i></li>
                                            <li><i class="feather icon-maximize full-card"></i></li>
                                            <li><i class="feather icon-minus minimize-card"></i></li>
                                            <li><i class="feather icon-refresh-cw reload-card"></i></li>
                                            <li><i class="feather icon-trash close-card"></i></li>
                                            <li><i class="feather icon-chevron-left open-card-option"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="card-block">
                                    <div id="sales-analytics" style="height: 390px;"></div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div id="styleSelector">
    </div>
</x-App>

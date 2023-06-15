<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admindek {{ $title }}</title>


    <!--[if lt IE 10]>
  <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
  <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
  <![endif]-->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ url('/') }}/assets/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/files/assets/pages/waves/css/waves.min.css" type="text/css"
        media="all">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/feather/css/feather.css">


    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/files/bower_components/chartist/css/chartist.css"
        type="text/css" media="all">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/datatables.net-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/assets/pages/data-table/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/widget.css">

    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css"
        integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js"
        integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>

    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
    <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('public') }}/assets-web/css/leaflet.defaultextent.css">
    <script src="{{ url('public') }}/assets-web/js/leaflet.defaultextent.js"></script>

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/pages.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/leaflet.locatecontrol/dist/L.Control.Locate.min.js" charset="utf-8"></script>

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/multiselect/css/multi-select.css" />
    <link rel="stylesheet" href="{{ url('/') }}/assets/files/bower_components/select2/css/select2.min.css" />

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/animate.css/css/animate.css">

    <link href="{{ url('/') }}/assets/files/assets/pages/jquery.filer/css/jquery.filer.css" type="text/css" rel="stylesheet" />
    <link href="{{ url('/') }}/assets/files/assets/pages/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" type="text/css" rel="stylesheet" />

    {{-- <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/bootstrap-multiselect/css/bootstrap-multiselect.css" />
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/multiselect/css/multi-select.css" /> --}}

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
    @stack('style')
</head>

<body>

    {{-- <div class="loader-bg">
        <div class="loader-bar"></div>
    </div> --}}

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">


            {{-- header start --}}
            <x-layout.header />

            {{-- header end --}}

            {{-- sidebar chat start --}}
            <div id="sidebar" class="users p-chat-user showChat">
                <div class="had-container">
                    <div class="p-fixed users-main">
                        <div class="user-box">
                            <div class="chat-search-box">
                                <a class="back_friendlist">
                                    <i class="feather icon-x"></i>
                                </a>

                                <div class="right-icon-control">
                                    <div class="input-group input-group-button">
                                        <input type="text" id="search-friends" name="footer-email"
                                            class="form-control" placeholder="Search Friend">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary waves-effect waves-light" type="button"><i
                                                    class="feather icon-search"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="main-friend-list">
                                <div class="media userlist-box waves-effect waves-light" data-id="1"
                                    data-status="online" data-username="Josephin Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius img-radius"
                                            src="{{ url('/') }}/assets/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image ">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="chat-header">Josephin Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="2"
                                    data-status="online" data-username="Lary Doe">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ url('/') }}/assets/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Lary Doe</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="3"
                                    data-status="online" data-username="Alice">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ url('/') }}/assets/files/assets/images/avatar-4.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-success"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alice</div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="4"
                                    data-status="offline" data-username="Alia">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ url('/') }}/assets/files/assets/images/avatar-3.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Alia<small class="d-block text-muted">10 min
                                                ago</small></div>
                                    </div>
                                </div>
                                <div class="media userlist-box waves-effect waves-light" data-id="5"
                                    data-status="offline" data-username="Suzen">
                                    <a class="media-left" href="#!">
                                        <img class="media-object img-radius"
                                            src="{{ url('/') }}/assets/files/assets/images/avatar-2.jpg"
                                            alt="Generic placeholder image">
                                        <div class="live-status bg-default"></div>
                                    </a>
                                    <div class="media-body">
                                        <div class="f-13 chat-header">Suzen<small class="d-block text-muted">15 min
                                                ago</small></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- sidebar chat end --}}

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                    {{-- sidebar start --}}
                    <x-layout.sidebar />
                    {{-- sidebar end --}}

                    <div class="pcoded-content">
                        <x-utils.notif />


                        {{ $slot }}

                    </div>

                    <div id="styleSelector">
                    </div>

                </div>

            </div>

            {{-- footer start --}}
            <x-layout.footer />
            {{-- footer end --}}
        </div>
    </div>

    <script data-cfasync="false"
        src="{{ url('/') }}/assets/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/jquery/js/jquery.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/jquery-ui/js/jquery-ui.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/popper.js/js/popper.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/bootstrap/js/bootstrap.min.js">
    </script>

    <script src="{{ url('/') }}/assets/files/assets/pages/waves/js/waves.min.js"></script>

    <script type="text/javascript"
        src="{{ url('/') }}/assets/files/bower_components/jquery-slimscroll/js/jquery.slimscroll.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/modernizr/js/modernizr.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/modernizr/js/css-scrollbars.js">
    </script>

    <script src="{{ url('/') }}/assets/files/assets/pages/chart/float/jquery.flot.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/chart/float/jquery.flot.categories.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/chart/float/curvedLines.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/chart/float/jquery.flot.tooltip.min.js"></script>

    <script src="{{ url('/') }}/assets/files/bower_components/chartist/js/chartist.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/light.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/js/pcoded.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/js/vertical/vertical-layout.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/pages/dashboard/custom-dashboard.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/script.min.js"></script>

    <script src="{{ url('/') }}/assets/files/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="{{ url('/') }}/assets/files/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js">
    </script>
    <script src="{{ url('/') }}/assets/files/assets/pages/data-table/js/jszip.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/data-table/js/pdfmake.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/data-table/js/vfs_fonts.js"></script>
    <script src="{{ url('/') }}/assets/files/bower_components/datatables.net-buttons/js/buttons.print.min.js">
    </script>
    <script src="{{ url('/') }}/assets/files/bower_components/datatables.net-buttons/js/buttons.html5.min.js">
    </script>
    <script src="{{ url('/') }}/assets/files/bower_components/datatables.net-bs4/js/dataTables.bootstrap4.min.js">
    </script>
    <script
        src="{{ url('/') }}/assets/files/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js">
    </script>
    <script
        src="{{ url('/') }}/assets/files/bower_components/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js">
    </script>
    <script src="{{ url('/') }}/assets/files/assets/pages/data-table/js/data-table-custom.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ url('/') }}/assets/files/assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/script.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/select2/js/select2.full.min.js">
    </script>

    <script type="text/javascript"
        src="{{ url('/') }}/assets/files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js"></script>
    <script type="text/javascript"
        src="{{ url('/') }}/assets/files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/pages/advance-elements/select2-custom.js">
    </script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/pages/dashboard/analytic-dashboard.min.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/script.min.js"></script>

    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/amcharts.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/gauge.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/serial.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/light.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/pie.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/ammap.min.js"></script>
    <script src="{{ url('/') }}/assets/files/assets/pages/widget/amchart/usaLow.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/animation.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/select2/js/select2.full.min.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/bootstrap-multiselect/js/bootstrap-multiselect.js">
    </script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/bower_components/multiselect/js/jquery.multi-select.js"></script>
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/jquery.quicksearch.js"></script>

    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/pages/advance-elements/select2-custom.js"></script>

    @stack('script')
</body>

</html>

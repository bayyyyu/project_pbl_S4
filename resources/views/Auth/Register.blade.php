<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admindek | Admin Template</title>


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
        content="bootstrap, bootstrap admin template, admin theme, admin dashboard, dashboard template, admin template, responsive" />
    <meta name="author" content="colorlib" />

    <link rel="icon" href="{{ url('/') }}/assets/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/bower_components/bootstrap/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ url('/') }}/assets/files/assets/pages/waves/css/waves.min.css" type="text/css"
        media="all">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/feather/css/feather.css">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/assets/icon/themify-icons/themify-icons.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/icon/icofont/css/icofont.css">

    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/assets/files/assets/icon/font-awesome/css/font-awesome.min.css">

    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/assets/files/assets/css/pages.css">
</head>

<body themebg-pattern="theme1">

    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section class="login-block">

        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <form action="{{ url('Auth/Register') }}" class="md-float-material form-material" method="POST">
                        @csrf
                        {{-- <div class="text-center">
                            <img src="{{ url('/') }}/assets/files/assets/images/logo.png" alt="logo.png">
                        </div> --}}
                        <div class="auth-box card">
                            <div class="card-block">
                                <div class="row m-b-20">
                                    <div class="col-md-12">
                                        <h3 class="text-center txt-primary">Register</h3>
                                    </div>
                                </div>
                                {{-- <div class="row m-b-20">
                                    <div class="col-md-6" style="position: relative">
                                        <button class="btn btn-primary btn-grd-* m-b-20 btn-block " style="position: absolute; right: 50%; left: 50%;">
                                            <i class="fa fa-google float-left mt-1"></i>Google</button>
                                    </div>
                                </div> --}}
                                {{-- @if ($errors->any())
                                    <div class="alert alert-danger alert-dismissible">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif --}}
                                
                                {{-- <x-utils.notif /> --}}
                                <p class="text-muted text-center p-b-5 mt-5">Register dengan akun Google anda</p>
                                <div class="form-group form-primary">
                                    <input type="text" value="{{ Session::get('nama_lengkap') }}"
                                        name="nama_lengkap" class="form-control" required="" value="{{ old('nama_lengkap') }}">
                                    @if ($errors->any('nama_lengkap'))
                                            <ul class="text-danger">
                                                @foreach ($errors->get('nama_lengkap') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <span class="form-bar"></span>
                                    <label class="float-label">Nama Lengkap</label>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="text" value="{{ Session::get('username') }}" name="username"
                                        class="form-control" required="" value="{{ old('username') }}">
                                    @if ($errors->any('username'))
                                            <ul class="text-danger">
                                                @foreach ($errors->get('username') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <span class="form-bar"></span>
                                    <label class="float-label">Username</label>
                                </div>

                                <div class="form-group form-primary">
                                    <input type="email" value="{{ Session::get('email') }}" name="email"
                                        class="form-control" required="" value="{{ old('email') }}">
                                    @if ($errors->any('email'))
                                            <ul class="text-danger">
                                                @foreach ($errors->get('email') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                        <span class="form-bar"></span>
                                    <label class="float-label">Email</label>
                                </div>
                                <div class="form-group form-primary">
                                    <input type="password" name="password" class="form-control" required="">
                                    @if ($errors->any('password'))
                                            <ul class="text-danger">
                                                @foreach ($errors->get('password') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        @endif
                                    <span class="form-bar"></span>
                                    <label class="float-label">Password</label>
                                </div>
                                
                                <div class="row m-t-25 text-left">
                                    <div class="col-12">
                                        <div class="checkbox-fade fade-in-primary">
                                            <label>
                                                <input type="checkbox" value="">
                                                <span class="cr"><i
                                                        class="cr-icon icofont icofont-ui-check txt-primary"></i></span>
                                                <span class="text-inverse">Remember me</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row m-t-30">
                                    <div class="col-md-12">
                                        <input type="submit" value="Register" class="btn btn-block btn-primary">
                                    </div>
                                </div>
                                <br>
                                <p class="text-inverse text-left">Sudah memiliki akun?<b> kembali ke halaman</b><a
                                        href="{{ url('Auth/Login') }}" style="font-weight: bolder"> Login </a></p>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

        </div>

        </div>

    </section>



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
    <script type="text/javascript" src="{{ url('/') }}/assets/files/assets/js/common-pages.js"></script>
</body>

</html>

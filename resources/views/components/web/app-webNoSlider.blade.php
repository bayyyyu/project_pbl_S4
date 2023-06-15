<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Pokdarwis</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- google fonts -->
		<link
			href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap"
			rel="stylesheet">
		<link rel="shortcut icon" type="image/x-icon" href="{{url('/')}}/assets-web2/assets/images/x-icon/01.png">

		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/animate.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/all.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/icofont.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/lightcase.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/swiper.min.css">
		<link rel="stylesheet" href="{{url('/')}}/assets-web2/assets/css/style.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

	</head>

	<body>

		<x-web.layout.header />

        
		<!-- Banner Section Start Here -->
		{{-- <x-web.layout.bannerNoSlider /> --}}
		<!-- Banner Section Ending Here -->

		{{ $slot }}

		<!-- footer section start here -->
		<x-web.layout.footer />
		<!-- footer section start here -->

		<!-- scrollToTop start here -->
		<a href="#" class="scrollToTop"><i class="icofont-swoosh-up"></i><span class="pluse_1"></span><span class="pluse_2"></span></a>
		<!-- scrollToTop ending here -->


		<script src="{{url('/')}}/assets-web2/assets/js/jquery.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/fontawesome.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/waypoints.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/bootstrap.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/swiper.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/jquery.countdown.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/jquery.counterup.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/isotope.pkgd.min.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/lightcase.js"></script>
		<script src="{{url('/')}}/assets-web2/assets/js/functions.js"></script>
	</body>
</html>
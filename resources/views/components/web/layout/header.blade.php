    <!--search area-->
    <div class="search-input">
        <div class="search-close">
            <i class="icofont-close-circled"></i>
        </div>
        <form>
            <input type="text" name="text" placeholder="Search Heare">
            <button class="search-btn" type="submit">
                <i class="icofont-search-2"></i>
            </button>
        </form>
    </div>
    <!-- search area -->

    <!-- Mobile Menu Start Here -->
    <div class="mobile-menu transparent-header">
        <nav class="mobile-header">
            <div class="header-logo">
                <a href="{{url('Home')}}"><img src="{{ url('/') }}/assets-web2/assets/images/logo/01D.png"
                        alt="logo" style="width:100%; height:50px; object-fit:contain"></a>
            </div>
            <div class="header-bar">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </nav>
        <nav class="mobile-menu">
            <div class="mobile-menu-area">
                <div class="mobile-menu-area-inner">
                    <ul class="lab-ul">
                        <li class="active">
                            <a href="{{url('Home')}}">Beranda</a>
                        </li>
                        <li>
                            <a href="{{url('About')}}">Tentang Kami</a>
                        </li>
                        <li class="{{ request()->is('Katalog Pohon','Event*','Penanaman') ? 'active2' : '' }}">
		    				<a >Informasi</a>
							<ul class="lab-ul">
								<li class="{{ request()->is('Katalog-Pohon') ? 'active2' : '' }}">
                                    <a href="{{url('Katalog-Pohon')}}">Katalog Pohon</a>
                                </li>
								<li class="{{ request()->is('Event*') ? 'active2' : '' }}">
                                    <a href="{{url('Event')}}">Event</a>
                                </li>
                                <li class="{{ request()->is('Penanaman') ? 'active2' : '' }}">
                                    <a href="{{url('Penanaman')}}">Penanaman</a>
                                </li>
							</ul>
						</li>
                        {{-- <li>
                            <a href="{{url('Informasi')}}">Informasi</a>
                        </li>
                        <li>
                            <a href="{{url('Event')}}">Event</a>
                        </li>
                        <li>
                           <a href="{{url('Tanam')}}">Penanaman</a>
                        </li> --}}
                        <li>
                            <a href="{{url('GIS')}}">Peta Interaktif</a>
                        </li>
                        <li><a href="{{url('Kontak')}}">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
    <!-- Mobile Menu Ending Here -->

    <!-- desktop menu start here -->
    <header class="header-section">
        <div class="header-top">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    {{-- <div class="col-lg-5 col-12">
                        <div class="logo py-2">
                            <a href="{{url('Home')}}"><img src="{{ url('/') }}/assets-web2/assets/images/logo/01D.png"
                            alt="logo" style="height: 30px; width: 100%; object-fit:contain"></a>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 col-12">
                        <div class="ht-left">
                            <ul class="lab-ul d-flex flex-wrap justify-content-end">
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="ht-add-thumb mr-2">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/header/01.png"
                                            alt="address" style="height:25px; width:40px; object-fit:contain">
                                    </div>
                                    <div class="ht-add-content"  style="font-size:10px;">
                                        <span>Sungai Awan Kanan</span>
                                        <span class="d-block text-bold">JL.Ketapang-Siduk</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="ht-add-thumb mr-2"  >
                                        <img src="{{ url('/') }}/assets-web2/assets/images/header/02.png"
                                            alt="email" style="height:25px; width:40px; object-fit:contain">
                                    </div>
                                    <div class="ht-add-content" style="font-size:10px;">
                                        <span>Send Mail </span>
                                        <span class="d-block text-bold">bayu29kp@gmail.com</span>
                                    </div>
                                </li>
                                <li class="d-flex flex-wrap align-items-center">
                                    <div class="ht-add-thumb mr-2">
                                        <img src="{{ url('/') }}/assets-web2/assets/images/header/03.png"
                                            alt="call" style="height:25px; width:40px; object-fit:contain">
                                    </div>
                                    <div class="ht-add-content" style="font-size:10px;">
                                        <span>Make Call </span>
                                        <span class="d-block text-bold">+88-6487-5962-563</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom bg-theme">
            <div class="header-area">
                <div class="container">
                    <div class="primary-menu">
                        <div class="main-area w-100">
                            <div class="main-menu d-flex flex-wrap align-items-center justify-content-between w-100">
                                <div class="logo">
                                    <a href="{{url('Home')}}"><img
                                    src="{{ url('/') }}/assets-web2/assets/images/logo/02.png"
                                    alt="logo" style="height: 50px; width: 100%; object-fit:contain"></a>
                                </div>
                                <ul class="lab-ul">
                                    <li class="{{ request()->is('Home') ? 'active2' : '' }}">
                                        <a href="{{url('Home')}}">Beranda</a>
                                    </li>
                                    <li class="{{ request()->is('About') ? 'active2' : '' }}">
                                        <a href="{{url('About')}}">Tentang Kami</a>
                                    </li>
                                    <li class="{{ request()->is('Informasi','Event*','Penanaman','Katalog-Pohon') ? 'active2' : '' }}">
										<a >Informasi</a>
										<ul class="lab-ul">
											<li class="{{ request()->is('Katalog-Pohon') ? 'active2' : '' }}">
                                                <a href="{{url('Katalog-Pohon')}}">Katalog Pohon</a>
                                            </li>
											<li class="{{ request()->is('Event*') ? 'active2' : '' }}">
                                                <a href="{{url('Event')}}">Event</a>
                                            </li>
                                            <li class="{{ request()->is('Penanaman') ? 'active2' : '' }}">
                                                <a href="{{url('Penanaman')}}">Penanaman</a>
                                            </li>
										</ul>
									</li>
                                    {{-- <li class="{{ request()->is('Informasi') ? 'active2' : '' }}">
                                        <a href="{{url('Informasi')}}">Katalog Pohon</a>
                                    </li>
                                    <li class="{{ request()->is('Event*') ? 'active2' : '' }}">
                                        <a href="{{url('Event')}}">Event</a>
                                    </li>
                                    <li class="{{ request()->is('Penanaman') ? 'active2' : '' }}">
                                        <a href="{{url('Penanaman')}}">Penanaman</a>
                                    </li> --}}
                                    <li class="{{ request()->is('GIS') ? 'active2' : '' }}">
                                        <a href="{{url('GIS')}}">Peta Interaktif</a>
                                    </li>
                                    {{-- <li class="{{ request()->is('Kontak') ? 'active2' : '' }}">
                                        <a href="{{url('Kontak')}}">Contact</a>
                                    </li>  --}}
                                    {{-- <li>
                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                            <a href="{{ url('Admin/Dashboard') }}"><i class="icofont-user"></i>
                                                Halaman Admin </a>
                                        @endif
                                    </li>                                  --}}
                                </ul>
                                    @if (Auth::check() && Auth::user()->role == 'admin')
                                           <a href="{{ url('Admin/Dashboard') }}"><i class="icofont-user" style="color: white"></i></a>
                                   @endif                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<style>
    .lab-ul li.active2 a {
        border-bottom: 3px solid white;
    }
</style>


    <!-- desktop menu ending here -->

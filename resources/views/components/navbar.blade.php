        <!--================Header Menu Area =================-->
        <header class="header_area">
        	<div class="main_menu">
        		<nav class="navbar navbar-expand-lg navbar-light">
        			<div class="container">
        				<!-- Brand and toggle get grouped for better mobile display -->
        				<a class="navbar-brand logo_h" href="{{ url('/') }}">
        					<span class="mr-2"><img src="{{ asset('storage/images/logo/LCOAvnqjL4CHtazsJTmDVoNsCoRcmKNPcU7zNWIq.png')}}" height="45px" alt=""></span> 
							SMK PUSPA BANGSA 2
						</a>
        				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        					<span class="icon-bar"></span>
        				</button>
        				<!-- Collect the nav links, forms, and other content for toggling -->
        				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
        					<ul class="nav navbar-nav menu_nav ml-auto">
        						<li class="nav-item {{ (request()->segment(1) == '') ? ' active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'blog') ? ' active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">Berita</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'artikel') ? ' active' : '' }}"><a class="nav-link" href="{{ route('artikel') }}">Artikel</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'jurusan') ? ' active' : '' }}"><a class="nav-link" href="{{ route('jurusan') }}">Jurusan</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'ekstrakurikuler') ? ' active' : '' }}"><a class="nav-link" href="{{ route('ekstrakurikuler') }}">Kegiatan Siswa</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'teach') ? ' active' : '' }}"><a class="nav-link" href="{{ route('guru') }}">Guru</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'contact') ? ' active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        						<li class="nav-item {{ (request()->segment(1) == 'ppdb') ? ' active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">PPDB</a></li>
        						<!-- @guest
                                    @if (Route::has('login'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                                    @endif
                                    
                                    @if (Route::has('register'))
                                        <li class="nav-item"><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                                    @endif
                                @else
                                <li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        {{ Auth::user()->name }}
                                    </a>
									<ul class="dropdown-menu">
                                        <li class="nav-item"><a class="nav-link" href="{{ route('logout') }}" data-toggle="modal" data-target="#logoutModal">
                                            {{ __('Logout') }}</a>
                                        </li>
									</ul>
								</li> 
                                @endguest                     -->
        					</ul>
        				</div>
        			</div>
        		</nav>
        	</div>
        </header>
        <!--================Header Menu Area =================-->
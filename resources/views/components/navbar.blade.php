        <!--================Header Menu Area =================-->
        <header class="header_area">
           	{{-- <div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social">
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li><a href="#"><i class="fa fa-behance"></i></a></li>
						</ul>
					</div>
					<div class="float-right">
						<a class="dn_btn" href="tel:+4400123654896">+440 012 3654 896</a>
						<a class="dn_btn" href="mailto:support@colorlib.com">support@colorlib.com</a>
					</div>
           		</div>	
           	</div>	 --}}
            <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container">
						<!-- Brand and toggle get grouped for better mobile display -->
						{{-- <a class="navbar-brand logo_h" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }}</a> --}}
						<a class="navbar-brand logo_h" href="{{ url('/') }}"> SMK PUSPA BANGSA 2</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item {{ (request()->segment(1) == '') ? ' active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
								<li class="nav-item {{ (request()->segment(1) == 'blog') ? ' active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">Blog</a></li> 
								<li class="nav-item {{ (request()->segment(1) == 'jurusan') ? ' active' : '' }}"><a class="nav-link" href="{{ route('jurusan') }}">Jurusan</a></li>
								<li class="nav-item {{ (request()->segment(1) == 'contact') ? ' active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
								<li class="nav-item {{ (request()->segment(1) == 'ppdb') ? ' active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">PPDB</a></li>
								@guest
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
                                @endguest                    
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>
        <!--================Header Menu Area =================-->
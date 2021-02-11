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
        				<?php $seg = request()->segment(1); ?>
        				<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
        					<ul class="nav navbar-nav menu_nav ml-auto">
        						<li class="nav-item {{ ($seg == '') ? ' active' : '' }}"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
        						<li class="nav-item submenu dropdown {{ ($seg == 'program-keahlian' or $seg == 'ekstrakurikuler' or $seg == 'teach') ? ' active' : '' }}">
        							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Akademik</a>
        							<ul class="dropdown-menu">
        								<li class="nav-item"><a class="nav-link" href="{{ route('jurusan') }}">Program Keahlian</a></li>
        								<li class="nav-item"><a class="nav-link" href="{{ route('ekstrakurikuler') }}">Kegiatan Siswa</a></li>
        								<li class="nav-item"><a class="nav-link" href="{{ route('guru') }}">Guru</a></li>
        							</ul>
        						</li>
        						<li class="nav-item submenu dropdown {{ ($seg == 'blog' or $seg == 'artikel') ? ' active' : '' }}">
        							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Blog</a>
        							<ul class="dropdown-menu">
        								<li class="nav-item"><a class="nav-link" href="{{ route('blog') }}">Berita</a></li>
        								<li class="nav-item"><a class="nav-link" href="{{ route('artikel') }}">Artikel</a></li>
        							</ul>
        						</li>
        						<li class="nav-item {{ ($seg == 'ppdb') ? ' active' : '' }}"><a class="nav-link" href="{{ route('blog') }}">PPDB</a></li>
        						<li class="nav-item {{ ($seg == 'galeri') ? ' active' : '' }}"><a class="nav-link" href="{{ route('galeri') }}">Galeri</a></li>
        						<li class="nav-item {{ ($seg == 'contact') ? ' active' : '' }}"><a class="nav-link" href="{{ route('contact') }}">Contact</a></li>
        					</ul>
        				</div>
        			</div>
        		</nav>
        	</div>
        </header>
        <!--================Header Menu Area =================-->
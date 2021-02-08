        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item -->
            <li class="nav-item{{ (request()->segment(2) == 'dashboard') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin_dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'news') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('news') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Berita</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'article') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('article') }}">
                    <i class="fas fa-newspaper"></i>
                    <span>Artikel</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'banner') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('banner') }}">
                    <i class="fas fa-image"></i>
                    <span>banner</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'grade') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('grade') }}">
                    <i class="fas fa-flag"></i>
                    <span>Program Keahlian</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'extracurricular') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('extracurricular') }}">
                    <i class="fas fa-flag"></i>
                    <span>Kegiatan Siswa</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'galery') ? ' active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-image"></i>
                    <span>Master Galery</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{ route('galery') }}">Galery</a>
                        <a class="collapse-item" href="{{ route('image') }}">Image</a>
                    </div>
                </div>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'teach') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('teach') }}">
                    <i class="fas fa-user"></i>
                    <span>Guru</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'profile') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-building"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item{{ (request()->segment(2) == 'testimonial') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('testimonial') }}">
                    <i class="fa fa-star"></i>
                    <span>Testimonial</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
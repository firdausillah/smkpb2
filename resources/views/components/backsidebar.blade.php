        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('storage/images/logo/WBU2IlHJiXt2fDqWnf0QlFFt8fv97odmnyuzhVlI.png') }}" alt="{{ asset('storage/images/logo/WBU2IlHJiXt2fDqWnf0QlFFt8fv97odmnyuzhVlI.png') }}" height="40px">
                </div>
                <div class="sidebar-brand-text mx-3">Admin </div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <?php $seg = request()->segment(2); ?>

            <!-- Nav Item -->
            <li class="nav-item{{ ($seg == 'dashboard') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('admin_dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item{{ ($seg == 'news' or $seg == 'article') ? ' active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseBlog" aria-expanded="true" aria-controls="collapseBlog">
                    <i class="fas fa-newspaper"></i>
                    <span>Blog</span>
                </a>
                <div id="collapseBlog" class="collapse{{ ($seg == 'news' or $seg == 'article') ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item{{ ($seg == 'news') ? ' active' : '' }}" href="{{ route('news') }}">Berita</a>
                        <a class="collapse-item{{ ($seg == 'article') ? ' active' : '' }}" href="{{ route('article') }}">Artikel</a>
                    </div>
                </div>
            </li>
            <li class="nav-item{{ ($seg == 'banner') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('banner') }}">
                    <i class="fas fa-image"></i>
                    <span>banner</span>
                </a>
            </li>
            <li class="nav-item{{ ($seg == 'grade' or $seg == 'extracurricular' or $seg == 'teach') ? ' active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkademik" aria-expanded="true" aria-controls="collapseAkademik">
                    <i class="fas fa-university"></i>
                    <span>Akademik</span>
                </a>
                <div id="collapseAkademik" class="collapse{{ ($seg == 'grade' or $seg == 'extracurricular' or $seg == 'teach') ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item{{ ($seg == 'grade') ? ' active' : '' }}" href="{{ route('grade') }}">Program Keahlian</a>
                        <a class="collapse-item{{ ($seg == 'extracurricular') ? ' active' : '' }}" href="{{ route('extracurricular') }}">Kegiatan Siswa</a>
                        <a class="collapse-item{{ ($seg == 'teach') ? ' active' : '' }}" href="{{ route('teach') }}">Guru</a>
                    </div>
                </div>
            </li>
            <li class="nav-item{{ ($seg == 'galery' or $seg == 'image') ? ' active' : '' }}">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-image"></i>
                    <span>Master Galery</span>
                </a>
                <div id="collapseTwo" class="collapse{{ ($seg == 'galery' or $seg == 'image') ? ' show' : '' }}" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item{{ ($seg == 'teach') ? ' galery' : '' }}" href="{{ route('galery') }}">Galery</a>
                        <a class="collapse-item{{ ($seg == 'teach') ? ' image' : '' }}" href="{{ route('image') }}">Image</a>
                    </div>
                </div>
            </li>
            <li class="nav-item{{ ($seg == 'profile') ? ' active' : '' }}">
                <a class="nav-link" href="{{ route('profile') }}">
                    <i class="fas fa-building"></i>
                    <span>Profile</span>
                </a>
            </li>
            <li class="nav-item{{ ($seg == 'testimonial') ? ' active' : '' }}">
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
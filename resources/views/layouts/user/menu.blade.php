<div class="navbar-bg"></div>
<nav class="navbar navbar-expand-lg main-navbar">
    <a href="index.html" class="navbar-brand sidebar-gone-hide">Stisla</a>
    <div class="navbar-nav">
        <a href="#" class="nav-link sidebar-gone-show" data-toggle="sidebar"><i class="fas fa-bars"></i></a>
    </div>
    <div class="nav-collapse">
        <a class="sidebar-gone-show nav-collapse-toggle nav-link" href="#">
            <i class="fas fa-ellipsis-v"></i>
        </a>
    </div>
    <form class="form-inline ml-auto">
        <ul class="navbar-nav">
            <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i
                        class="fas fa-search"></i></a></li>
        </ul>
        @yield('search')
        {{-- <div class="search-element">
            <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
            <button class="btn" type="submit"><i class="fas fa-search"></i></button>
            <div class="search-backdrop"></div>
            @yield('search')
            <div class="search-result">
                <div class="search-header">
                    Histories
                </div>
                <div class="search-item">
                    <a href="#">How to hack NASA using CSS</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">Kodinger.com</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-item">
                    <a href="#">#Stisla</a>
                    <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                </div>
                <div class="search-header">
                    Result
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('/') }}assets/img/products/product-3-50.png" alt="product">
                        oPhone S9 Limited Edition
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('/') }}assets/img/products/product-2-50.png" alt="product">
                        Drone X2 New Gen-7
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <img class="mr-3 rounded" width="30"
                            src="{{ asset('/') }}assets/img/products/product-1-50.png" alt="product">
                        Headphone Blitz
                    </a>
                </div>
                <div class="search-header">
                    Projects
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-danger text-white mr-3">
                            <i class="fas fa-code"></i>
                        </div>
                        Stisla Admin Template
                    </a>
                </div>
                <div class="search-item">
                    <a href="#">
                        <div class="search-icon bg-primary text-white mr-3">
                            <i class="fas fa-laptop"></i>
                        </div>
                        Create a new Homepage Design
                    </a>
                </div>
            </div>
        </div> --}}
    </form>
    <ul class="navbar-nav navbar-right">
        <li class="dropdown"><a href="#" data-toggle="dropdown"
                class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="{{ asset('/') }}assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">Hi, {{ auth()->user()->name }}</div>
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-title">Logged in 5 min ago</div>
                <a href="features-profile.html" class="dropdown-item has-icon">
                    <i class="far fa-user"></i> Profile
                </a>
                <a href="features-activities.html" class="dropdown-item has-icon">
                    <i class="fas fa-bolt"></i> Activities
                </a>
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Settings
                </a>
                <div class="dropdown-divider"></div>
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                    class="dropdown-item has-icon text-danger">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<nav class="navbar navbar-secondary navbar-expand-lg">
    <div class="container">
        <ul class="navbar-nav">
            <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                <a href="/home" class="nav-link"><i class="fas fa-home"></i><span>Beranda</span></a>
            </li>
            <li class="nav-item dropdown {{ Request::is('category/*') ? 'active' : '' }}">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                        class="fas fa-book"></i><span>Kategori</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item {{ Request::is('category/agama') ? 'active' : '' }}"><a href="/category/agama"
                            class="nav-link">Agama</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/biografi') ? 'active' : '' }}"><a
                            href="/category/biografi" class="nav-link">Biografi</a>
                    <li class="nav-item {{ Request::is('category/ensiklopedia') ? 'active' : '' }}"><a
                            href="/category/ensiklopedia" class="nav-link">Ensiklopedia</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/fiksi') ? 'active' : '' }}"><a href="/category/fiksi"
                            class="nav-link">Fiksi</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/komik') ? 'active' : '' }}"><a href="/category/komik"
                            class="nav-link">Komik</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/kamus') ? 'active' : '' }}"><a href="/category/kamus"
                            class="nav-link">Kamus</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/majalah') ? 'active' : '' }}"><a
                            href="/category/majalah" class="nav-link">Majalah</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/novel') ? 'active' : '' }}"><a href="/category/novel"
                            class="nav-link">Novel</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/non-fiksi') ? 'active' : '' }}"><a
                            href="/category/non-fiksi" class="nav-link">Non-Fiksi</a>
                    </li>
                    <li class="nav-item {{ Request::is('category/sejarah') ? 'active' : '' }}"><a
                            href="/category/sejarah" class="nav-link">Sejarah</a>
                    </li>

                </ul>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fas fa-chevron-circle-down"></i><span>Peminjaman</span></a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link"><i class="fas fa-chevron-circle-up"></i><span>Pengembalian</span></a>
            </li>
            {{-- <li class="nav-item dropdown">
                <a href="#" data-toggle="dropdown" class="nav-link has-dropdown"><i
                        class="far fa-clone"></i><span>Multiple Dropdown</span></a>
                <ul class="dropdown-menu">
                    <li class="nav-item"><a href="#" class="nav-link">Not Dropdown Link</a></li>
                    <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Hover
                            Me</a>
                        <ul class="dropdown-menu">
                            <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                            <li class="nav-item dropdown"><a href="#" class="nav-link has-dropdown">Link 2</a>
                                <ul class="dropdown-menu">
                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                    <li class="nav-item"><a href="#" class="nav-link">Link</a></li>
                                </ul>
                            </li>
                            <li class="nav-item"><a href="#" class="nav-link">Link 3</a></li>
                        </ul>
                    </li>
                </ul>
            </li> --}}
        </ul>
    </div>
</nav>

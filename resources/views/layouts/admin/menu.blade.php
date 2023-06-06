<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::is('/') ? 'active' : '' }}"><a class="nav-link" href="/"><i class="fas fa-fire"></i>
            <span>Dashboard</span></a></li>
    <li class="menu-header">Data</li>
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href=""><i
                class="fas fa-user"></i>
            <span>User</span></a></li>
    <li
        class="nav-item dropdown {{ Request::is('buku/data-buku') || Request::is('buku/data-peminjaman') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i>
            <span>Buku</span></a>
        <ul class="dropdown-menu">
            <li class="{{ Request::is('buku/data-buku') ? 'active' : '' }}"><a class="nav-link"
                    href="/buku/data-buku">Data
                    Buku</a></li>
            <li class="{{ Request::is('buku/data-peminjaman') ? 'active' : '' }}"><a class="nav-link"
                    href="/buku/data-peminjaman">Data
                    Peminjaman</a></li>
        </ul>
    </li>
</ul>

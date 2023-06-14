<ul class="sidebar-menu">
    <li class="menu-header">Dashboard</li>
    <li class="{{ Request::is('dashboard') ? 'active' : '' }}"><a class="nav-link" href="/dashboard"><i
                class="fas fa-fire"></i>
            <span>Dashboard</span></a></li>
    <li class="menu-header">Data</li>
    <li class="{{ Request::is('admin') ? 'active' : '' }}"><a class="nav-link" href="/admin"><i class="fas fa-user"></i>
            <span>Admin</span></a></li>
    <li class="nav-item dropdown {{ Request::is('books') || Request::is('transactions') ? 'active' : '' }}">
        <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-book"></i>
            <span>Buku</span></a>
        <ul class="dropdown-menu">
            <li class="{{ Request::is('books') ? 'active' : '' }}"><a class="nav-link" href="/books">Data
                    Buku</a></li>
            <li class="{{ Request::is('transactions') ? 'active' : '' }}"><a class="nav-link" href="/transactions">Data
                    Peminjaman</a></li>
        </ul>
    </li>
    <li class="{{ Request::is('users') ? 'active' : '' }}"><a class="nav-link" href="/users"><i
                class="fas fa-user"></i>
            <span>User</span></a></li>
</ul>

<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="index.html">STISLA</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="{{ Request::is('/') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
            </li>
            <li class="menu-header">Item Page</li>
            <li class="{{ Request::is('kategori') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('kategori.index') }}"><i class="fas fa-list"></i> <span>Kategori</span></a>
            </li>
            <li class="{{ Request::is('wisata') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('wisata.index') }}"><i class="fas fa-map-location"></i> <span>Wisata</span></a>
            </li>
        </ul>
    </aside>
</div>

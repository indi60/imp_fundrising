@include('layouts.partial.header')
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Dashboard</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">DB</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="nav-item"><a href="/admin/provinsi" class="nav-link"><i
                        class="far fa-square"></i><span>Provinsi</span></a></li>
            <li class="nav-item"><a href="/admin/kabupaten" class="nav-link"><i
                        class="far fa-square"></i><span>Kabupaten</span></a></li>
            <li class="nav-item"><a href="/admin/kecamatan" class="nav-link"><i class="far fa-square"></i><span>Kecamatan</span></a>
            </li>
            <li class="nav-item"><a href="/admin/kelurahan" class="nav-link"><i class="far fa-square"></i><span>Kelurahan</span></a>
            </li>
        </ul>
    </aside>
</div>

<!-- Main Content -->
<div class="main-content">
    @yield('content')
</div>
@include('layouts.partial.footer')

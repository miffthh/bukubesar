<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="index.html" class="app-brand-link">
        </a>
        <a class="navbar-brand" href="/">
            <img src="{{ url('img/LOGOP-.png') }}" alt="" width="200">
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->is('/') ? 'active' : '' }}">
            <a href="/" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Data Akuntan</span>
        </li>

        <!-- Layouts -->


        {{-- <li class="menu-item">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
          <i class="menu-icon tf-icons bx bx-layout"></i>
          <div data-i18n="Layouts">Data Akuntan</div>
        </a> --}}

        {{-- 
          <ul class="menu-sub"> --}}
        <li class="menu-item {{ request()->is('akun') ? 'active' : '' }}">
            <a href="/akun" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Data Akun</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('dproyek') ? 'active' : '' }}">
            <a href="/dproyek" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Data Proyek</div>
            </a>
        </li>
        @if (auth()->user()->role == 'Admin')
            <li class="menu-item {{ request()->is('user') ? 'active' : '' }}">
                <a href="/user" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-home-circle"></i>
                    <div data-i18n="Analytics">Data User</div>
                </a>
            </li>
        @endif

        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Buku Besar</span>
        </li>
        <li class="menu-item {{ request()->is('pproyek') ? 'active' : '' }}">
            <a href="/pproyek" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Perolehan Proyek</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('bmarketing') ? 'active' : '' }}">
            <a href="/bmarketing" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Biaya Marketing</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('bks') ? 'active' : '' }}">
            <a href="/bks" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Buku Kas Harian</div>
            </a>
        </li>
        <li class="menu-item {{ request()->is('bbbadm') ? 'active' : '' }}">
            <a href="/bbbadm" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Buku Besar Biaya Administrasi & Umum</div>
            </a>
        </li>

        <p class="mt-5 mb-8 text-muted">&copy; Samalogi 2022</p>
</aside>

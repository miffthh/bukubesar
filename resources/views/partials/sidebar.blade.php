<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav">
        <!-- Dashboard Nav -->
        <li class="nav-item">
            <a class="nav-link {{ request()->is('/') ? '' : 'collapsed' }}" href="/">
                <i class="bi bi-house-door"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <!-- End Dashboard Nav -->

        <!-- Menu -->
        <li class="nav-heading">Data Akuntan</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('akun') ? '' : 'collapsed' }}" href="/akun">
                <i class="bi bi-files"></i>
                <span>Data Akun</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('dproyek') ? '' : 'collapsed' }}" href="/dproyek">
                <i class="bi bi-bag-check"></i>
                <span>Data Proyek</span>
            </a>
        </li>
        @if (auth()->user()->role == 'Admin')
            <li class="nav-item">
                <a class="nav-link {{ request()->is('user') ? '' : 'collapsed' }}" href="/user">
                    <i class="bi bi-person-lines-fill"></i>
                    <span>Data User</span>
                </a>
            </li>
        @endif

        <li class="nav-heading">Buku Besar</li>

        <li class="nav-item">
            <a class="nav-link {{ request()->is('pproyek') ? '' : 'collapsed' }}" href="/pproyek">
                <i class="bi bi-card-checklist"></i>
                <span>Perolehan Proyek</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('bmarketing') ? '' : 'collapsed' }}" href="/bmarketing">
                <i class="bi bi-cash-coin"></i>
                <span>Biaya Marketing</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('bks') ? '' : 'collapsed' }}" href="/bks">
                <i class="bi bi-clipboard-data"></i>
                <span>Buku Kas Harian</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->is('bbbadm') ? '' : 'collapsed' }}" href="/bbbadm">
                <i class="bi bi-journal-check"></i>
                <span>Buku Besar Biaya Adm & Umum</span>
            </a>
        </li>
        <!-- End Menu -->

    </ul>
    <p class="mt-5 mb-8 text-muted text-center">&copy; Samalogi 2022</p>
</aside>

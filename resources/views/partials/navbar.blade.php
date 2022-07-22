<nav class="navbar bg-cyanbiru">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">
            <img src="img/LOGOP-.png" alt="" width="200">
        </a>
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


        <form class="d-flex" role="search">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label=<i class="bi bi-search"></i>
            <!--   <button class="btn btn-outline-success" type="submit">Search</button> -->
            <div class="dropdown px-3">
                <a href="#" class="d-block link-dark text-decoration-none dropdown px-5" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="32" height="32" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small">
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </form>
    </div>
</nav>


<nav class="navbar navbar-expand-lg bg-light">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Home") ? 'active' : '' }}" href="/"> Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Data Akun") ?'active' : '' }} " href="/akun"> <i class="bi bi-book"></i> Data Akun</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Data Proyek") ?'active' : '' }}" href="/dproyek">Data Proyek</a>
                </li>                
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Perolehan Proyek") ?'active' : '' }}" href="/pproyek">Perolehan Proyek</a>                    
                </li>        
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Biaya Marketing") ?'active' : '' }}" href="/bmarketing">Biaya Marketing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Buku Kas Harian") ?'active' : '' }}" href="/bks">Buku Kas Harian</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Buku Besar Biaya Administrasi & Umum") ?'active' : '' }}" href="/bbbadm">Buku Besar Biaya Administrasi & Umum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($title === "Data User") ?'active' : '' }}" href="/user">Data User</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
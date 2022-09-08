<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">

  <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
    <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
      <i class="bx bx-menu bx-sm"></i>      
    </a>
  </div>

  <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">

    <!-- User -->
    <div class="info mt-3">
      <h4>Selamat Datang {{ auth()->user()->name }}</h4>
    </div>
    
    {{-- <li class="nav-item navbar-dropdown dropdown-user dropdown">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <div class="avatar avatar-online">
          <img src="../assets/img/avatars/1.png" alt class="w-px-40 h-auto rounded-circle" />
        </div>
      </a>
    </li> --}}
    <div class="dropdown ms-auto px-1 p-2">
      <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
      {{-- <a href="#" class="d-block link-dark text-decoration-none dropdown px-3" data-bs-toggle="dropdown" aria-expanded="false"> --}}
        <img src="/img/pic.png" alt class="w-px-40 h-auto rounded-circle" />
      </a>
      <ul class="dropdown-menu dropdown-menu-end">
        <li class="{{request()->is('profil') ? 'active' : ''}}"><a class="dropdown-item" href="/profil">Profile</a></li>
        <li class="{{request()->is('login') ? 'active' : ''}}"><a class="dropdown-item" href="/login">Login</a></li>
        <li>
          <hr class="dropdown-divider">
        </li>
        <li class="{{request()->is('logout') ? 'active' : ''}}">
          <form action="/logout" method="get">
            @csrf
            <button type="submit" class="dropdown-item"> Logout</button>
          </form>
        </li>
      </ul>
    </div>

    <!--/ User -->
    </ul>
</nav>
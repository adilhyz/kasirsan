<!-- Awal Header -->
<header class="top-bar">
    <nav class="navbar sticky-top bg-primary bg-gradient flex-md-nowrap p-0 shadow">
    <ul class="navbar-nav flex-row">
        <li class="nav-item d-block d-md-none">
        {{-- <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="#">
            <i class="ti ti-menu-2"></i>
        </a> --}}
        <button class="nav-link px-3 text-white ms-auto" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu"
            aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            {{-- <svg class="bi">
                <use xlink:href="#list" /></svg> --}}
            <i class="bi-list-nested fs-7"></i>
            </button>
        </li>
        <a href="/" target="_blank" class="mx-5 fs-5 btn btn-outline-light-danger border-0">
            <img src="/img/kasira.png" alt="" width="25" height="35" class="mb-1 img-fluid"> KasirSan
        </a>
        {{-- <li class="nav-item">
        <a class="nav-link nav-icon-hover" href="#">
            <i class="ti ti-bell-ringing"></i>
            <div class="notification bg-primary-subtle rounded-circle"></div>
        </a>
        </li> --}}
    </ul>
    <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end mx-3">
        <li class="nav-item dropdown">
            <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown"
            aria-expanded="false">
            <img src="{{ auth()->user()->level === 'Admin' ? '/img/saitama.jpeg' : '/img/user.jpg' }}" alt="" width="35" height="35" class="rounded-circle border {{ Request::is('dashboard/profile') ? 'border-2 border-warning' : 'border-2 border-primary' }}">
            </a>
            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
            <div class="message-body">
                <a href="/dashboard/profile" class="d-flex align-items-center gap-2 dropdown-item {{ Request::is('dashboard/profile') ? 'active' : '' }} ">
                    <i class="fs-5 {{ Request::is('dashboard/profile') ? 'bi-person-fill' : 'bi-person' }}"></i>
                    <p class="mt-3">Info {{ Auth::user()->level }}</p>
                </a>
                {{-- <a href="#" class="d-flex align-items-center gap-2 dropdown-item">
                <i class="bi-list-check fs-5"></i>
                <p class="mt-3">My Task</p>
                </a> --}}
                <a href="#" class="btn btn-outline-primary mx-3 mt-2 d-block shadow-none">
                    <form action="/logout" method="post">
                        @csrf
                        <button class="border-0 bg-transparent text-dark"><i class="bi-box-arrow-up-right"></i> Logout</button>
                    </form>
                </a>
            </div>
            </div>
        </li>
    </ul>
    </nav>
</header>
<!--  Akhir Header -->
    <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-primary bg-gradient fixed-top mb-5">
        <div class="container">
            {{-- <a class="navbar-brand" href="/">adilhyz</a> --}}
            <a href="#" class="navbar-brand fs-5 btn btn-outline-primary border-0 mt-1" style="color: #eee">
                <img src="/img/kasira.png" alt="" width="25" height="35" class="mb-1 img-fluid"> KasirSan
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" aria-disabled="true" href="/about">About</a>
                    </li>
                </ul>
                {{-- <ul class="navbar-nav ms-auto">
                    @auth
                    @if(auth()->user()->level === 'Admin')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" aria-disabled="true" href="/register">Register</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Welkom, {{ Auth::user()->username }}
                            <span>
                                <img src="/img/kasira.png" alt="" width="20" height="35" class="rounded-circle border img-fluid {{ Request::is('dashboard/' . 'profile/' ) ? 'border-2 border-warning' : 'border-2 border-primary' }}">
                            </span>
                        </a>
                        {{-- <a class="nav-link dropdown-toggle" href="#" id="drop2" data-bs-toggle="dropdown" aria-expanded="false">
                        </a>
                        <ul class="dropdown-menu bg-dark-subtle">
                            <li><a class="dropdown-item text-bg-dark-subtle" href="/dashboard"><i class="bi bi-speedometer2"></i> Dashboard</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item text-bg-dark-subtle"><i class="bi bi-box-arrow-up-right"></i> Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    {{-- <li class="nav-item d-none d-lg-block">
                        <div class="circle-image">
                            <img src="img/{{ $logo }}" alt="{{ $nama }}" class="mx-auto d-sm-block d-flex img-thumbnail rounded-circle bg-danger-subtle" srcset="" width="50">
                        </div>
                    </li>
                    @elseif (auth()->user()->level === 'Petugas')
                    <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Welkom, {{ Auth::user()->username }}
                    </a>
                    <ul class="dropdown-menu text-bg-dark-subtle">
                        <li><a class="dropdown-item text-bg-dark-subtle" href="/dashboard"><i class="bi-speedometer2"></i> Dashboard</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li>
                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item text-bg-dark-subtle"><i class="bi-box-arrow-up-right"></i> Logout</button>
                            </form>
                        </li>
                    </ul>
                    </li>
                    @endif
                    @else
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" aria-disabled="true" href="/login"><i class="bi bi-box-arrow-in-down-left"></i> Login</a>
                    </li>
                    @endauth
                </ul> --}}
                @auth
                    {{-- @can('Admin')
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" aria-disabled="true" href="/register">Register</a>
                        </li>
                    </ul>
                    @endcan --}}
                    <ul class="navbar-nav flex-row ms-auto align-items-center ms-auto">
                        @can('Admin')
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('register') ? 'active' : '' }}" aria-disabled="true" href="/register">Register</a>
                        </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a class="nav-link nav-icon-hover" href="#" id="drop2" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <img src="{{ auth()->user()->level === 'Admin' ? '/img/saitama.jpeg' : '/img/user.jpg' }}" alt="" width="35" height="35" class="rounded-circle border {{ Request::is('profile') ? 'border-2 border-warning' : 'border-2 border-primary' }}">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                            <div class="message-body">
                                <a class="d-flex align-items-center gap-2 dropdown-item" href="/dashboard">
                                    <i class="bi-speedometer2"></i> 
                                    <p class="mt-3">Dashboard</p>
                                </a>
                                <a href="@if (Request::is('dashboard/profile'))
                                    /dashboard/profile
                                @else
                                    /profile
                                @endif" class="d-flex align-items-center gap-2 dropdown-item {{ Request::is('dashboard/profile') ? 'active' : '' }}">
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
                    @else
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::is('login') ? 'active' : '' }}" aria-disabled="true" href="/login"><i class="bi bi-box-arrow-in-down-left"></i> Login</a>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>
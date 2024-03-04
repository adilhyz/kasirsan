@can('Admin')
    <button class="btn btn-outline-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
        <i class="bi-info-circle"></i> Tranksaksi
    </button>

    <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
        <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="staticBackdropLabel">Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
        <div>
            Hello World!
        </div>
        </div>
    </div>
@endcan
<nav class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
    aria-labelledby="sidebarMenuLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarMenuLabel">Kasircuy</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
        aria-label="Close"></button>
    </div>
    <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
        <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">
            <i class="bi bi-house-door mb-1"></i>
            Home
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <i class="bi bi-speedometer2 mb-1"></i>
            Dashboard
            </a>
        </li>
        @can('Petugas')
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/pelanggan*') ? 'active' : '' }}" href="/dashboard/pelanggan">
                <i class="bi bi-people-fill mb-1"></i>
                Pelanggan
                </a>
            </li>
        @endcan
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/produk*') ? 'active' : '' }}" href="/dashboard/produk">
            <i class="bi bi-minecart mb-1"></i>
            Produk
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/kategori*') ? 'active' : '' }}" href="/dashboard/kategori">
            <i class="bi bi-tags mb-1"></i>
            Kategori
            </a>
        </li>
        @can('Petugas')
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/tranksaksi*') ? 'active' : '' }}" href="/dashboard/tranksaksi">
                <i class="bi bi-kanban-fill mb-1"></i>
                Transaksi
                </a>
            </li>
        @endcan
        {{-- Admin --}}
        @can('Petugas')
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/penjualan*') ? 'active' : '' }}" href="/dashboard/penjualan">
                <i class="bi bi-bar-chart-line-fill mb-1"></i>
                Laporan Penjualan
                </a>
            </li>
        @endcan
        </ul>

        <hr class="my-3">
        @can('Admin')
        <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 text-muted">Admin</h6>
            <ul class="nav flex-column mb-auto disabled">
            <li class="nav-item">
                <a class="nav-link d-flex align-items-center gap-2 {{ Request::is('dashboard/user*') ? 'active' : '' }}" href="/dashboard/user">
                <svg class="bi">
                    <use xlink:href="#gear-wide-connected" /></svg>
                {{-- <i class="bi-gear-wide-connected"></i> --}}
                Data Petugas
                </a>
            </li>
            </ul>
        @endcan

    </div>
    </div>
</nav>
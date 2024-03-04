@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-card-list"></i> Data Tranksaksi</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Tranksaksi
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            <div class="row justify-content-md-between d-flex">
                <div class="col-md-auto col-6">
                    <a href="/dashboard/tranksaksi/create" class="btn btn-success mb-3">Tambah Tranksaksi</a>
                </div>
                <div class="col-md-auto col-6">
                    <button href="/dashboard/tranksaksi/create" class="btn btn-info text-light-emphasis mb-3" oncliTambah Otomatisck="">
                        <i class="bi bi-rocket-takeoff"></i>
                        {{-- @foreach ($produk as $produk)
                            <p>{{ $produk->namaproduk }} - Jumlah Order: {{ $produk->tranksaksi_count }}</p>
                        @endforeach --}}
                        Total Terjual : {{ $totalpesanan }} Produk
                    </button>
                    {{-- <button href="/dashboard/tranksaksi/create" class="btn btn-info text-light-emphasis mb-3" oncliTambah Otomatisck="">
                        <i class="bi bi-rocket-takeoff"></i> Tambah Otomatis
                    </button> --}}
                    {{-- <form action="/dashboard/produk/{{ $tranksaksi->iddetail }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-info text-light-emphasis mb-3" onclick="return confirm('aseli?')"><i class="bi bi-rocket-takeoff"></i> Tambah Otomatis</button>
                    </form> --}}
                </div>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        {{-- <th scope="col">Tranksaksi</th> --}}
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Tangal</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tranksaksi as $tranksaksis)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        {{-- <td class="text-justify text-reset">{{ $tranksaksis->iddetail }}</td> --}}
                        <td class="text-justify text-reset">{{ $tranksaksis->produk->namaproduk }}</td>
                        <td>
                            {{-- {{ $tranksaksis->pelanggan->ismember == '0' ? 'Bukan Member' : 'Member'}} --}}
                            @if($tranksaksis->pelanggan)
                                @if($tranksaksis->pelanggan->ismember !== null)
                                    @if ($tranksaksis->pelanggan->ismember == '0')
                                        Bukan Member
                                    @else
                                        {{ $tranksaksis->pelanggan->slug }} <i class="bi-star mb-1 d-inline-block align-middle"></i>
                                    @endif
                                @else
                                    Waduh
                                @endif
                            @else
                                <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                            @endif
                        
                        </td>
                        <td>{{ $tranksaksis->jumlahproduk }}</td>
                        <td>Rp. {{ $tranksaksis->subtotal }}</td>
                        <td>{{ $tranksaksis->penjualan }}</td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-lg-auto d-flex flex-nowrap justify-content-center my-2">
                                    <a href="/dashboard/tranksaksi/{{ $tranksaksis->iddetail }}" class="badge bg-primary"><i class="bi bi-eye mt-1"></i></a>
                                </div>
                                <div class="col-lg-auto d-flex flex-nowrap justify-content-center my-2">
                                    <a href="/dashboard/tranksaksi/{{ $tranksaksis->iddetail }}/edit" class="badge bg-warning"><i class="bi bi-pencil mt-1"></i></a>
                                </div>
                                <div class="col-lg-auto d-flex flex-nowrap justify-content-center my-2">
                                    <form id="hapus-{{ $tranksaksis->iddetail }}" action="/dashboard/tranksaksi/{{ $tranksaksis->iddetail }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <button class="badge bg-danger border-0" onclick="sa(event, '{{ $tranksaksis->iddetail }}')"><i class="bi bi-trash mt-1"></i></button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        {{-- <th scope="col">Tranksaksi</th> --}}
                        <th scope="col">Nama Produk</th>
                        <th scope="col">Pelanggan</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Subtotal</th>
                        <th scope="col">Tangal</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
            </table>
        </div>
        <script>
            function sa(event, id){
                event.preventDefault();
                Swal.fire({
                icon: 'question',
                title: 'Hapus',
                    text: 'Tranksaksi ' + id +' Aseli?',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yoi",
                    cancelButtonText: "Gk"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('hapus-' + id).submit();
                    } else {
                        return false;
                    }
                });
            }
        </script>
{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
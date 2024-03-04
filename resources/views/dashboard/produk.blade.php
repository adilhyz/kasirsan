@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-cart-fill"></i> Data Produk</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Produk
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            @if (auth()->user()->level === 'Admin')
            <a href="/dashboard/produk/create" class="btn btn-success mb-3">Tambah Produk</a>
            {{-- @else
            <button onclick="a()" class="btn btn-success mb-3">Tambah Produk</button>
            <script>
                function a(){
                    Swal.fire({
                        icon: 'error',
                        title: 'Yang bener aaja...',
                        text: "Sorry Yeee...",
                    });
                } 
            </script> --}}
            @endif
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col"><i class="bi-tags"></i> Kategori</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produk as $produks)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td class="text-justify text-reset">{{ $produks->namaproduk }}</td>
                        {{-- <td class="text-justify text-reset">{{ $produks->kategori ? $produks->kategori->namakategori : 'Tidak Ada Kategori' }}</td> --}}
                        <td class="text-justify text-reset">
                            @if ($produks->kategori)
                                <a href="/dashboard/kategori/{{ $produks->kategori->slug }}" class="badge bg-dark rounded-5" onmouseover="this.style.textDecoration='underline dashed'" onmouseout="this.style.textDecoration='none';">{{ $produks->kategori->namakategori }}</a>
                            @else
                                <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                            @endif
                        </td>
                        <td>{{ $produks->stok }}</td>
                        <td>Rp. {{ $produks->harga }}</td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/produk/{{ $produks->slug }}" class="btn text-bg-primary me-3"><i class="bi bi-eye mb-2"></i></a>
                            <a href="/dashboard/produk/{{ $produks->slug }}/edit" class="btn text-bg-warning me-2"><i class="bi bi-pencil mb-2"></i></a>
                            <form id="hapus-{{ $produks->idproduk }}" action="/dashboard/produk/{{ $produks->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn text-bg-danger border-0 ms-2" onclick="sa(event, '{{ $produks->namaproduk }}', '{{ $produks->idproduk }}')"><i class="bi bi-trash mb-2"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function sa(event, nama, id){
                event.preventDefault();
                Swal.fire({
                icon: 'question',
                title: 'Hapus',
                    text: 'Produk ' + nama +' Aseli?',
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
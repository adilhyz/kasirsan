@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-cart4"></i> Detail Produk</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"> </i> <a href="/dashboard/produk" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Produk </a> <i class="bi bi-chevron-right mt-2"> </i> {{ $produk->namaproduk }}
            </div>
        </div>
        <div class="table-responsive small">
            <a href="/dashboard/produk" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col"><i class="bi-tags"></i> Kategori</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Stok</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td class="justify-content-start text-start">
                            @if ($produk->image)
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="card bg-dark text-white" style="max-width: 150px; max-height: 100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' .$produk->image ) }}" alt="{{ $produk->slug }}" class="img-fluid">
                                            {{-- <div class="card-img-overlay d-block d-flex align-items-end">
                                                <h5 class="card-title text-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">{{ $produk->namaproduk }}</h5>
                                            </div> --}}
                                            <div class="card-img-overlay d-block d-flex align-items-end p-1">
                                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">{{ $produk->namaproduk }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    {{-- <img src="https://source.unsplash.com/250x200?{{ $produk->slug }}" alt="{{ $produk->slug }}" class="img-fluid rounded-2"> --}}
                                    <div class="row justify-content-start">
                                        <div class="col-lg-5">
                                            <div class="card bg-dark text-white">
                                                {{-- <img src="https://source.unsplash.com/50x25?{{ $produk->namaproduk }}" class="card-img" alt="{{ $produk->namaproduk }}"> --}}
                                                <div class="card-img p-1">
                                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">{{ $produk->namaproduk }}</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                            {{-- <p>{{ $produk->namaproduk }}</p> --}}
                        </td>
                        <td class="text-justify text-reset">
                            @if ($produk->kategori)
                                <a href="/dashboard/kategori/{{ $produk->kategori->slug }}" class="badge bg-dark rounded-5" onmouseover="this.style.textDecoration='underline dashed'" onmouseout="this.style.textDecoration='none';">{{ $produk->kategori->namakategori }}</a>
                            @else
                                <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                            @endif
                        </td>
                        <td>Rp. {{ $produk->harga }}</td>
                        <td>{{ $produk->stok }}</td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/produk/{{ $produk->slug }}/edit" class="btn text-bg-warning me-2"><i class="bi bi-pencil mb-2"></i></a>
                            <form id="hapus-{{ $produk->id }}" action="/dashboard/produk/{{ $produk->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn text-bg-danger border-0 ms-2" onclick="sa(event, '{{ $produk->namaproduk }}', '{{ $produk->id }}')""><i class="bi bi-trash mb-2"></i></button>
                            </form>
                        </td>
                    </tr>
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
        {{-- <div class="container">
            <div class="row justify-content-center mb-5">
              <div class="col-md-8">
                <h1 class="mb-3">{{ $produk }}</h1>
        
                <p>By. <a href="/posts?author={{ $produk }}" class="text-decoration-none">{{ $produk }}</a> in <a href="/posts?category={{ $produk }}" class="text-decoration-none">{{ $produk }}</a></p>
        
                <a href="/dashboard/produk" class="d-block mt-3">Back to posts</a>
              </div>
            </div> --}}
        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
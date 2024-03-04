@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-tag"></i> Detail Kategori</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"> </i> <a href="/dashboard/kategori" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Kategori </a> <i class="bi bi-chevron-right mt-2"> </i> {{ $kategori->namakategori }}
            </div>
        </div>
        <div class="d-flex flex-lg-grow justify-content-lg-start">
            
        </div>
        <div class="table-responsive small">
            <a href="/dashboard/kategori" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            @if ($kategori->image)
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card bg-dark text-white" style="max-width: 100%; max-height: 75px; overflow:hidden;">
                            {{-- <div class="card-img-overlay d-block d-flex align-items-end">
                                <h5 class="card-title text-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">{{ $kategori->namakategori }}</h5>
                            </div> --}}
                            <img src="{{ asset('storage/' .$kategori->image ) }}" alt="{{ $kategori->slug }}" class="img-fluid">
                            <div class="card-img-overlay d-block d-flex align-items-end p-1">
                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">
                                        {{ $kategori->namakategori }}
                                        <a href="/dashboard/kategori/{{ $kategori->slug }}/edit" class="text-warning ms-2"><i class="bi bi-pencil mb-2"></i></a>
                                        <form id="hapus-{{ $kategori->idkategori }}" action="/dashboard/kategori/{{ $kategori->slug }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="text-danger bg-transparent border-0 ms-2" onclick="sa(event, '{{ $kategori->namakategori }}', '{{ $kategori->idkategori }}')"><i class="bi bi-trash mb-2"></i></button>
                                        </form>
                                    </h5>
                            </div>
                        </div>
                    </div>
                </div>
                @else
                    {{-- <img src="https://source.unsplash.com/250x200?{{ $kategori->slug }}" alt="{{ $kategori->slug }}" class="img-fluid rounded-2"> --}}
                    <div class="row justify-content-start">
                        <div class="col-lg-12">
                            <div class="card bg-dark text-white">
                                {{-- <img src="https://source.unsplash.com/50x25?{{ $kategori->namakategori }}" class="card-img" alt="{{ $kategori->namakategori }}"> --}}
                                <div class="card-img p-1">
                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-5 border-5 mt-2" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">
                                        {{ $kategori->namakategori }}
                                        <a href="/dashboard/kategori/{{ $kategori->slug }}/edit" class="text-warning ms-2"><i class="bi bi-pencil mb-2"></i></a>
                                        <form id="hapus-{{ $kategori->idkategori }}" action="/dashboard/kategori/{{ $kategori->slug }}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="text-danger bg-transparent border-0 ms-2" onclick="sa(event, '{{ $kategori->namakategori }}', '{{ $kategori->idkategori }}')"><i class="bi bi-trash mb-2"></i></button>
                                        </form>
                                    </h5>
                                </div>
                            </div>
                        </div>
                    </div>
            @endif
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Produk</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produkambil as $katpro)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        {{-- <td>{{ $katpro->idkategori }}</td> --}}
                        <td>
                            {{-- {{ $katpro->namaproduk }} --}}
                            @if ($katpro->image)
                                <div class="row justify-content-start">
                                    <div class="col-lg-auto d-flex flex-nowrap justify-content-start my-3">
                                        <div class="card bg-dark text-white" style="max-width: 140px; max-height: 100px; overflow:hidden;">
                                            <img src="{{ asset('storage/' .$katpro->image ) }}" alt="{{ $katpro->slug }}" class="img-fluid">
                                            {{-- <div class="card-img-overlay d-block d-flex align-items-end">
                                                <h5 class="card-title text-center flex-fill p-2 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">{{ $katpro->namaproduk }}</h5>
                                            </div> --}}
                                            <div class="card-img-overlay d-block align-items-end p-1">
                                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-3 border-5 mb-3" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">
                                                        {{-- {{ $katpro->namaproduk }} --}}
                                                        @if ($katpro->kategori)
                                                            <a href="/dashboard/produk/{{ $katpro->slug }}" onmouseover="this.style.textDecoration='underline dashed'" onmouseout="this.style.textDecoration='none';" class="text-light">{{ $katpro->namaproduk }}</a>
                                                        @else
                                                            <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                                                        @endif
                                                    </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @else
                                    {{-- <img src="https://source.unsplash.com/250x200?{{ $produk->slug }}" alt="{{ $produk->slug }}" class="img-fluid rounded-2"> --}}
                                    <div class="row justify-content-start">
                                        <div class="col-lg-5 d-flex flex-nowrap justify-content-start my-3">
                                            <div class="card bg-dark text-white">
                                                {{-- <img src="https://source.unsplash.com/50x25?{{ $produk->namaproduk }}" class="card-img" alt="{{ $produk->namaproduk }}"> --}}
                                                <div class="card-img p-1">
                                                    <h5 class="card-title text-light text-center align-content-center flex-fill p-2 fs-3 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">
                                                        {{-- {{ $katpro->namaproduk }} --}}
                                                        @if ($katpro->namaproduk)
                                                            <a href="/dashboard/produk/{{ $katpro->slug }}" onmouseover="this.style.textDecoration='underline dashed'" onmouseout="this.style.textDecoration='none';" class="text-light">{{ $katpro->namaproduk }}</a>
                                                        @else
                                                            <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                                                        @endif
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            @endif
                            {{-- <p>{{ $katpro->namaproduk }}</p> --}}
                        </td>
                        <td>
                            <div class="row justify-content-center">
                                <div class="col-lg-auto d-flex flex-nowrap justify-content-center my-2">
                                    <a href="/dashboard/produk/{{ $katpro->slug }}/edit" class="btn text-bg-warning my-2"><i class="bi bi-pencil mt-1"></i></a>
                                </div>
                                <div class="col-lg-auto d-flex flex-nowrap justify-content-center my-2">
                                    <form id="hapus-{{ $katpro->idproduk }}" action="/dashboard/produk/{{ $katpro->slug }}" method="post" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button class="btn text-bg-danger border-0 my-2" onclick="sa(event, '{{ $katpro->namaproduk }}', '{{ $katpro->idproduk }}')"><i class="bi bi-trash mt-1"></i></button>
                                    </form>
                                {{-- <a href="/dashboard/produk/{{ $katpro->slug }}" class="btn text-bg-primary me-3"><i class="bi bi-eye mt-1"></i></a> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                {{-- @dd($produkambil) --}}
                </tbody>
            </table>
        </div>
        <script>
            function sa(event, nama, id){
                event.preventDefault();
                Swal.fire({
                icon: 'question',
                title: 'Hapus',
                    text: 'Kategori ' + nama +' Yakin?',
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yoi",
                    cancelButtonText: "Tidak"
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
                <h1 class="mb-3">{{ $kategori }}</h1>
        
                <p>By. <a href="/posts?author={{ $kategori }}" class="text-decoration-none">{{ $kategori }}</a> in <a href="/posts?category={{ $kategori }}" class="text-decoration-none">{{ $kategori }}</a></p>
        
                <a href="/dashboard/kategori" class="d-block mt-3">Back to posts</a>
              </div>
            </div> --}}
        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
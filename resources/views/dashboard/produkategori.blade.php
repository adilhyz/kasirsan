@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-tags-fill"></i> Data Kategori</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Kategori
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            @if (auth()->user()->level === 'Admin')
            <a href="/dashboard/kategori/create" class="btn btn-success mb-3">Tambah Kategori</a>
            {{-- @else
            <button onclick="a()" class="btn btn-success mb-3">Tambah kategori</button>
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
                        <th scope="col">Nama Kategori</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($kategori as $kategoris)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td class="text-justify text-reset">
                            {{-- {{ $kategoris->namakategori }} --}}
                            @if ($kategoris)
                                <a href="/dashboard/kategori/{{ $kategoris->slug }}" class="badge bg-dark rounded-5" onmouseover="this.style.textDecoration='underline dashed'" onmouseout="this.style.textDecoration='none';">{{ $kategoris->namakategori }}</a>
                            @else
                                <span onmouseover="this.style.textDecoration='line-through'" onmouseout="this.style.textDecoration='none'">Tidak Ada</span>
                            @endif
                        </td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/kategori/{{ $kategoris->slug }}" class="btn text-bg-primary me-3"><i class="bi bi-eye mb-2"></i></a>
                            <a href="/dashboard/kategori/{{ $kategoris->slug }}/edit" class="btn text-bg-warning me-2"><i class="bi bi-pencil mb-2"></i></a>
                            <form id="hapus-{{ $kategoris->idkategori }}" action="/dashboard/kategori/{{ $kategoris->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn text-bg-danger border-0 ms-2" onclick="sa(event, '{{ $kategoris->namakategori }}', '{{ $kategoris->idkategori }}')"><i class="bi bi-trash mb-2"></i></button>
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
                    text: 'kategori ' + nama +' Aseli?',
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
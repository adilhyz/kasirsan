@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-person-vcard"></i> Detail Pelanggan</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"> </i> <a href="/dashboard/pelanggan" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Pelanggan </a> <i class="bi bi-chevron-right mt-2"> </i> {{ $pelanggan->namapelanggan }}
            </div>
        </div>
        <div class="table-responsive small">
            <a href="/dashboard/pelanggan" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama pelanggan</th>
                        <th scope="col">Member</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nomor Telepon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1.</td>
                        <td>
                            {{ $pelanggan->namapelanggan }}
                        </td>
                        <td>@if($pelanggan->ismember == '0')
                            Bukan Member
                        @else
                            {{ $pelanggan->slug }} <i class="bi-star mb-1 d-inline-block align-middle"></i>
                        @endif</td>
                        <td>Rp. {{ $pelanggan->alamat }}</td>
                        <td>{{ $pelanggan->nomortelepon }}</td>
                        <td class="d-flex flex-lg-col justify-content-lg-start">
                            <a href="/dashboard/pelanggan/{{ $pelanggan->slug }}/edit" class="btn btn-warning me-2"><i class="bi bi-pencil mt-1"></i></a>
                            <form id="hapus-{{ $pelanggan->id }}" action="/dashboard/pelanggan/{{ $pelanggan->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 ms-2" onclick="sa(event, '{{ $pelanggan->namapelanggan }}', '{{ $pelanggan->id }}')"><i class="bi bi-trash mt-1"></i></button>
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
                    text: 'pelanggan ' + nama +' Aseli?',
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
                <h1 class="mb-3">{{ $pelanggan }}</h1>
        
                <p>By. <a href="/posts?author={{ $pelanggan }}" class="text-decoration-none">{{ $pelanggan }}</a> in <a href="/posts?category={{ $pelanggan }}" class="text-decoration-none">{{ $pelanggan }}</a></p>
        
                <a href="/dashboard/pelanggan" class="d-block mt-3">Back to posts</a>
              </div>
            </div> --}}
        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-person-lines-fill"></i> Data Pelanggan</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Pelanggan
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
                    <a href="/dashboard/pelanggan/create" class="btn btn-success mb-3">Tambah Pelanggan</a>
                </div>
                <div class="col-md-auto col-6">
                    {{-- <button href="/dashboard/pelanggan/create" class="btn btn-info text-light-emphasis mb-3" oncliTambah Otomatisck="">
                        <i class="bi bi-rocket-takeoff"></i> Tambah Otomatis
                    </button> --}}
                    {{-- <form action="/dashboard/produk/{{ $pelanggan->slug }}" method="post" class="d-inline">
                        @csrf
                        <button class="btn btn-info text-light-emphasis mb-3" onclick="return confirm('aseli?')"><i class="bi bi-rocket-takeoff"></i> Tambah Otomatis</button>
                    </form> --}}
                </div>
            </div>
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
                    @foreach ($pelanggan as $pelanggans)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td class="text-justify text-reset">{{ $pelanggans->namapelanggan }}</td>
                        {{-- <td>{{ $pelanggans->ismember == '0' ? 'Bukan Member' : ($pelanggans->ismember == '1' ? 'Member' : '') }}</td> --}}
                        {{-- <td> {{ $pelanggans->ismember == '0' ? 'Bukan Member' : html_entity_decode('<i class="bi-star"></i>').($pelanggans->slug) }}</td> --}}
                        <td>@if($pelanggans->ismember == '0')
                            Bukan Member
                        @else
                            {{ $pelanggans->slug }} <i class="bi-star mb-1 d-inline-block align-middle"></i>
                        @endif</td>
                        <td>{{ $pelanggans->alamat }}</td>
                        <td>{{ $pelanggans->nomortelepon }}</td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/pelanggan/{{ $pelanggans->slug }}" class="btn btn-primary me-3"><i class="bi bi-eye mt-1"></i></a>
                            <a href="/dashboard/pelanggan/{{ $pelanggans->slug }}/edit" class="btn btn-warning me-2"><i class="bi bi-pencil mt-1"></i></a>
                            <form id="hapus-{{ $pelanggans->idpelanggan }}" action="/dashboard/pelanggan/{{ $pelanggans->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger border-0 ms-2" onclick="sa(event, '{{ $pelanggans->namapelanggan }}', '{{ $pelanggans->idpelanggan }}')"><i class="bi bi-trash mt-1"></i></button>
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
{{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
@endsection
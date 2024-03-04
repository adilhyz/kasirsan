@extends('dashboard.layut.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data Penjualan, {{ Auth::user()->level }} {{ Auth::user()->username }}</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            <div class="row justify-content-md-between d-flex">
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama penjualan</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Tangal</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- <div class="mb-3">
                        <label for="slug" class="form-label">Slug</label>
                        <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('slug') is-invalid @enderror" id="slug" name="slug">
                        {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --
                    </div> --}}
                    @foreach ($penjualan as $penjualans)
                    <tr>
                        <td>{{ $loop->iteration }}.</td>
                        <td class="text-justify text-reset">{{ $penjualans->idpelanggan }}</td>
                        <td>Rp. {{ $penjualans->totalharga }}</td>
                        <td>{{ $penjualans->tanggalpenjualan }}</td>
                        {{-- <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/penjualan/{{ $penjualans->slug }}" class="badge bg-primary me-3"><i class="bi bi-eye mt-1"></i></a>
                            <a href="/dashboard/penjualan/{{ $penjualans->slug }}/edit" class="badge bg-warning me-2"><i class="bi bi-pencil mt-1"></i></a>
                            <form id="hapus-{{ $penjualans->idpenjualan }}" action="/dashboard/penjualan/{{ $penjualans->slug }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0 ms-2" onclick="sa(event, '{{ $penjualans->namapenjualan }}', '{{ $penjualans->idpenjualan }}')"><i class="bi bi-trash mt-1"></i></button>
                            </form>
                        </td> --}}
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
                    text: 'penjualan ' + nama +' Aseli?',
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
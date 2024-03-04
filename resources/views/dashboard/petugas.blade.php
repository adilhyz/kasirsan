@extends('dashboard.layut.master')

@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h3"><i class="bi-wrench-adjustable-circle-fill"></i> Data Petugas</h1>
            <div class="mb-lg mb-2 mb-md-2">
                <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Petugas
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            <a href="/dashboard/user/create" class="btn btn-success mb-3">Tambah Petugas</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Username</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Tempat Lahir</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Level</th>
                        <th scope="col">Password</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($user as $users)
                    @if ($users->level == 'Petugas')
                    <tr>
                        <td>{{ $loop->index }}.</td>
                        <td class="text-justify text-reset">{{ $users->namalengkap }}</td>
                        <td>{{ $users->username }}</<td>{{ $users->stok }}</td>
                        <td>{{ $users->jk }}</td>
                        <td>{{ $users->tempatlahir }}</td>
                        <td>{{ $users->tanggallahir }}</td>
                        <td>{{ $users->level }}</td>
                        <td><i class="bi-lock"></i> {{ substr($users->passwordbiasa, 0, 19) }}</td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/user/{{ $users->username }}" class="btn text-bg-primary me-3"><i class="bi bi-eye mb-2"></i></a>
                            <a href="/dashboard/user/{{ $users->username }}/edit" class="btn text-bg-warning me-2"><i class="bi bi-pencil mb-2"></i></a>
                            <form id="hapus-{{ $users->iduser }}" action="/dashboard/user/{{ $users->username }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn text-bg-danger border-0 ms-2" onclick="sa(event, '{{ $users->username }}', '{{ $users->username }}')"><i class="bi bi-trash mb-2"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endif
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
                    text: 'user ' + nama +' Aseli?',
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
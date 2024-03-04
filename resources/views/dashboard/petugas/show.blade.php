@extends('dashboard.layut.master')

@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Data User, {{ Auth::user()->level }} {{ Auth::user()->username }}</h1>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-responsive small">
            <a href="/dashboard/user/create" class="btn btn-success mb-3">Tambah user</a>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama User</th>
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
                    <tr>
                        <td>1.</td>
                        <td class="text-justify text-reset">{{ $user->namalengkap }}</td>
                        <td>{{ $user->username }}</<td>{{ $user->stok }}</td>
                        <td>{{ $user->jk }}</td>
                        <td>{{ $user->tempatlahir }}</td>
                        <td>{{ $user->tanggallahir }}</td>
                        <td>{{ $user->level }}</td>
                        <td><i class="bi-lock"></i> {{ $user->passwordbiasa }}</td>
                        <td class="d-flex flex-lg-grow justify-content-lg-start">
                            <a href="/dashboard/user/{{ $user->username }}" class="btn text-bg-primary me-3"><i class="bi bi-eye mb-2"></i></a>
                            <a href="/dashboard/user/{{ $user->username }}/edit" class="btn text-bg-warning me-2"><i class="bi bi-pencil mb-2"></i></a>
                            <form id="hapus-{{ $user->iduser }}" action="/dashboard/user/{{ $user->username }}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="btn text-bg-danger border-0 ms-2" onclick="sa(event, '{{ $user->username }}', '{{ $user->username }}')"><i class="bi bi-trash mb-2"></i></button>
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
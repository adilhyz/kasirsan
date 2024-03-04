{{-- @if (Request::is('dashboard/profile'))
    @extends('dashboard.layut.master')
@else
    @extends('layut.main')
@endif --}}

@extends(Request::is('dashboard/profile') ? 'dashboard.layut.master' : 'layut.main')

@section('container')
<div class="@if (Request::is('dashboard/profile')) d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center mb-3 border-bottom pt-3 pb-2 @else row align-items-md-stretch @endif">
            <h3 class="@if (Request::is('dashboard/profile')) @else align-items-md-scretch justify-content-center text-bg-dark shadow-sm rounded-2 text-center p-3 mb-3 fs-5 @endif"><i class="bi-person"></i> Profile {{ $userambil->level }}</h3>
        </div>
        <div class="row text-center">
            <div class="col-lg-4 p-2 rounded-3 shadow-lg">
                <p class="mt-3">
                    @if (Request::is('profile'))
                @if (session()->has('error'))
                    <script>
                        Swal.fire({
                            title: "Maaf 🙏",
                            text: "{{ session('error') }}",
                            icon: "error",
                            confirmButtonColor: "#3085d6",
                        });
                    </script>
                    @endif
                    @if (session()->has('update'))
                    <script>
                        Swal.fire({
                            title: "Berhasil",
                            text: "{{ session('update') }}",
                            icon: "success",
                            confirmButtonColor: "#3085d6",
                        });
                    </script>
                    @endif
                    @else
                    @if (session()->has('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                    @endif
                    @if (session()->has('update'))
                        <div class="alert alert-success" role="alert">
                            {{ session('update') }}
                        </div>
                    @endif
                @endif
                    <img src="{{ auth()->user()->level === 'Admin' ? '/img/saitama.jpeg' : '/img/user.jpg' }}" class="img-fluid justify-content-center border border-warning border-3 rounded-circle" alt="/img/kasira.png" width="100">
                    <p class="h6">{{ $userambil->namalengkap }}</p>
                    <p class="h6 text-muted">{{ '('.$userambil->username.')' }}</p>
                    <hr class="border @if (Request::is('dashboard/profile')) border-info @else border-danger @endif rounded-5 opacity-50">
                    </table>
                    <table class="table table-transparent small">
                        <tbody>
                            <tr>
                                <td><i class="bi-lamp"></i>Tempat Tanggal Lahir</td>
                                <td>{{ $userambil->tempatlahir . ', ' . $userambil->tanggallahir }}</td>
                            </tr>
                            <tr>
                                <td><i class="bi-gender-neuter"></i>Jenis Kelamin</td>
                                <td><span class="text-uppercase">{{ $userambil->jk }}</span></td>
                            </tr>
                            <tr>
                                <td><i class="bi-lock"></i>Password</td>
                                <td>{{ $userambil->passwordbiasa }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <p class="h6"> </p>
                </p>
            </div>
            <div class="col-lg-8 p-5 rounded-3 shadow-lg">
                <form action="@if (Request::is('dashboard/profile')) /dashboard/profile @else /profile @endif" method="post">
                    @csrf
                        <label for="namalengkap" class="form-label d-block d-flex fw-medium">Nama Lengkap:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namalengkap') is-invalid @enderror" type="text" name="namalengkap" placeholder="Nama Lengkap" value="{{ old('namalengkap', $userambil->namalengkap) }}">
                        <label for="username" class="form-label d-block d-flex fw-medium">Username:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" value="{{ old('username', $userambil->username) }}">
                        <label for="passwordbiasa" class="form-label d-block d-flex fw-medium">Password:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('passwordbiasa') is-invalid @enderror" type="password" name="passwordbiasa" placeholder="Password" value="{{ old('passwordbiasa', $userambil->passwordbiasa) }}">
                            <label for="jk" class="form-label d-block d-flex fw-medium">Jenis Kelamin:</label>
                            <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('jk') is-invalid @enderror" type="text" name="jk" placeholder="Jenis Kelamin" value="{{ old('jk', $userambil->jk) }}">
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="tempatlahir" class="form-label d-block d-flex fw-medium">Tempat Lahir:</label>
                                    <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('tempatlahir') is-invalid @enderror" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="{{ old('tempatlahir', $userambil->tempatlahir) }}">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggallahir" class="form-label d-block d-flex fw-medium">Tanggal Lahir:</label>
                                    <input class="form-control d-block d-flex rounded border border-dark-subtle p-1.5 rounded-5 @error('tanggallahir') is-invalid @enderror" type="date" name="tanggallahir" value="{{ old('tangganlahir', $userambil->tanggallahir) }}">
                                </div>
                            </div>
                            <button class="btn btn-light m-3 rounded-4 border border-secondary fw-light" type="submit">Simpan</button>
                        </div>
                </form>
            </div>
            {{-- <div class="col-lg row g-auto">
                <form class="row g-3">
                    <div class="col-auto">
                    <label for="staticEmail2" class="visually-hidden">Email</label>
                    <input type="text" readonly class="form-control-plaintext" id="staticEmail2" value="email@example.com">
                    </div>
                    <div class="col-auto">
                    <label for="inputPassword2" class="visually-hidden">Password</label>
                    <input type="password" class="form-control" id="inputPassword2" placeholder="Password">
                    </div>
                    <div class="col-auto">
                    <button type="submit" class="btn btn-primary mb-3">Confirm identity</button>
                    </div>
                </form>
            </div> --}}
        </div>
@endsection
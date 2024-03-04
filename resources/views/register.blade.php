@extends('layut.main')

@section('container')

<h3 class="row align-items-md-scretch justify-content-center text-bg-dark shadow-sm rounded-2 text-center p-3 mb-3 fs-5">{{ $judul }} Owner</h3>
<div class="row align-items-md-stretch justify-content-center bg-info-subtle rounded">
        <div class="row align-items-md-stretch justify-content-center bg-info-subtle rounded mt-4">
            <div class="col-md-5">
                <form action="{{ route('register') }}" method="post">
                    @csrf
                        {{-- <label for="floatingSelect">Works with selects</label> --}}
                        <label for="namalengkap" class="form-label d-block d-flex fw-medium">Nama Lengkap:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namalengkap') is-invalid @enderror" type="text" name="namalengkap" placeholder="Nama Lengkap" value="{{ old('namalengkap') }}" required autofocus>
                        {{-- @error('namalengkap')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                        <label for="username" class="form-label d-block d-flex fw-medium">Username:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('username') is-invalid @enderror" type="text" name="username" placeholder="Username" value="{{ old('username') }}" required>
                        {{-- @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
                        <label for="passwordbiasa" class="form-label d-block d-flex fw-medium">Password:</label>
                        <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('passwordbiasa') is-invalid @enderror" type="password" name="passwordbiasa" placeholder="Password" value="{{ old('passwordbiasa') }}" required>
                        {{-- @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror --}}
            </div>
                        <div class="col-md-5">
                            <label for="jk" class="form-label d-block d-flex fw-medium">Jenis Kelamin:</label>
                            <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('jk') is-invalid @enderror" type="text" name="jk" placeholder="Jenis Kelamin" value="{{ old('jk') }}" required>
                            {{-- @error('jk')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror --}}
                            <div class="row g-2">
                                <div class="col-md-6">
                                    <label for="tempatlahir" class="form-label d-block d-flex fw-medium">Tempat Lahir:</label>
                                    <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('tempatlahir') is-invalid @enderror" type="text" name="tempatlahir" placeholder="Tempat Lahir" value="{{ old('tempatlahir') }}" required>
                                    {{-- @error('tempatlahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggallahir" class="form-label d-block d-flex fw-medium">Tanggal Lahir:</label>
                                    <input class="form-control d-block d-flex rounded border border-dark-subtle p-1.5 rounded-5 @error('tanggallahir') is-invalid @enderror" type="date" name="tanggallahir" required>
                                    {{-- @error('tanggallahir')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                            </div>
                            <h6 class="text-start mt-2">Level:</h6>
                            <select class="form-select border border-dark-subtle rounded-5" aria-label="Floating label select example" name="level" required>
                                {{-- @foreach ($level as $levelcuy)
                                @if (old('level') == $levelcuy)
                                <option value="{{ $levelcuy }}" selected>{{ $levelcuy }}</option>
                                @else
                                <option value="{{ $levelcuy }}">{{ $levelcuy }}</option>
                                @endif
                                @endforeach --}}
                                @foreach ($level as $levelcuy)
                                    <option value="{{ $levelcuy }}" {{ old('level') == $levelcuy ? 'selected' : '' }}>{{ $levelcuy }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5">
                            <button class="btn btn-light m-3 rounded-4 border border-secondary fw-light" type="submit">Daftar</button>
                        </div>
                </form>
                {{-- <small class="d-block fw-light mb-3">Sudah Ada akun? <a href="/login" class="text-decoration-none">Login Sekarang!</a></small> --}}
        </div>
</div>
@if(session('success'))
@livewireStyles

{{-- <dropdown-link href="logout"
    onclick="event.preventDefault(); document.getElementById('logout').submit(); clearLocalStorage();">
    {{ __('logout') }}
</dropdown-link> --}}

<form id="logout" method="POST" action="logout">
    @csrf
</form>
{{-- @livewireScripts --}}
    {{-- <script>
        Swal.fire({
            title: 'Registrasi Berhasil',
            text: "{{ session('success-register') }}",
            icon: 'success',
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: 'Ya',
            cancelButtonText: 'Gk, balik aja!'
        }).then((result) =>{
            if(result.isConfirmed) {
                // asem
                // window.location.href = "{{ route('login') }}";
                document.getElementById('logout').submit();
            } else {
            }
        });
    </script> --}}
@endif

@endsection
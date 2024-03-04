@extends('layut.main')

@section('container')

{{-- <form action="{{ route('login') }}" method="post">
    @csrf
    <label for="username">Username:</label>
    <input type="text" name="username" required>

    <label for="password">Password:</label>
    <input type="password" name="password" required>

    <button type="submit">Login</button>
</form>
    @if(session('error'))
    <script>
        alert("{{ session('error') }}");
    </script>
@endif --}}
@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Waduh...',
            text: "{{ session('error') }}",
        });
    </script>
@endif

<h3 class="row align-items-md-scretch justify-content-center text-bg-dark shadow-sm rounded-2 text-center p-3 mb-3 fs-5">{{ $judul }} Owner</h3>
<div class="row align-items-md-stretch justify-content-center bg-info-subtle rounded">
    <div class="col-md-5 p-2">
        <form action="{{ route('login') }}" method="post">
            @csrf
            <div class="form">
                <h6 class="text-start mt-3">Masuk Sebagai:</h6>
                <select class="form-select border border-dark-subtle rounded-5" aria-label="Floating label select example" name="level">
                    @foreach ($level as $levelcuy)
                        <option value="{{ $levelcuy }}" {{ old('level') == $levelcuy ? 'selected' : '' }}>{{ $levelcuy }}</option>
                    @endforeach
                </select>
            </div>
            <label for="username" class="form-label d-block d-flex fw-medium">Username:</label>
            <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5" type="text" name="username" placeholder="Masukkan Username" value="{{ old('username') }}" required autofocus>
            <label for="password" class="form-label d-block d-flex fw-medium">Password:</label>
            <input class="form-control rounded border border-dark-subtle p-1.5 rounded-5" type="password" name="password" placeholder="Password" required value="{{ old('password') }}">
            <br>
            <button class="btn btn-light gap-3 mb-3 rounded-4 border border-secondary fw-light" type="submit">Masuk</button>
        </form>
        {{-- <small class="d-block fw-light mb-2">Belum registrasi? <a href="/register">Registrasi Sekarang!</a></small> --}}
    </div>
</div>

@endsection
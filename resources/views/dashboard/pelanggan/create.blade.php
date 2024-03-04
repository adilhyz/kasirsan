@extends('dashboard.layut.master')
@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><i class="bi-person-fill-add"></i> Tambah pelanggan</h1>
    <div class="mb-lg mb-2 mb-md-2">
        <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Pelanggan
    </div>
</div>

<a href="/dashboard/pelanggan" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="col-lg-8 bg-gradient bg-light p-5">
    <form method="post" action="/dashboard/pelanggan">
        @csrf
        <div class="my-3">
            <label for="namapelanggan" class="form-label">Nama Pelanggan</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namapelanggan') is-invalid @enderror" id="namapelanggan" name="namapelanggan" value="{{ old('namapelanggan') }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <span class="text-start mb-2">Role</span>
        <select class="form-select mt-2 border border-dark-subtle rounded-5" aria-label="Floating label select example" name="ismember">
            @foreach ($ismember as $ismembercuy)
                <option value="{{ $ismembercuy }}" {{ old('pelanggan') == $ismembercuy ? 'selected' : '' }}>
                    {{ $ismembercuy == '0' ? 'Bukan Member' : 'Member' }}
                </option>
            @endforeach
        </select>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat') }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
            <label for="nomortelepon" class="form-label">Nomor Telepon</label>
            <input type="tel" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('nomortelepon') is-invalid @enderror" id="nomortelepon" name="nomortelepon" value="{{ old('nomortelepon') }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <button type="submit" class="btn btn-primary my-3 fw-light">Tambah pelanggan</button>
    </form>
</div>
@endsection
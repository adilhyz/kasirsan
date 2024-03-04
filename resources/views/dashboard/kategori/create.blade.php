@extends('dashboard.layut.master')
@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><i class="bi-cart-plus"></i> Tambah Kategori</h1>
    <div class="mb-lg mb-2 mb-md-2">
        <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> kategori
    </div>
</div>

<a href="/dashboard/kategori" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="col-lg-8 bg-gradient bg-light p-5">
    <form method="post" action="/dashboard/kategori" enctype="multipart/form-data">
        @csrf
        <div class="my-3">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namakategori') is-invalid @enderror" id="namakategori" name="namakategori" value="{{ old('namakategori') }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        {{-- <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('slug') is-invalid @enderror" step="10" id="slug" name="slug">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --
        </div> --}}
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Kategori</label>
            <img class="lihat-gambar img-fluid mb-3 col-sm-5">
            <input class="form-control border border-dark-subtle rounded-5 @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="lihatGambar()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3 fw-light">Tambah Kategori</button>
    </form>
</div>

<script>
    function lihatGambar(){
        const image = document.querySelector('#image');
        const lihatGambar = document.querySelector('.lihat-gambar');

        lihatGambar.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            lihatGambar.src = oFREvent.target.result;
        }
    }
</script>
@endsection
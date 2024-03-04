@extends('dashboard.layut.master')
@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><i class="bi-cart-plus"></i> Edit Kategori</h1>
    <div class="mb-lg mb-2 mb-md-2">
        <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> kategori
    </div>
</div>

<a href="/dashboard/kategori" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="col-lg-8 bg-gradient bg-light p-5">
    <form method="post" action="/dashboard/kategori/{{ $kategori->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="my-3">
            <label for="namakategori" class="form-label">Nama Kategori</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namakategori') is-invalid @enderror" id="namakategori" name="namakategori" value="{{ old('namakategori', $kategori->namakategori) }}">
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Kategori</label>
            @if ($kategori->image)
            <input type="hidden" value="{{ $kategori->image }}">
            <img src="{{ asset('storage/'. $kategori->image) }}" class="lihat-gambar img-fluid mb-3 col-sm-5 d-block">
            @else
                <div class="card-img p-1">
                    <h5 class="col-sm-5 no-gambar text-muted bg-transparent card-title text-start text-light align-content-center flex-fill p-5 fs-5 border-5" style="background-color: rgba(0,0,0,0.7);border: 5px rgba(5,5,5,0.1) solid;border-radius: 50px">No gambar cuy :v</h5>
                    <img class="lihat-gambar img-fluid mb-3 col-sm-5">
                </div>
            @endif
            <input class="form-control border border-dark-subtle rounded-5 @error('image') is-invalid @enderror" type="file" id="image" name="image" onchange="lihatGambar()">
            @error('image')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary my-3 fw-light">Edit Kategori</button>
    </form>
</div>

<script>
    function lihatGambar(){
        const image = document.querySelector('#image');
        const lihatGambar = document.querySelector('.lihat-gambar');
        const noGambar = document.querySelector('.no-gambar')

        if (image.files && image.files[0]) {
            const oFReader = new FileReader();

            oFReader.onload = function(oFREvent) {
                lihatGambar.src = oFREvent.target.result;
                lihatGambar.style.display = 'block';
                noGambar.style.display = 'none';
            };

            oFReader.readAsDataURL(image.files[0]);
        }

        /*lihatGambar.style.display = 'block';
        noGambar.style.display = 'none';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            lihatGambar.src = oFREvent.target.result;
        }*/
    }
</script>
@endsection

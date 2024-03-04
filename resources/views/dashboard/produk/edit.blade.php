@extends('dashboard.layut.master')
@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><i class="bi-cart-dash-fill"></i> Edit Produk</h1>
    <div class="mb-lg mb-2 mb-md-2">
        <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"> </i> <a href="/dashboard/produk" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Produk </a> <i class="bi bi-chevron-right mt-2"> </i> {{ $produk->namaproduk }}
    </div>
</div>

<a href="/dashboard/produk" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="col-lg-8 bg-gradient bg-light p-5">
    <form method="post" action="/dashboard/produk/{{ $produk->slug }}" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="my-3">
            <label for="namaproduk" class="form-label">Nama Produk</label>
            <input type="text" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('namaproduk') is-invalid @enderror" id="namaproduk" name="namaproduk" value="{{ old('namaproduk', $produk->namaproduk) }}" required autofocus>
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="my-3">
            <span class="text-start mb-2">Kategori Produk</span>
            {{-- {{ dd($produk->pluck('idproduk')) }} --}}
            <select class="form-select mt-2 border border-dark-subtle rounded-5" aria-label="Floating label select example" name="idkategori">
                @foreach ($kategoriambil as $kategoricuy)
                    <option value="{{ $kategoricuy->idkategori }}" {{ old('kategori', $kategoricuy->idkategori) == $kategoricuy->idkategori ? 'selected' : '' }}>{{ $kategoricuy->namakategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <div class="input-group mb-3 rounded border border-dark-subtle p-1.5 rounded-5">
                <span style="border-top-left-radius: 100px; border-bottom-left-radius: 100px;" class="input-group-text bg-secondary-subtle border-0">Rp.</span>
                <input type="number" style="border-top-right-radius: 100px;border-bottom-right-radius: 100px;" class="form-control border-0 @error('harga') is-invalid @enderror" min="0" step="500" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" {{ Request::is(Auth::user()->distinct()->get(['level'])->pluck('level')==='Petugas') ? 'disabled' : '' }}>
            </div>
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="number" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('stok') is-invalid @enderror" min="0" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            @if ($produk->image)
            <input type="hidden" value="{{ $produk->image }}">
            <img src="{{ asset('storage/'. $produk->image) }}" class="lihat-gambar img-fluid mb-3 col-sm-5 d-block">
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
        <button type="submit" class="btn btn-primary my-3 fw-light">Update Produk</button>
    </form>
</div>

<script>
    function lihatGambar(){
        const image = document.querySelector('#image');
        const liatGambar = document.querySelector('.lihat-gambar');
        const noGambar = document.querySelector('.no-gambar')

        if (image.files && image.files[0]) {
            const oFReader = new FileReader();

            oFReader.onload = function(oFREvent) {
                liatGambar.src = oFREvent.target.result;
                liatGambar.style.display = 'block';
                noGambar.style.display = 'none';
            };

            oFReader.readAsDataURL(image.files[0]);
        }
        /*liatGambar.style.display = 'block';
        noGambar.style.display = 'none';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            liatGambar.src = oFREvent.target.result;
        }*/
    }
</script>
@endsection
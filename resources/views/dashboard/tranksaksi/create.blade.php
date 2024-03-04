@extends('dashboard.layut.master')
@section('container')
<div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3"><i class="bi-border-style"></i> Tambah Tranksaksi</h1>
    <div class="mb-lg mb-2 mb-md-2">
        <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a> <i class="bi bi-chevron-right mt-2"></i> <a href="/dashboard" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Dashboard </a> <i class="bi bi-chevron-right mt-2"></i> Pelanggan
    </div>
</div>
@if (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
@endif
@if (session('errornol'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Yang bener aaja...',
            text: "{{ session('errornol') }}",
        });
    </script>
@endif
@if (session('errorstok'))
    <script>
        Swal.fire({
            icon: 'info',
            title: "{{ session('errorstok') }}",
            text: "Sorry yeee...",
        });
    </script>
@endif
{{-- @if(session('error'))
@endif --}}

<a href="/dashboard/tranksaksi" class="btn btn-success mb-3"><i class="bi bi-arrow-left"></i> Kembali</a>
<div class="col-lg-8 bg-gradient bg-light p-5">
    <form method="post" action="/dashboard/tranksaksi">
        @csrf
        <div class="my-3">
            <span class="text-start mb-2">Produk</span>
            <select class="form-select mt-2 border border-dark-subtle rounded-5" aria-label="Floating label select example" name="idproduk">
                @foreach ($produkambil as $produkcuy)
                    <option value="{{ $produkcuy->idproduk }}" {{ old('produk') == $produkcuy->idproduk ? 'selected' : '' }}>{{ $produkcuy->namaproduk }}</option>
                @endforeach
            </select>
            {{-- <div class="dropdown">
                <input class="form-select mt-2 rounded border border-dark-subtle rounded-5" type="search" placeholder="Cari" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                <ul class="form-select dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li>
                    @foreach ($produkambil as $produkcuy)
                        <li><a class="dropdown-item" href="#" data-value="{{ $produkcuy->idproduk }}">{{ $produkcuy->namaproduk }}</a></li>
                    @endforeach
                </ul>
                <input type="hidden" name="idproduk" id="selected-product">
            </div> --}}
            
            {{-- <script>
                document.querySelector('#dropdownMenuButton').addEventListener('input', function() {
                    let searchValue = this.value.trim(); // Mendapatkan nilai input dan menghapus spasi di awal dan akhir

                    // Lakukan pencarian jika panjang input lebih dari 2 karakter
                    if (searchValue.length > 2) {
                        let searchResults = document.getElementById('searchResults');
                        searchResults.innerHTML = ''; // Kosongkan hasil pencarian sebelumnya

                        // Lakukan pencarian di dalam daftar produk
                        let dropdownItems = document.querySelectorAll('.dropdown-item');
                        dropdownItems.forEach(item => {
                            let productId = item.getAttribute('data-value'); // Ambil nilai idproduk dari atribut data-value
                            if (productId.includes(searchValue)) {
                                let clonedItem = item.cloneNode(true); // Klon item yang cocok
                                searchResults.appendChild(clonedItem); // Tambahkan item yang cocok ke dalam hasil pencarian
                            }
                        });

                        // Tampilkan dropdown setelah melakukan pencarian
                        searchResults.style.display = 'block';
                    } else {
                        // Kosongkan hasil pencarian jika panjang input kurang dari 3 karakter
                        let searchResults = document.getElementById('searchResults');
                        searchResults.innerHTML = '';

                        // Sembunyikan dropdown jika panjang input kurang dari 3 karakter
                        searchResults.style.display = 'none';
                    }
                });
            </script> --}}
                
            {{-- <label for="jumlahproduk" class="form-label">Produk</label>
            @foreach ($produkambil as $produkcuy)
            <div class="form-check mt-2 rounded-5">
                <input class="form-check-input" type="checkbox" value="{{ $produkcuy->idproduk }}" id="{{ $produkcuy->idproduk }}">
                <label class="form-check-label" for="{{ $produkcuy->idproduk }}" {{ old('produk') == $produkcuy->idproduk ? 'checked' : '' }}>
                    {{ $produkcuy->namaproduk }}
                </label>
            </div>
            @endforeach --}}
        </div>
        <span class="text-start mb-2">Pelanggan</span>
        <select class="form-select mt-2 border border-dark-subtle rounded-5" aria-label="Floating label select example" name="idpelanggan">
            @foreach ($pelangganambil as $pelangganambilcuy)
                @if ($pelangganambilcuy->idpelanggan)
                    <option value="{{ $pelangganambilcuy->idpelanggan }}" {{ old('pelanggan') == $pelangganambilcuy->idpelanggan ? 'selected' : '' }}>
                        {{ $pelangganambilcuy->ismember == '0' ? ($pelangganambilcuy->namapelanggan).' (Biasa)' : ($pelangganambilcuy->ismember == '1' ? $pelangganambilcuy->slug.' (Member)' : '') }}
                    </option>
                @else
                <option value="#" selected>
                    Tidak Ada Pelanggan
                </option>
                @endif
            @endforeach
        </select>
        {{-- @dd($pelangganambil) --}}
        <div class="mb-3">
            <label for="jumlahproduk" class="form-label">Jumlah</label>
            <input type="number" class="form-control rounded border border-dark-subtle p-1.5 rounded-5 @error('jumlahproduk') is-invalid @enderror" min="0" id="jumlahproduk" name="jumlahproduk" value="{{ old('jumlahproduk') }}">
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <div class="mb-3">
            <label for="subtotal" class="form-label">Subtotal</label>
            <div class="input-group mb-3 rounded border border-dark-subtle p-1.5 rounded-5">
                <span style="border-top-left-radius: 100px; border-bottom-left-radius: 100px;" class="input-group-text bg-secondary-subtle border-0">Rp.</span>
                <input type="number" style="border-top-right-radius: 100px;border-bottom-right-radius: 100px;" class="form-control border-0 @error('subtotal') is-invalid @enderror" step="500" id="subtotal" name="subtotal" value="{{ old('subtotal') }}" disabled>
            </div>
            {{-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div> --}}
        </div>
        <button type="submit" class="btn btn-primary my-3 fw-light">Tambah pelanggan</button>
    </form>
</div>
@endsection
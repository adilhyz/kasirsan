@extends('layut.main')

@section('container')
{{-- <h1>Hello World</h1> --}}
<div class="row align-items-md-stretch">
    <!-- <h3 class="text-bg-dark shadow-sm rounded-2 text-center">{{ $ucapan }}</h3> -->
    <h3 class="align-items-md-scretch justify-content-center text-bg-dark shadow-sm rounded-2 text-center p-3 mb-3 fs-5">{{ $tentang }}</h3>
    <div class="col-md-12 my-3">
        <div class="h-100 p-3 bg-primary-subtle text-bg-dark rounded-2">
            {{-- <img src="img/{{ $logo }}" alt="{{ $nama }}" class="mx-auto d-block d-flex img-thumbnail rounded-circle bg-danger-subtle" srcset="">
            <p class="text-center text-primary">Cihuy</p> --}}
            <div class="col-md-12">
                <div class="h-100 p-3 d-lg-flex flex-lg-row flex-column justify-content-around align-items-center bg-warning-subtle border rounded-2">
                    <img src="img/{{ $php }}" alt="{{ $nama }}" class="text-start mx-2 my-2" srcset="">
                    <img src="img/{{ $larapel }}" alt="{{ $nama }}" class="text-start mx-2 my-2" srcset="" width="177px">
                    <span class="d-grid fs-4 text-center text-danger-emphasis">Kasirsan, Aplikasi yang menggunakan bahasa PHP dengan Laravel 10 sebagai framewok. PHP memberikan pondasi kokoh, juga Laravel menjadikannya menarik menurut saya untuk dikembangkan. kasirsan lebih dari sekadar alat pembayaran!</span>
                </div>
            </div>
            <div class="col-md-12">
                <div class="h-100 mt-3 p-3 d-lg-flex flex-lg-row flex-column justify-content-around align-items-center bg-warning-subtle border rounded-2">
                    <img src="img/{{ $gh }}" alt="{{ $nama }}" class="text-start mx-2 my-2" srcset="">
                    <img src="img/{{ $dkursor }}" alt="{{ $nama }}" class="text-start mx-2 my-2" srcset="">
                    {{-- <span class="d-grid fs-4 text-center text-black-50">Aplikasi kasircuy dibuat menggunakan bahasa pemrograman PHP dan laravel 10 sebagai framework nya</span> --}}
                    <span class="d-block fs-4 text-center text-danger-emphasis">Berikut ini adalah <a href="https://github.com/adilhyz/kasircuy-portfolio" class="bi-text-paragraph text-primary-emphasis" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">portfolio dokumentasi sederhana dari github saya</a>, jangan lupa <i class="bi-star-fill"></i> nya hehe :D</span>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
@endsection
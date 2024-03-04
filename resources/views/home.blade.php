@extends('layut.main')

@section('container')
<div class="row align-items-md-stretch">
            <!-- <h3 class="text-bg-dark shadow-sm rounded-2 text-center">{{ $ucapan }}</h3> -->
            <h3 class="align-items-md-scretch justify-content-center text-bg-dark shadow-sm rounded-2 text-center p-3 mb-3 fs-5">{{ $ucapan }}</h3>
            <div class="col-md-3 my-3">
                <div class="h-100 p-3 bg-warning-subtle text-bg-dark rounded-2 bg-warning">
                    <img src="img/{{ $logo }}" alt="{{ $nama }}" class="mx-auto d-block d-flex img-fluid rounded-2 bg-warning-subtle" srcset="">
                </div>
            </div>
            <div class="col-md-9 my-3">
                <div class="h-100 p-3 bg-primary-subtle border rounded-2 text-start">
                    <!-- <p>Nama : {{ $namalengkap }}</p>
                    <p>Kelas : {{ $kelas }}</p> -->
                    Deskripsi : {!! $deskripsihome !!}
                    <!-- <img src="img/{{ $relasi }}" class="img-fluid custom-svg rounded border border-dark-subtle" alt="{{ $nama }}" srcset="" width="600"> -->
                    <div class="progress" role="progressbar" aria-label="Default striped example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                        <div class="progress-bar progress-bar-striped " style="width: {{ $percentage }}%"></div>
                    </div>
                </div>
            </div>
        </div>
@endsection
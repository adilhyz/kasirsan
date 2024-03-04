@extends('dashboard.layut.master')

@section('container')
        <div class="d-lg-flex justify-content-between flex-lg-wrap flex-lg-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h3"><i class="bi-speedometer2"></i> Dashboard</h1>
          {{-- <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group me-2">
              <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
              <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
              </div>
              <button type="button"
              class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
              <svg class="bi">
                  <use xlink:href="#calendar3" /></svg>
              This week
              </button>
          </div> --}}
          <div class="mb-lg mb-2 mb-md-2">
              <a href="/" style="text-decoration: none;" onmouseover="this.style.textDecoration='underline'" onmouseout="this.style.textDecoration='none'">Home </a><i class="bi bi-chevron-right mt-2"></i> Dashboard</div>
          </div>
        {{-- <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas> --}}
        <div class="row">
          <!-- Earnings (Monthly) Card Example -->
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-opacity-10 border-5 border-primary border-end-0 border-top-0 border-bottom-0 shadow h-100 py-1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark-emphasis text-uppercase mb-1">Produk</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">{{ $jmlproduk }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="bi-cart-plus text-dark-emphasis fs-7 p-1"></i>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <div class="row justify-content-start">
                      <div class="col-auto">
                        <a href="{{ route('produk.index') }}" class="badge rounded-pill bg-primary-subtle text-primary"><i class="bi-arrow-right text-primary fs-5"></i></a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @can('Admin')
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-opacity-10 border-5 border-warning border-end-0 border-top-0 border-bottom-0 shadow h-100 py-1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark-emphasis text-uppercase mb-1">Petugas</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">{{ $jmluser }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="bi-person-fill-gear text-dark-emphasis fs-7 p-1"></i>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <div class="row justify-content-start">
                      <div class="col-auto">
                        {{-- <button onclick="a()" class="badge rounded-pill bg-primary-subtle text-primary border-0"><i class="bi-arrow-right text-danger fs-5"></i></button> --}}
                        <a href="{{ route('user.index') }}" class="badge rounded-pill bg-primary-subtle text-primary"><i class="bi-arrow-right text-primary fs-5"></i></a>
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endcan
          @auth
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-opacity-10 border-5 border-info border-end-0 border-top-0 border-bottom-0 shadow h-100 py-1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark-emphasis text-uppercase mb-1">Pelanggan</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">{{ $jmlpelanggan }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="bi-people-fill text-dark-emphasis fs-7 p-1"></i>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <div class="row justify-content-start">
                      <div class="col-auto">
                        {{-- @can('Petugas') --}}
                        @can ('Admin')
                          <span href="{{ route('pelanggan.index') }}" class="badge rounded-pill bg-light-secondary text-info" disabled><i class="bi-arrow-90deg-right text-muted fs-5"></i></span>
                        @else
                          <a href="{{ route('pelanggan.index') }}" class="badge rounded-pill bg-info-subtle text-info"><i class="bi-arrow-right text-info fs-5"></i></a>
                        @endif
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-opacity-10 border-5 border-success border-end-0 border-top-0 border-bottom-0 shadow h-100 py-1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark-emphasis text-uppercase mb-1">Tranksaksi</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">{{ $jmltranksaksi }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="bi-repeat text-dark-emphasis fs-7 p-1"></i>
                  </div>
                </div>
                <div class="col-12 mt-2">
                  <div class="row justify-content-start">
                      <div class="col-auto">
                        {{-- @can('Petugas') --}}
                        @can ('Admin')
                          <span href="{{ route('pelanggan.index') }}" class="badge rounded-pill bg-light-secondary text-success" disabled><i class="bi-arrow-90deg-right text-muted fs-5"></i></span>
                        @else
                          <a href="{{ route('pelanggan.index') }}" class="badge rounded-pill bg-success-subtle text-success"><i class="bi-arrow-right text-success fs-5"></i></a>
                        @endif
                      </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          @endauth
          {{-- <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-7">
                            <i class="bi bi-emoji-angry font-20 text-info"></i>
                            <p class="font-16 m-b-5">New Clients</p>
                        </div>
                        <div class="col-5">
                            <h1 class="font-light text-right mb-0">23</h1>
                        </div>
                    </div>
                </div>
            </div>                        
          </div> --}}
          
        </div>
        <div class="row">
          <div class="col-xl-12 col-md-12 mb-4">
            <div class="card bg-opacity-10 border-5 border-danger border-end-0 border-top-0 border-bottom-0 shadow h-100 py-1">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-dark-emphasis text-uppercase mb-1">Pendapatan</div>
                    <div class="h5 mb-0 font-weight-bold text-dark">{{ $jmlkeuntungan }}</div>
                  </div>
                  <div class="col-auto">
                    <i class="bi-currency-dollar text-dark-emphasis fs-7 p-1"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        {{-- <div class="table-responsive small">
          <table class="table table-striped table-sm">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
                <th scope="col">Header</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,002</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,003</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,004</td>
                <td>text</td>
                <td>random</td>
                <td>layout</td>
                <td>dashboard</td>
              </tr>
              <tr>
                <td>1,005</td>
                <td>dashboard</td>
                <td>irrelevant</td>
                <td>text</td>
                <td>placeholder</td>
              </tr>
              <tr>
                <td>1,006</td>
                <td>dashboard</td>
                <td>illustrative</td>
                <td>rich</td>
                <td>data</td>
              </tr>
              <tr>
                <td>1,007</td>
                <td>placeholder</td>
                <td>tabular</td>
                <td>information</td>
                <td>irrelevant</td>
              </tr>
              <tr>
                <td>1,008</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
              </tr>
              <tr>
                <td>1,009</td>
                <td>placeholder</td>
                <td>irrelevant</td>
                <td>visual</td>
                <td>layout</td>
              </tr>
              <tr>
                <td>1,010</td>
                <td>data</td>
                <td>rich</td>
                <td>dashboard</td>
                <td>tabular</td>
              </tr>
              <tr>
                <td>1,011</td>
                <td>information</td>
                <td>placeholder</td>
                <td>illustrative</td>
                <td>data</td>
              </tr>
            </tbody>
          </table>
        </div> --}}
        {{-- <div class="row">
          <div class="col-lg-3 bg-secondary">
            <h1 class="text-reset h6">Test</h1>
          </div>
          <div class="col-lg-3 bg-secondary">
            <h1 class="text-reset h6">Test</h1>
          </div>
          <div class="col-lg-3 bg-secondary">
            <h1 class="text-reset h6">Test</h1>
          </div>
          <div class="col-lg-3 bg-secondary">
            <h1 class="text-reset h6">Test</h1>
          </div>
        </div> --}}
        {{-- <div class="card-footer text-center text-dark m-4 rounded-5">
          <span><i class="bi bi-code-slash"></i> with <i class="bi bi-heart-fill text-danger"></i> by <a class="text-decoration-underline text-danger" href="https://github.com/adilhyz">adilhyz</a></span>
        </div> --}}
@endsection
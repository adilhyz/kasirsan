<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }} | Kasirsan</title>
    <link rel="shortcut icon" href="img/{{ $logo }}" type="image/x-icon">
    
    <!-- Bootstrap Cuy 5.3 -->
    {{-- <link href="css/bootstrap.min.css" rel="stylesheet"> --}}
    <link href="css/bootspike.min.css" rel="stylesheet">
    <!-- Bootstrap icon -->
    <link href="css/bootstrap-icons/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <!-- Sweetalert2 -->
    <script src="js/sweetalert2.js"></script>
    <!-- Bootstrap 5.3 cuy -->
    <script src="js/bootstrap.bundle.min.js"></script>    
</head>
<body class="bg-dark-subtle text-dark">
    <!-- navbar -->
    @include('layut.navbar')

    <div class="container text-center p-5 mt-5 border border-dark rounded-3 bg-info">
        @yield('container')
    </div>
    
    <div class="card-footer text-center text-dark m-4 rounded-5">
        <span><i class="bi bi-braces"></i> </i> with <i class="bi bi-heart-fill text-danger"></i> by <a class="text-decoration-underline text-danger" href="https://github.com/adilhyz">adilhyz</a></span>
    </div>
    @auth
    {{-- @livewireStyles
    <dropdown-link href="{{ route('logout') }}"
        onclick="event.preventDefault(); document.getElementById('logout').submit(); clearLocalStorage();">
        {{ __('Logout') }}
    </dropdown-link>
    @livewireScripts --}}
        @if (Request::is('/'))
        <script>
            Swal.fire({
                icon: 'info',
                title: 'Yo {{ Auth::user()->username }}-san',
                text: "Ingin Masuk dashboard?",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Iya",
                cancelButtonText: "Tidak",
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('dashboard') }}";
                }
            });
        </script>
        @elseif (session('success-register'))
        <form id="logout" method="POST" action="{{ route('logout') }}">
            @csrf
            @livewireScripts
            <script>
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
                    }
                });
            </script>
        </form>
        @endif
    @endauth
</body>
</html>
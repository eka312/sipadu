<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('dist/css/index.css') }}">
</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container">
            <!-- Logo kiri -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('dist/assets/img/logo_sipadu.png')}}" alt="Logo" width="80" height="40" style="object-fit: contain;">
            </a>

            <!-- Tombol toggle (buat HP/tablet) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Isi navbar -->
            <div class="collapse navbar-collapse text-capitalize " id="navbarNav">
                <!-- Menu tengah -->
                <ul class="navbar-nav gap-2">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tentang Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tata Cara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Lapor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Status Kasus</a>
                    </li>
                </ul>

                <!-- Tombol kanan -->
                <div class="d-flex ms-auto">
                    <a class="btn btn-light text-primary px-3" style="font-weight: 400;" href="#">Login</a>
                </div>
            </div>
        </div>
    </nav>
    <!-- end navbar -->


    @yield('content')
    <div class="div"> hello</div>

    <!-- footer -->
    <nav class="navbar navbar-expand-lg bg-primary stikcy-bottom" data-bs-theme="dark">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img src="{{ asset('dist/assets/img/logo_sipadu.png')}}" alt="Logo" width="240" height="180" style="object-fit: contain;">
                </div>
                <div class="col">
                    Column
                </div>
                <div class="col">
                    Column
                </div>
            </div>

            <hr class="text-white" style="width: 100%; font-weight: 800;">
            <span class="navbar-text mx-auto">
                &copy; 2024 SIPADU. All rights reserved.
            </span>
        </div>
    </nav>
    <!-- end footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>
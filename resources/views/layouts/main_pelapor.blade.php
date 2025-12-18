<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <!-- link css -->
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">

    <!-- link font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Poetsen+One&display=swap"
        rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo_kecil.png') }}" />


    <style>
        .user-name {
            max-width: 120px;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            display: inline-block;
            vertical-align: middle;
        }

        /* Dropdown dark mode */
        .dropdown-menu-dark {
            background-color: #ffffff;
            color: #071F5C;
            border: 1px solid rgb(142, 142, 143);
        }

        .dropdown-menu-dark .dropdown-item {
            color: #071F5C;
        }

        .dropdown-menu-dark .dropdown-item:hover {
            background-color: rgba(196, 197, 200, 0.52);
            color: white;
        }
    </style>

</head>

<body>

    <!-- navbar -->
    <nav class="navbar navbar-expand-lg bg-primary text-white" data-bs-theme="dark">
        <div class="container">
            <!-- Logo kiri -->
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/img/logo_sipadu.png')}}" alt="Logo" width="80" height="40"
                    style="object-fit: contain;">
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
                        <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#aboutus">Tentang Kami</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#manfaat">Manfaat & Kelebihan</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#tata-cara">Tata Cara</a>
                    </li>

                    @auth('siswa')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('siswa/lapor') ? 'active' : '' }}" href="{{ route('lapor.siswa.create') }}">Lapor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('siswa/status_kasus') ? 'active' : '' }}" href="{{ route('status.siswa') }}">Status Kasus</a>
                    </li>
                    @endauth

                    @auth('guru')
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('guru/lapor') ? 'active' : '' }}" href="{{ route('lapor.guru.create') }}">Lapor</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ Request::is('guru/status_kasus') ? 'active' : '' }}" href="{{ route('status.guru') }}">Status Kasus</a>
                    </li>
                    @endauth

                    @if(!Auth::guard('siswa')->check() && !Auth::guard('guru')->check())
                    <li class="nav-item">
                        <a class="nav-link" href="#login-pelapor">Lapor</a>
                    </li>
                    @endif

                </ul>


                <!-- Tombol kanan -->
                <div class="d-flex ms-auto gap-3">


                    <!-- Jika siswa login  -->
                    @auth('siswa')
                    <div class="dropdown ">
                        <button class="btn btn-light text-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-name">
                                {{ explode(' ', Auth::guard('siswa')->user()->nama_siswa)[0] }}
                            </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm dropdown-menu-dark">
                            <li>
                                <form action="{{ route('logout.siswa') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth



                    <!-- Jika guru login  -->
                    @auth('guru')
                    <div class="dropdown">
                        <button class="btn btn-light text-primary dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="user-name">
                                {{ explode(' ', Auth::guard('guru')->user()->nama_guru)[0] }}
                            </span>
                        </button>

                        <ul class="dropdown-menu dropdown-menu-end shadow-sm dropdown-menu-dark">
                            <li>
                                <form action="{{ route('logout.guru') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                    @endauth



                    <!-- Jika belum login  -->
                    @if(!Auth::guard('siswa')->check() && !Auth::guard('guru')->check())
                    <a class="btn btn-light text-primary px-3" href="/login_admin">
                        Login Admin
                    </a>
                    @endif

                </div>


            </div>
        </div>
    </nav>
    <!-- end navbar -->

    <main>
        @yield('content')

    </main>


    <!-- footer -->
    <nav class="navbar navbar-expand-lg bg-primary stikcy-bottom text-white">
        <div class="container">
            <ul>
                <div class="row gap-3">
                    <div class="col">
                        <img src="{{ asset('assets/img/logo_sipadu.png')}}" alt="Logo" width="240" height="180"
                            style="object-fit: contain;">
                        <h4>SIPADU (Sistem Pengaduan Terpadu)</h4>
                        <p>
                            Platform pelaporan siswa
                            berbasis web yang membantu
                            sekolah menjaga kedisiplinan
                            dan keterbukaan.
                        </p>
                    </div>
                    <div class="col d-flex align-items-center">
                        <ul class="footer-menu">
                            <h4>Menu Utama</h4>
                            <div class="col">
                                <a href="/">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Beranda
                                </a>
                            </div>

                            <div class="col">
                                <a class="col" href="#aboutus">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Tentang Kami
                                </a>
                            </div>

                            <div class="col">
                                <a class="col" href="#manfaat">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Manfaat & Kelebihan
                                </a>
                            </div>

                            <div class="col">
                                <a class="col" href="#tata-cara">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Tata Cara
                                </a>
                            </div>

                            <div class="col">
                                @auth('siswa')
                                <a class="col" href="{{ route('lapor.siswa.create') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Lapor
                                </a>
                                @elseif(Auth::guard('guru')->check())
                                <a class="col" href="{{ route('lapor.guru.create') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Lapor
                                </a>
                                @else
                                <a class="col" href="#login-pelapor">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54" d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54" d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Lapor
                                </a>
                                @endauth
                            </div>



                            <div class="col">
                                @auth('siswa')
                                <a class="col" href="{{ route('status.siswa') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Status Kasus
                                </a>
                                @elseif(Auth::guard('guru')->check())
                                <a class="col" href="{{ route('status.guru') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="20" viewBox="0 0 16 9">
                                        <path fill="#F7CD54"
                                            d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                                        <path fill="#F7CD54"
                                            d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                                    </svg>
                                    Status Kasus
                                </a>
                                @endauth
                            </div>


                        </ul>

                    </div>
                    <div class="col d-flex align-items-center">
                        <ul>
                            <h4>SMK PGRI WLINGI</h4>
                            <div class="col mb-2">
                                <i class="fa-solid fa-location-dot fa-lg" style="color: #ffffff;"></i>
                                Jl. Jendral Sudirman No. 86 Beru, Wlingi, Blitar, Jawa Timur
                            </div>
                            <div class="col mb-2">
                                <i class="fa-solid fa-phone fa-lg" style="color: #ffffff;"></i>
                                (0342) 691224
                            </div>
                            <div class="col">
                                <i class="fa-solid fa-envelope fa-lg" style="color: #ffffff;"></i>
                                smkpgri_wlg@yahoo.co.id
                            </div>
                        </ul>
                    </div>
                </div>
                <hr class="text-white" style="width: 100%;">
                <span class="navbar-text d-flex justify-content-center text-white">
                    2025 &copy; SIPADU - dikelola oleh SMK PGRI WLINGI
                </span>
            </ul>
        </div>
    </nav>
    <!-- end footer -->

    <!-- Tombol Scroll Atas -->
    <button id="btnTop" class="scroll-btn">
        <i class="fa-solid fa-arrow-up fa-sm" style="color: #ffffff;"></i>
    </button>

    <!-- Tombol Scroll Bawah -->
    <button id="btnBottom" class="scroll-btn scroll-down">
        <i class="fa-solid fa-arrow-down fa-sm" style="color: #ffffff;"></i>
    </button>

    <script>
        const btnTop = document.getElementById("btnTop");
        const btnBottom = document.getElementById("btnBottom");

        // Munculin tombol kalau sudah scroll dikit
        window.addEventListener("scroll", () => {
            if (window.scrollY > 100) {
                btnTop.style.display = "flex";
            } else {
                btnTop.style.display = "none";
            }

            // kalau belum sampai bawah, tombol turun muncul
            if ((window.innerHeight + window.scrollY) < document.body.offsetHeight - 100) {
                btnBottom.style.display = "flex";
            } else {
                btnBottom.style.display = "none";
            }
        });

        // Scroll ke atas
        btnTop.addEventListener("click", () => {
            window.scrollTo({
                top: 0,
                behavior: "smooth"
            });
        });

        // Scroll ke bawah
        btnBottom.addEventListener("click", () => {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: "smooth"
            });
        });
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous">
    </script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />
    <link href="{{asset('css/styles.css')}}" rel="stylesheet" />
    <link href="{{asset('css/admin.css')}}" rel="stylesheet" />

    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
</head>

<body class="sb-nav-fixed bg-content">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-transparent no-shadow">
        <a class="navbar-brand text-center" href="#">
            <img src="{{asset('assets/img/logo_sipadu.png')}}" class="logo-clear" alt="Logo" style="height: 80px;">
        </a>
    </nav>





    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav mt-4">
                        <!-- Dashboard -->
                        <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" href="/dashboard">
                            <i class="fas fa-home sb-nav-link-icon"></i>
                            Dashboard
                        </a>

                        <!-- User Data -->
                        <!-- <a class="nav-link {{ Request::is('guru') ? 'active' : '' }}" href="/guru">
                            <i class="fas fa-user-tie sb-nav-link-icon"></i>
                            Data Guru
                        </a>

                        <a class="nav-link {{ Request::is('siswa') ? 'active' : '' }}" href="/siswa">
                            <i class="fas fa-user-graduate sb-nav-link-icon"></i>
                            Data Siswa
                        </a> -->

                        <a class="nav-link {{ Request::is('pelapor') ? 'active' : '' }}" href="/pelapor">
                            <i class="fas fa-users sb-nav-link-icon"></i>
                            Data Pelapor
                        </a>

                        <!-- Academic -->
                        <!-- <a class="nav-link {{ Request::is('kelas') ? 'active' : '' }}" href="/kelas">
                            <i class="fas fa-school sb-nav-link-icon"></i>
                            Data Kelas
                        </a>

                        <a class="nav-link {{ Request::is('mapel') ? 'active' : '' }}" href="/mapel">
                            <i class="fas fa-book sb-nav-link-icon"></i>
                            Data Mapel
                        </a> -->

                        <!-- Core App -->
                        <a class="nav-link {{ Request::is('kasus') ? 'active' : '' }}" href="/kasus">
                            <i class="fas fa-exclamation-circle sb-nav-link-icon"></i>
                            Data Jenis Kasus
                        </a>

                        <a class="nav-link {{ Request::is('laporan') ? 'active' : '' }}" href="/laporan">
                            <i class="fas fa-file-alt sb-nav-link-icon"></i>
                            Data Laporan
                        </a>

                        <a class="nav-link {{ Request::is('user') ? 'active' : '' }}" href="/petugas">
                            <i class="fas fa-file-alt sb-nav-link-icon"></i>
                            Data Petugas
                        </a>

                    </div>


                </div>
                <div class="sb-sidenav-footer p-0">
                    <div class="d-flex align-items-center justify-content-between px-3 py-2"
                        style="
            background: rgba(255,255,255,0.05);
            border-top: 1px solid rgba(255,255,255,0.1);
            backdrop-filter: blur(6px);
        ">

                        <!-- Kiri: Avatar + Email -->
                        <div class="d-flex align-items-center">
                            <!-- Avatar -->
                            <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=0D6EFD&color=fff"
                                class="rounded-circle"
                                style="width: 35px; height: 35px; border: 2px solid rgba(255,255,255,0.2);">

                            <!-- Email -->
                            <span class="ms-2 text-white" style="font-size: 0.85rem; font-weight: 500;">
                                {{ Auth::user()->email }}
                            </span>
                        </div>

                        <!-- Kanan: Logout icon -->
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                            class="text-white"
                            style="font-size: 1rem;">
                            <i class="fas fa-sign-out-alt"></i>
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none"></form>
                    </div>
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <main class="bg-content">
                @yield('content')
            </main>

        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('assets/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('assets/demo/chart-bar-demo.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>
</body>

</html>
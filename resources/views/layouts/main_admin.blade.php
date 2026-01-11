<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Bootstrap CSS (FIXED INTEGRITY) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Font Awesome untuk Menu Icons -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>

    <!-- Google Font (Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/logo_kecil.png') }}" />

    <link href="{{asset('css/admin.css')}}" rel="stylesheet" />


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/style.min.css" rel="stylesheet" />


    <style>
        /* ===== GLOBAL ===== */
        body {
            font-family: 'Poppins', sans-serif !important;
            background-color: #f8f9fa;
        }

        :root {
            --bs-primary: #071F5C !important;
            --bs-primary-rgb: 7, 31, 92 !important;
            --bs-warning: #F7CD54 !important;
            --bs-warning-rgb: 247, 205, 84 !important;

            --bs-warning-text: #664d03 !important;
            --bs-warning-bg-subtle: #fff3cd !important;
            --bs-warning-border-subtle: #ffeeba !important;
        }

        /* ===== BUTTON PRIMARY ===== */
        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: color-mix(in srgb, var(--bs-primary) 90%, white);
            --bs-btn-hover-border-color: color-mix(in srgb, var(--bs-primary) 85%, white);
            --bs-btn-active-bg: color-mix(in srgb, var(--bs-primary) 80%, black);
            --bs-btn-active-border-color: color-mix(in srgb, var(--bs-primary) 75%, black);
        }

        /* ===== SIDEBAR ===== */
        #sidebar {
            position: fixed;
            /* 🔥 PENTING */
            top: 0;
            left: 0;
            height: 100vh;
            width: 260px;
            transition: width 0.3s ease;
            z-index: 1000;
        }


        /* Text muted di sidebar */
        #sidebar .text-muted {
            color: #c9d1d9 !important;
        }

        /* ===== TOGGLE BUTTON ===== */
        #sidebar-toggle {
            position: absolute;
            top: 1.5rem;
            right: -13px;
            width: 26px;
            height: 26px;
            background-color: var(--bs-primary);
            color: #fff;
            border: 2px solid #f8f9fa;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;

            display: flex;
            align-items: center;
            justify-content: center;

            transition:
                background-color 0.2s ease,
                box-shadow 0.2s ease;
        }

        /* Hover effect */
        #sidebar-toggle:hover {
            background-color: #0a2b7a;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        /* Icon animasi */
        #sidebar-toggle i {
            font-size: 0.9rem;
            transition: transform 0.25s ease;
        }

        /* Saat sidebar collapse */
        #sidebar.collapsed #sidebar-toggle i {
            transform: translateX(1px);
        }


        /* ===== SIDEBAR HEADER ===== */
        .sidebar-header {
            min-height: 90px;
        }

        /* Logo */
        .logo-small {
            display: none;
            height: 45px;
        }

        .logo-big {
            display: block;
            height: 65px;
        }

        /* ===== SIDEBAR MENU ===== */
        .sidebar-menu .nav-item {
            margin-bottom: 6px;
        }

        #sidebar .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.85);
            transition: all 0.25s ease;
        }

        /* Hover */
        #sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: #fff !important;
        }

        /* Active */
        #sidebar .nav-link.active {
            background-color: #ffffff;
            color: var(--bs-primary) !important;
            font-weight: 600;
        }

        #sidebar .nav-link.active .menu-icon {
            color: var(--bs-primary);
        }

        /* Icon */
        .menu-icon {
            width: 22px;
            text-align: center;
            font-size: 1.05rem;
            flex-shrink: 0;
        }

        /* Text menu */
        .link-text {
            font-size: 0.9rem;
            transition: opacity 0.2s ease-in-out;
        }

        /* ===== COLLAPSED STATE ===== */
        #sidebar.collapsed {
            width: 90px;
        }



        /* Hide text */
        #sidebar.collapsed .link-text,
        #sidebar.collapsed .sidebar-header-text {
            display: none;
        }

        /* Center icon */
        #sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 10px;
        }

        #sidebar.collapsed .menu-icon {
            font-size: 1.2rem;
            width: auto;
        }

        /* Logo switch */
        #sidebar.collapsed .logo-small {
            display: block;
        }

        #sidebar.collapsed .logo-big {
            display: none;
        }

        /* ===== FOOTER ===== */
        .sidebar-footer {
            font-size: 0.85rem;
        }

        #footer-expanded {
            display: flex;
        }

        #footer-collapsed {
            display: none;
        }

        /* Footer saat collapsed */
        #sidebar.collapsed .sidebar-footer #footer-expanded {
            display: none !important;
        }

        #sidebar.collapsed .sidebar-footer #footer-collapsed {
            display: block !important;
        }

        /* ===== OPTIONAL DIVIDER ===== */
        .sidebar-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.15);
            margin: 12px 0;
        }

        #main-content {
            margin-left: 260px;
            transition: margin-left 0.3s ease;
        }

        #sidebar.collapsed~#main-content {
            margin-left: 90px;
        }
    </style>
</head>

<body>



    <!-- ===== Sidebar ===== -->

    <nav id="sidebar" class="bg-primary d-flex flex-column text-light">
        <!-- Tombol Toggle -->
        <div id="sidebar-toggle" role="button" aria-label="Toggle sidebar">
            <i class="bi bi-chevron-left" id="toggle-icon"></i>
        </div>

        <!-- Header Sidebar (Logo SIPADU) -->
        <div class="sidebar-header px-3 pt-4 pb-2 d-flex align-items-center">
            <img src="{{asset('assets/img/logo_kecil.png')}}" class="logo-small" alt="Logo" style="height:45px;">
            <img src="{{asset('assets/img/logo_sipadu.png')}}" class="logo-big " alt="Logo" style="height:65px;">
        </div>


        <ul class="nav nav-pills flex-column px-3 mt-3 flex-grow-1 sidebar-menu">

            <li class="nav-item">
                <a href="/dashboard"
                    class="nav-link sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="fas fa-home sidebar-icon"></i>
                    <span class="link-text">Dashboard</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/guru"
                    class="nav-link sidebar-link {{ Request::is('guru') ? 'active' : '' }}">
                    <i class="fas fa-user-tie sidebar-icon"></i>
                    <span class="link-text">Data Guru</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/siswa"
                    class="nav-link sidebar-link {{ Request::is('siswa') ? 'active' : '' }}">
                    <i class="fas fa-user-graduate sidebar-icon"></i>
                    <span class="link-text">Data Siswa</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/kasus"
                    class="nav-link sidebar-link {{ Request::is('kasus') ? 'active' : '' }}">
                    <i class="fas fa-exclamation-circle sidebar-icon"></i>
                    <span class="link-text">Jenis Aduan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/laporan"
                    class="nav-link sidebar-link {{ Request::is('laporan') ? 'active' : '' }}">
                    <i class="fas fa-file-alt sidebar-icon"></i>
                    <span class="link-text">Data Laporan</span>
                </a>
            </li>

            <li class="nav-item">
                <a href="/petugas"
                    class="nav-link sidebar-link {{ Request::is('petugas') ? 'active' : '' }}">
                    <i class="fas fa-user-shield sidebar-icon"></i>
                    <span class="link-text">Data Petugas</span>
                </a>
            </li>

        </ul>


        <!-- Bagian Bawah Sidebar (Footer) -->
        <div class="sidebar-footer mt-auto">
            <div id="footer-expanded"
                class="d-flex align-items-center justify-content-between p-3 border-top border-secondary bg-primary">
                <!-- Kiri: Avatar + Email -->
                <div class="d-flex align-items-center">
                    <img src="https://ui-avatars.com/api/?name=ADM&background=0D6EFD&color=fff"
                        class="rounded-circle" style="width: 35px; height: 35px;">

                    <span class="mx-1 text-white link-text" style="font-size: 0.85rem; font-weight: 500;">
                        {{ Auth::user()->email }}
                    </span>
                </div>

                <!-- Kanan: Logout icon -->
                <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"
                    class="text-white " style="font-size: 1rem;">
                    <i class="fas fa-sign-out-alt"></i>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none"></form>
            </div>
            <!-- Konten Footer Saat SIDEBAR TERTUTUP (Collapsed - Hanya Icon Logout) -->
            <div id="footer-collapsed" class="text-center p-3 border-top border-secondary bg-primary">
                <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal"
                    class="text-white" style="font-size: 1rem;">
                    <i class="fas fa-sign-out-alt"></i>
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none"></form>
            </div>

            <!-- Modal Konfirmasi Logout -->
            <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content text-dark">

                        <div class="modal-header">
                            <h5 class="modal-title fw-bold  " id="logoutModalLabel">Konfirmasi Logout</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>

                        <div class="modal-body">
                            Yakin mau keluar dari sistem SIPADU?
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button class="btn btn-danger"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                Logout
                            </button>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </nav>

    <!-- ===== Konten Utama ===== -->
    <main id="main-content" class="flex-grow-1 p-4">
        <div class="container-fluid">
            @yield('content')
            <!-- <div class="card p-4 rounded-3 border-0 shadow-sm">
                    <h1>Halaman Dashboard Sipadu</h1>
                    <p>Selamat datang di halaman dashboard Anda. Sidebar ini kini didesain dengan "Full Bootstrap 5.3" *utility classes*.</p>
                    <p>Semua item menu sudah sejajar sempurna secara vertikal karena slot ikon (`.menu-icon`) memiliki lebar yang tetap.</p>
                </div> -->
        </div>
    </main>


    <!-- Bootstrap JS Bundle (FIXED INTEGRITY) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebar-toggle');
        const toggleIcon = document.getElementById('toggle-icon');

        toggleBtn.addEventListener('click', function() {
            sidebar.classList.toggle('collapsed');

            if (sidebar.classList.contains('collapsed')) {
                toggleIcon.classList.remove('bi-chevron-left');
                toggleIcon.classList.add('bi-chevron-right');
            } else {
                toggleIcon.classList.remove('bi-chevron-right');
                toggleIcon.classList.add('bi-chevron-left');
            }
        });
    </script>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>


    <script>
        document.addEventListener('click', function(e) {
            if (e.target.closest('.toggle-password')) {
                const button = e.target.closest('.toggle-password');
                const input = button.parentElement.querySelector('.password-input');
                const icon = button.querySelector('i');

                if (input.type === "password") {
                    input.type = "text";
                    icon.classList.remove("bi-eye-slash");
                    icon.classList.add("bi-eye");
                } else {
                    input.type = "password";
                    icon.classList.remove("bi-eye");
                    icon.classList.add("bi-eye-slash");
                }
            }
        });
    </script>





</body>

</html>
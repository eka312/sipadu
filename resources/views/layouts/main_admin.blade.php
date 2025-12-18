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
        body {
            font-family: 'poppins', sans-serif !important;
            background-color: #f8f9fa;
            /* Light background for main content */
        }

        :root {
            --bs-primary: #071F5C !important;
            --bs-primary-rgb: 7, 31, 92 !important;
            --bs-warning: #F7CD54 !important;
            --bs-warning-rgb: 247, 205, 84 !important;
            /* Untuk text-warning (Bootstrap 5.3 ke atas) */
            --bs-warning-text: #664d03 !important;

            /* Untuk bg-warning-subtle dan border-subtle */
            --bs-warning-bg-subtle: #fff3cd !important;
            --bs-warning-border-subtle: #ffeeba !important;

        }

        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: color-mix(in srgb, var(--bs-primary) 90%, white);
            --bs-btn-hover-border-color: color-mix(in srgb, var(--bs-primary) 85%, white);
            --bs-btn-active-bg: color-mix(in srgb, var(--bs-primary) 80%, black);
            --bs-btn-active-border-color: color-mix(in srgb, var(--bs-primary) 75%, black);
        }

        /* Sidebar - Menggunakan utility BS: bg-primary, d-flex, flex-column, min-vh-100 */
        #sidebar {
            width: 260px;
            min-height: 100vh;
            position: relative;
            transition: width 0.3s ease-in-out;
            box-shadow: 4px 0 10px rgba(0, 0, 0, 0.1);
        }

        #sidebar .text-muted {
            color: #c9d1d9 !important;
            /* abu2 terang */
        }

        /* Tombol Toggle - Posisi tetap membutuhkan CSS kustom */
        #sidebar-toggle {
            position: absolute;
            top: 1.5rem;
            right: -12px;
            width: 25px;
            height: 25px;
            background-color: var(--bs-primary);
            /* Same as bg-primary */
            color: white;
            border: 2px solid #f8f9fa;
            border-radius: 50%;
            cursor: pointer;
            z-index: 10;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease;
        }

        /* Menu Link - Dikecilkan padding vertikalnya (0.3rem) */
        .nav-link {
            transition: background-color 0.2s ease, color 0.2s ease;
            white-space: nowrap;
            padding: 0.3rem 0.75rem;
            /* DIUBAH: Dikecilkan dari 0.5rem menjadi 0.3rem */
        }

        /* Nav Link Active/Hover - Menggunakan warna Bootstrap */
        .nav-link:hover,
        .nav-link.active {
            background-color: rgba(255, 255, 255, 0.1);
            /* Light hover effect */
            color: #fff !important;
        }

        /* KRITIS UNTUK ALIGNMENT IKON: Slot ikon harus punya lebar tetap */
        .menu-icon {
            width: 24px;
            text-align: center;
            line-height: 1;
            font-size: 1.1rem;
        }

        .link-text {
            font-size: 0.9rem;
            opacity: 1;
            transition: opacity 0.2s ease-in-out;
        }

        /*
         * STATE TERTUTUP (COLLAPSED)
        */
        #sidebar.collapsed {
            width: 80px;
            /* Lebar minimum */
        }

        #sidebar.collapsed #sidebar-toggle {
            transform: rotate(180deg);
        }

        /* Sembunyikan teks saat collapsed */
        #sidebar.collapsed .link-text,
        #sidebar.collapsed .sidebar-header-text,
        #sidebar.collapsed .logo-clear {
            opacity: 0;
            pointer-events: none;
            width: 0;
            display: none;
        }

        /* Pusatkan ikon saat tertutup */
        #sidebar.collapsed .nav-link {
            justify-content: center;
            padding: 0.5rem;
            /* Padding lebih simetris */
        }

        #sidebar.collapsed .menu-icon {
            width: auto;
        }

        /* Footer saat collapsed */
        #sidebar.collapsed .sidebar-footer #footer-expanded {
            display: none !important;
        }

        #sidebar.collapsed .sidebar-footer #footer-collapsed {
            display: block !important;
        }

        /* Footer saat expanded (default) */
        .sidebar-footer #footer-collapsed {
            display: none;
        }

        /* Default Sidebar Expanded */
        .logo-small {
            display: none;
        }

        .logo-big {
            display: block;
        }

        /* Saat Sidebar Collapse */
        #sidebar.collapsed .logo-small {
            display: block;
        }

        #sidebar.collapsed .logo-big {
            display: none;
        }




        /* Tambahan: Tambahkan jarak antara menu dan footer. */
        /* Menggunakan mt-auto pada elemen footer di HTML lebih disarankan */
    </style>
</head>

<body>

    <div class="d-flex ">

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


            <ul class="nav nav-pills flex-column px-3 mt-3 flex-grow-1">

                <!-- Dashboard -->
                <li class="nav-item mb-1">
                    <a href="/dashboard" class="nav-link  d-flex align-items-center text-white rounded-3 {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class="fas fa-home menu-icon me-3"></i>
                        <span class="link-text">Dashboard</span>
                    </a>
                </li>

                <!-- Data Guru -->
                <li class="nav-item mb-1">
                    <a href="/guru" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('guru') ? 'active' : '' }}">
                        <i class="fas fa-user-tie menu-icon me-3"></i>
                        <span class="link-text">Data Guru</span>
                    </a>
                </li>

                <!-- Data Siswa -->
                <li class="nav-item mb-1">
                    <a href="/siswa" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('siswa') ? 'active' : '' }}">
                        <i class="fas fa-user-graduate menu-icon me-3"></i>
                        <span class="link-text">Data Siswa</span>
                    </a>
                </li>

                <!-- Data Pelapor -->
                <!-- <li class="nav-item mb-1">
                    <a href="/pelapor" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('pelapor') ? 'active' : '' }}">
                        <i class="fas fa-users menu-icon me-3"></i>
                        <span class="link-text">Data Pelapor</span>
                    </a>
                </li> -->

                <!-- Academic Divider -->
                <li class="mt-3 mb-1 px-2 text-muted link-text" style="font-size: 0.75rem;">DATA AKADEMIK</li>

                <!-- Data Kelas -->
                <li class="nav-item mb-1">
                    <a href="/kelas" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('kelas') ? 'active' : '' }}">
                        <i class="fas fa-school menu-icon me-3"></i>
                        <span class="link-text">Data Kelas</span>
                    </a>
                </li>

                <!-- Data Mapel -->
                <li class="nav-item mb-1">
                    <a href="/mapel" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('mapel') ? 'active' : '' }}">
                        <i class="fas fa-book menu-icon me-3"></i>
                        <span class="link-text">Data Mapel</span>
                    </a>
                </li>

                <!-- Core App Divider -->
                <li class="mt-3 mb-1 px-2 text-muted link-text" style="font-size: 0.75rem;">INTI APLIKASI</li>

                <!-- Data Jenis Kasus -->
                <li class="nav-item mb-1">
                    <a href="/kasus" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('kasus') ? 'active' : '' }}">
                        <i class="fas fa-exclamation-circle menu-icon me-3"></i>
                        <span class="link-text">Data Jenis Aduan</span>
                    </a>
                </li>

                <!-- Data Laporan -->
                <li class="nav-item mb-1">
                    <a href="/laporan" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('laporan') ? 'active' : '' }}">
                        <i class="fas fa-file-alt menu-icon me-3"></i>
                        <span class="link-text">Data Laporan</span>
                    </a>
                </li>

                <!-- Data Petugas -->
                <li class="nav-item mb-1">
                    <a href="/petugas" class="nav-link d-flex align-items-center text-light rounded-3 {{ Request::is('petugas') ? 'active' : '' }}">
                        <i class="fas fa-user-tie menu-icon me-3"></i>
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
    </div>

    <!-- Bootstrap JS Bundle (FIXED INTEGRITY) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>

    <!-- JavaScript Kustom -->
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const sidebar = document.getElementById('sidebar');
            const toggleBtn = document.getElementById('sidebar-toggle');
            const toggleIcon = document.getElementById('toggle-icon');
            const footerExpanded = document.getElementById('footer-expanded');
            const footerCollapsed = document.getElementById('footer-collapsed');

            // 1. Fungsi Toggle Sidebar
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');

                if (sidebar.classList.contains('collapsed')) {
                    toggleIcon.classList.replace('bi-chevron-left', 'bi-chevron-right');

                    // Kontrol Footer
                    footerExpanded.style.display = 'none';
                    footerCollapsed.style.display = 'block';

                } else {
                    toggleIcon.classList.replace('bi-chevron-right', 'bi-chevron-left');

                    // Kontrol Footer
                    footerExpanded.style.display = 'flex';
                    footerCollapsed.style.display = 'none';
                }
            });

            // Initial check to set correct footer state (optional, for safety)
            if (sidebar.classList.contains('collapsed')) {
                footerExpanded.style.display = 'none';
                footerCollapsed.style.display = 'block';
            } else {
                footerExpanded.style.display = 'flex';
                footerCollapsed.style.display = 'none';
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
    <script src="{{asset('js/datatables-simple-demo.js')}}"></script>


    <script>
        document.querySelectorAll('#togglePassword').forEach(btn => {
            btn.addEventListener('click', function() {
                const input = this.parentNode.querySelector('input');
                const icon = this.querySelector('i');

                input.type = input.type === "password" ? "text" : "password";
                icon.classList.toggle("bi-eye");
                icon.classList.toggle("bi-eye-slash");
            });
        });
    </script>




</body>

</html>
@extends('layouts.main_pelapor')

@section('title', 'Beranda | SIPADU')

@section('content')

<div class="container">
    <!-- section hero -->
    <div class="row py-5 align-items-center" id="hero">
        <div class="col col-12 col-md-6 order-0 order-md-0">
            <video width="100%" height="auto" autoplay loop muted>
                <source src="{{ asset('assets/img/7019985_Agent_Answer_1280x720.mp4') }}" type="video/mp4">
            </video>
        </div>
        <div class="col col-12 col-md-6 order-1 order-md-1">
            <h3 class="text-primary" style="font-weight:700;">Laporkan, Kami Dengar dan Tindak Lanjutkan!</h3>
            <div class="text-muted my-3">
                SIPADU membantu siswa dan pihak sekolah menyelesaikan setiap permasalahan dengan mudah, aman, dan
                rahasia. Melalui sistem yang terintegrasi, setiap laporan atau kendala dapat ditangani dengan cepat dan
                tepat, sehingga tercipta lingkungan sekolah yang nyaman, saling mendukung, dan berfokus pada
                kesejahteraan seluruh warga sekolah.
            </div>
            <a class="btn btn-primary px-4" href="#login-pelapor">
                <div class="col">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 20 20">
                        <g fill="#fff">
                            <g opacity="0.6">
                                <path
                                    d="M6.137 11.783a1 1 0 0 1-.737-.965V6.382a1 1 0 0 1 .737-.965l7.6-2.073A1 1 0 0 1 15 4.31v8.582a1 1 0 0 1-1.263.964z" />
                                <path fill-rule="evenodd"
                                    d="m7.4 10.054l5.6 1.527V5.619L7.4 7.146zm-2 .764a1 1 0 0 0 .737.965l7.6 2.073A1 1 0 0 0 15 12.89V4.309a1 1 0 0 0-1.263-.965l-7.6 2.073a1 1 0 0 0-.737.965z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M7.016 10.8a1 1 0 0 1-1 1h-2.76a.56.56 0 0 1-.205-.176c-1.593-1.7-1.6-4.36.002-6.052a.55.55 0 0 1 .4-.172h2.763a1 1 0 0 1 1 1z" />
                                <path fill-rule="evenodd"
                                    d="M5.016 9.8V7.4H3.969a2.43 2.43 0 0 0 .004 2.4zm1 2a1 1 0 0 0 1-1V6.4a1 1 0 0 0-1-1H3.253a.55.55 0 0 0-.4.172c-1.602 1.691-1.595 4.353-.002 6.052a.56.56 0 0 0 .405.176z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3.902 11.506A2 2 0 0 1 5.84 10h.584a2 2 0 0 1 1.938 2.496l-.767 3A2 2 0 0 1 5.657 17h-1.87a1 1 0 0 1-.969-1.247z" />
                                <path fill-rule="evenodd"
                                    d="M6.424 12H5.84l-.766 3h.583zm-.584-2a2 2 0 0 0-1.938 1.506l-1.084 4.247A1 1 0 0 0 3.788 17h1.87a2 2 0 0 0 1.937-1.505l.767-3A2 2 0 0 0 6.424 10zm13.192-5.555a1 1 0 0 1-.277 1.387l-1.5 1a1 1 0 0 1-1.11-1.664l1.5-1a1 1 0 0 1 1.387.277M15.7 8.6a1 1 0 0 1 1-1h1.5a1 1 0 0 1 0 2h-1.5a1 1 0 0 1-1-1m.234 1.909a1 1 0 0 1 1.409-.123l1.38 1.16a1 1 0 0 1-1.286 1.531l-1.38-1.16a1 1 0 0 1-.123-1.408"
                                    clip-rule="evenodd" />
                            </g>
                            <path fill-rule="evenodd"
                                d="M6.4 4.882v4.436l7.6 2.073V2.809zm-1 4.436a1 1 0 0 0 .737.965l7.6 2.073A1 1 0 0 0 15 11.39V2.809a1 1 0 0 0-1.263-.965l-7.6 2.073a1 1 0 0 0-.737.965z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M3.456 9.3H5.5V4.9H3.453a3.42 3.42 0 0 0 .003 4.4m2.044 1a1 1 0 0 0 1-1V4.9a1 1 0 0 0-1-1H3.253a.55.55 0 0 0-.4.172c-1.602 1.691-1.595 4.353-.002 6.052a.56.56 0 0 0 .405.176z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="m7.269 10.87l-2.51-.28l-.978 3.91h2.636zm-2.4-1.273a1 1 0 0 0-1.081.75l-.977 3.91a1 1 0 0 0 .97 1.243h2.636a1 1 0 0 0 .974-.772l.852-3.63a1 1 0 0 0-.864-1.223zm13.747-6.374a.5.5 0 0 1-.139.693l-1.5 1a.5.5 0 1 1-.554-.832l1.5-1a.5.5 0 0 1 .693.139M16.2 7.1a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1h-1.5a.5.5 0 0 1-.5-.5m.117 2.23a.5.5 0 0 1 .705-.06l1.38 1.159a.5.5 0 0 1-.643.765l-1.38-1.16a.5.5 0 0 1-.062-.704"
                                clip-rule="evenodd" />
                        </g>
                    </svg>
                    Ayo Lapor
                </div>
            </a>
        </div>
    </div>
    <!-- end section hero -->



    <!-- section fitur -->
    <div class="fitur py-5 text-center" id="fitur">
        <div>
            <h3 class="text-capitalize mb-5" style="color:var(--bs-primary);font-weight:650;">
                fitur - fitur yang tersedia di SIPADU
            </h3>
            <div class="row row-cols-1 row-cols-md-5 g-4">
                <!-- tengtang kami -->
                <div class="col "  >
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 256 256" >
                        <g fill="#071F5C">
                            <path
                                d="M168 144a40 40 0 1 1-40-40a40 40 0 0 1 40 40M64 56a32 32 0 1 0 32 32a32 32 0 0 0-32-32m128 0a32 32 0 1 0 32 32a32 32 0 0 0-32-32"
                                opacity="0.6" />
                            <path
                                d="M244.8 150.4a8 8 0 0 1-11.2-1.6A51.6 51.6 0 0 0 192 128a8 8 0 0 1 0-16a24 24 0 1 0-23.24-30a8 8 0 1 1-15.5-4A40 40 0 1 1 219 117.51a67.94 67.94 0 0 1 27.43 21.68a8 8 0 0 1-1.63 11.21M190.92 212a8 8 0 1 1-13.85 8a57 57 0 0 0-98.15 0a8 8 0 1 1-13.84-8a72.06 72.06 0 0 1 33.74-29.92a48 48 0 1 1 58.36 0A72.06 72.06 0 0 1 190.92 212M128 176a32 32 0 1 0-32-32a32 32 0 0 0 32 32m-56-56a8 8 0 0 0-8-8a24 24 0 1 1 23.24-30a8 8 0 1 0 15.5-4A40 40 0 1 0 37 117.51a67.94 67.94 0 0 0-27.4 21.68a8 8 0 1 0 12.8 9.61A51.6 51.6 0 0 1 64 128a8 8 0 0 0 8-8" />
                        </g>
                    </svg>
                    <h5 class="text-primary" style="font-weight: 700;">Tentang Kami</h5>
                    <div class="text-muted">
                        Kenali sistem pelaporan sekolah yang aman, resmi, dan terintegrasi.
                    </div>
                </div>
                <!--end tengtang kami -->

                <!-- manfaat -->
                <div class="col" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                        <g fill="none" stroke="#071F5C" stroke-width="1.5">
                            <path
                                d="M4.5 9.5a7.5 7.5 0 1 1 12.501 5.59c-1.12 1.003-1.68 1.505-1.832 1.69c-.487.601-.508.65-.63 1.413c-.039.237-.039.593-.039 1.307c0 .935 0 1.402-.201 1.75a1.5 1.5 0 0 1-.549.549C13.402 22 12.935 22 12 22s-1.402 0-1.75-.201a1.5 1.5 0 0 1-.549-.549c-.201-.348-.201-.815-.201-1.75c0-.713 0-1.07-.038-1.307c-.123-.763-.144-.812-.631-1.412c-.151-.186-.712-.688-1.832-1.692A7.48 7.48 0 0 1 4.5 9.5Z" />
                            <path d="M14.5 19.5h-5" opacity="0.5" />
                            <path stroke-linecap="round" d="M12 17v-2m0 0a2 2 0 0 0 1.732-1M12 15a2 2 0 0 1-1.732-1"
                                opacity="0.5" />
                        </g>
                    </svg>
                    <h5 class="text-primary" style="font-weight: 700;">Manfaat & Kelebihan</h5>
                    <div class="text-muted">
                        Memudahkan pelaporan dan penyampaian saran secara online dengan cepat dan terpercaya.
                    </div>
                </div>
                <!-- end manfaat -->


                <!--Tata Cara -->
                <div class="col" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                        <g fill="none" fill-rule="evenodd" clip-rule="evenodd">
                            <path fill="#071F5C"
                                d="M3.308 4.249c-.32.87.16-.37-1.779 6.315C1.17 11.993.71 12.992.38 14.59Q.09 15.906 0 17.248a.83.83 0 0 0 .4.74c1.22.51 8.453 1.588 10.122 1.788a.34.34 0 0 0 .09-.67c-2.228-.359-7.854-1.488-9.502-1.998c.11-2.118 1.109-4.736 1.488-6.265l1-3.996c.18-.86.4-2.618.829-3.068c.27-.27.26-.21.84-.11c.299 0 .409-.55 0-.64c-1.11-.279-1.27-.529-1.96 1.22m14.869 1.998a18 18 0 0 0-1.19 4.626a.3.3 0 0 0 .58.15c.17-.47.34-.929.52-1.389c.56-1.468 2.158-4.356.56-4.676c-.07 0-.67-.14-1.17-.19s-.759.53-.17.69c-.01.01 1.06.12.87.79" />
                            <path fill="#0c6fff"
                                d="M17.826 2.34C13.599.862 14.109.882 13.22.682a23.7 23.7 0 0 0-4.477-.59c-1.528.09-1.948.67-2.418 1.999a62.4 62.4 0 0 0-3.037 11.9a3 3 0 0 0 0 1.169a1 1 0 0 0 .45.47c1.288.27 3.996.999 4.116.999c.79.17 1.998.37 2.588.51a.35.35 0 0 0 .42-.24c.12-.47-.33-.42-2.488-1c-4.357-1.159-4.057-1.079-3.997-1.379s.14-.999.27-1.788C6.315 3 6.605 4.069 6.735 3.559c.14.07.26 0 1.609.34c.57.13 1.149.31 1.718.47c3.407.889 3.537.53 5.126.939a.3.3 0 0 0 .19-.56c-.87-.38-2.348-.7-3.297-.999a20.5 20.5 0 0 0-5.166-.8h-.07c.9-2.447 1-1.998 6.655-1.088c2.208.63 1.408.42 3.537.929c-.85.72-1.38 2.768-1.999 4.506a21.5 21.5 0 0 0-.999 4.257a.3.3 0 0 0 .58.15q.52-1.512.849-3.078q.37-1.368.89-2.688a15.5 15.5 0 0 1 .918-2.278c.78-.899 2.748-.23 2.998.74c.033.72-.041 1.44-.22 2.138c-.3 3.267-1.099 4.077-.55 4.256a.3.3 0 0 0 .38-.19a34 34 0 0 0 1.629-5.605c.19-1.998-2.078-3.127-3.687-2.658" />
                            <path fill="#0c6fff"
                                d="M12.36 8.156a11.2 11.2 0 0 0-2.677-.93c-.07-.02-2.208-.23-2.268-.23a.29.29 0 0 0-.08.41a.74.74 0 0 0 .34.27q.875.357 1.788.61c.08 0 2.718.51 2.798.51c.36.069.73-.32.1-.64m-.521 3.837a16.5 16.5 0 0 0-3.586-1.17a4.6 4.6 0 0 0-1.19.06c-.459.06-.819 0-.769.35s.32.35.77.41c1.516.43 3.058.764 4.616.999a.34.34 0 0 0 .16-.65" />
                            <path fill="#071F5C"
                                d="M22.622 14.56a5.876 5.876 0 0 0-9.402.59c-1.669 2.458-.8 6.065.85 7.124a.31.31 0 0 0 .349-.51c-1.319-.919-1.909-4.076-.42-6.055a4.935 4.935 0 0 1 7.724-.4c2.438 2.888 1 7.275-3.307 7.784a5.6 5.6 0 0 1-2.348-.17a.352.352 0 1 0-.22.67a6.4 6.4 0 0 0 2.648.28a5.626 5.626 0 0 0 4.126-9.313" />
                            <path fill="#071F5C"
                                d="M16.747 20.576c1.159.07 2.528-3.158 2.997-4.197a1.1 1.1 0 0 0 .27-.59a.36.36 0 0 0-.66-.18c-.24.29-2.747 3.937-2.687 3.997c-.2 0-1.22-1.179-1.359-1.269c-.14-.09-.6.17-.37.51c.44.63 1.13 1.699 1.809 1.729" />
                        </g>
                    </svg>
                    <h5 class="text-primary" style="font-weight: 700;">Tata Cara</h5>
                    <div class="text-muted">
                        Pelajari langkah mudah dalam menyampaikan laporan di SIPADU.
                    </div>
                </div>
                <!--end Tata Cara -->

                <!-- Lapor -->
                <div class="col" >
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 20 20">
                        <g fill="#071F5C">
                            <g opacity="0.6">
                                <path
                                    d="M6.137 11.783a1 1 0 0 1-.737-.965V6.382a1 1 0 0 1 .737-.965l7.6-2.073A1 1 0 0 1 15 4.31v8.582a1 1 0 0 1-1.263.964z" />
                                <path fill-rule="evenodd"
                                    d="m7.4 10.054l5.6 1.527V5.619L7.4 7.146zm-2 .764a1 1 0 0 0 .737.965l7.6 2.073A1 1 0 0 0 15 12.89V4.309a1 1 0 0 0-1.263-.965l-7.6 2.073a1 1 0 0 0-.737.965z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M7.016 10.8a1 1 0 0 1-1 1h-2.76a.56.56 0 0 1-.405-.176c-1.593-1.7-1.6-4.36.002-6.052a.55.55 0 0 1 .4-.172h2.763a1 1 0 0 1 1 1z" />
                                <path fill-rule="evenodd"
                                    d="M5.016 9.8V7.4H3.969a2.43 2.43 0 0 0 .004 2.4zm1 2a1 1 0 0 0 1-1V6.4a1 1 0 0 0-1-1H3.253a.55.55 0 0 0-.4.172c-1.602 1.691-1.595 4.353-.002 6.052a.56.56 0 0 0 .405.176z"
                                    clip-rule="evenodd" />
                                <path
                                    d="M3.902 11.506A2 2 0 0 1 5.84 10h.584a2 2 0 0 1 1.938 2.496l-.767 3A2 2 0 0 1 5.657 17h-1.87a1 1 0 0 1-.969-1.247z" />
                                <path fill-rule="evenodd"
                                    d="M6.424 12H5.84l-.766 3h.583zm-.584-2a2 2 0 0 0-1.938 1.506l-1.084 4.247A1 1 0 0 0 3.788 17h1.87a2 2 0 0 0 1.937-1.505l.767-3A2 2 0 0 0 6.424 10zm13.192-5.555a1 1 0 0 1-.277 1.387l-1.5 1a1 1 0 0 1-1.11-1.664l1.5-1a1 1 0 0 1 1.387.277M15.7 8.6a1 1 0 0 1 1-1h1.5a1 1 0 0 1 0 2h-1.5a1 1 0 0 1-1-1m.234 1.909a1 1 0 0 1 1.409-.123l1.38 1.16a1 1 0 0 1-1.286 1.531l-1.38-1.16a1 1 0 0 1-.123-1.408"
                                    clip-rule="evenodd" />
                            </g>
                            <path fill-rule="evenodd"
                                d="M6.4 4.882v4.436l7.6 2.073V2.809zm-1 4.436a1 1 0 0 0 .737.965l7.6 2.073A1 1 0 0 0 15 11.39V2.809a1 1 0 0 0-1.263-.965l-7.6 2.073a1 1 0 0 0-.737.965z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="M3.456 9.3H5.5V4.9H3.453a3.42 3.42 0 0 0 .003 4.4m2.044 1a1 1 0 0 0 1-1V4.9a1 1 0 0 0-1-1H3.253a.55.55 0 0 0-.4.172c-1.602 1.691-1.595 4.353-.002 6.052a.56.56 0 0 0 .405.176z"
                                clip-rule="evenodd" />
                            <path fill-rule="evenodd"
                                d="m7.269 10.87l-2.51-.28l-.978 3.91h2.636zm-2.4-1.273a1 1 0 0 0-1.081.75l-.977 3.91a1 1 0 0 0 .97 1.243h2.636a1 1 0 0 0 .974-.772l.852-3.63a1 1 0 0 0-.864-1.223zm13.747-6.374a.5.5 0 0 1-.139.693l-1.5 1a.5.5 0 1 1-.554-.832l1.5-1a.5.5 0 0 1 .693.139M16.2 7.1a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1h-1.5a.5.5 0 0 1-.5-.5m.117 2.23a.5.5 0 0 1 .705-.06l1.38 1.159a.5.5 0 0 1-.643.765l-1.38-1.16a.5.5 0 0 1-.062-.704"
                                clip-rule="evenodd" />
                        </g>
                    </svg>
                    <h5 class="text-primary" style="font-weight: 700;">Lapor</h5>
                    <div class="text-muted">
                        Sampaikan laporan pelanggaran siswa dengan cepat dan rahasia.
                    </div>
                </div>
                <!-- end Lapor -->

                <!-- status Aduan -->
                <div class="col">
                        <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" viewBox="0 0 24 24">
                            <path fill="#071F5C"
                                d="M9.5 16q-2.725 0-4.612-1.888T3 9.5t1.888-4.612T9.5 3t4.613 1.888T16 9.5q0 1.1-.35 2.075T14.7 13.3l5.6 5.6q.275.275.275.7t-.275.7t-.7.275t-.7-.275l-5.6-5.6q-.75.6-1.725.95T9.5 16m0-2q1.875 0 3.188-1.312T14 9.5t-1.312-3.187T9.5 5T6.313 6.313T5 9.5t1.313 3.188T9.5 14" />
                        </svg>
                        <h5 class="text-primary" style="font-weight: 700;">Status Aduan</h5>
                        <div class="text-muted">
                            Pantau perkembangan laporanmu hingga selesai secara transparan.
                        </div>
                    </div>
                <!-- end status Aduan -->
            </div>

        </div>
    </div>
    <!-- end section fitur -->


    <!-- tentang kami -->
    <div class="row py-5  " id="aboutus">
        <div class="col my-auto">
            <ul>
                <div class="text-warning" style="font-weight: 800;font-size:3rem; ">TENTANG KAMI</div>
                <div class="text-primary fw-bold fs-4 pb-3 " style="font-family: Roboto;">
                    Mengapa SIPADU <br> Dihadirkan?
                </div>
                <div class="btn btn-primary">
                    <div class="col p-1">
                        Pelajari Lebih Lanjut
                        <svg xmlns="http://www.w3.org/2000/svg" width="35" height="20" viewBox="0 0 16 9">
                            <path fill="#fff"
                                d="M12.5 5h-9c-.28 0-.5-.22-.5-.5s.22-.5.5-.5h9c.28 0 .5.22.5.5s-.22.5-.5.5" />
                            <path fill="#fff"
                                d="M10 8.5a.47.47 0 0 1-.35-.15c-.2-.2-.2-.51 0-.71l3.15-3.15l-3.15-3.15c-.2-.2-.2-.51 0-.71s.51-.2.71 0l3.5 3.5c.2.2.2.51 0 .71l-3.5 3.5c-.1.1-.23.15-.35.15Z" />
                        </svg>

                    </div>
                </div>
            </ul>

        </div>
        <div class="col ">
            <ul>
                <div class="poin-list">
                    <h5 class="text-capitalize" style="color: #333333; font-weight: 700;">
                        Apa itu SIPADU?
                    </h5>
                    <div class="text-muted ">
                        SIPADU (Sistem Pengaduan Terpadu) adalah platform berbasis web yang digunakan untuk mencatat dan
                        menindaklanjuti laporan pelanggaran siswa secara cepat dan terorganisir.
                    </div>
                </div>
                <div class="poin-list pt-3">
                    <h5 class="text-capitalize" style="color: #333333; font-weight: 700;">
                        Tujuan Utama
                    </h5>
                    <div class="text-muted ">
                        Membantu sekolah dalam mengelola laporan pelanggaran dengan transparan, efektif, dan menjaga
                        kerahasiaan identitas pelapor.
                    </div>
                </div>
                <div class="poin-list pt-3">
                    <h5 class="text-capitalize" style="color: #333333; font-weight: 700;">
                        Kerahasiaan Terjamin
                    </h5>
                    <div class="text-muted ">
                        Setiap laporan yang masuk akan disimpan dengan aman. Identitas pelapor tidak akan dipublikasikan
                        atau dibagikan tanpa izin.
                    </div>
                </div>
                <div class="poin-list pt-3">
                    <h5 class="text-capitalize" style="color: #333333; font-weight: 700;">
                        Proses Terintegrasi
                    </h5>
                    <div class="text-muted ">
                        Setiap laporan yang masuk akan disimpan dengan aman. Identitas pelapor tidak akan dipublikasikan
                        atau dibagikan tanpa izin.
                    </div>
                </div>
                <div class="poin-list pt-3">
                    <h5 class="text-capitalize" style="color: #333333; font-weight: 700;">
                        Manfaat Sistem
                    </h5>
                    <div class="text-muted ">
                        Setiap laporan yang masuk akan disimpan dengan aman. Identitas pelapor tidak akan dipublikasikan
                        atau dibagikan tanpa izin.
                    </div>
                </div>
            </ul>
        </div>
    </div>
    <!-- end tentang kami -->



    <!-- manfaat & kelebihan -->
    <div class="py-5" id="manfaat">

        <!-- Title -->
        <div class="text-center mb-2">
            <h3 class="text-capitalize" style="color:var(--bs-primary);font-weight:650;">
                Manfaat & Kelebihan SIPADU
            </h3>
            <p class="text-muted col-lg-6 mx-auto">
                SIPADU hadir untuk memudahkan proses pelaporan dan pembinaan siswa
                dengan sistem yang cepat, aman, dan terintegrasi.
            </p>
        </div>

        <!-- Gambar -->
        <div class="text-center mb-2">
            <img src="{{ asset('assets/img/organic-flat-customer-support.png') }}"
                alt="Manfaat SIPADU"
                class="img-fluid rounded"
                style="max-height: 420px;">
        </div>


        <!-- Manfaat -->
        <div class="row g-4 text-center">
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 1792 1792"
                        class="my-1">
                        <path fill="#fff"
                            d="M1764 11q33 24 27 64l-256 1536q-5 29-32 45q-14 8-31 8q-11 0-24-5l-453-185l-242 295q-18 23-49 23q-13 0-22-4q-19-7-30.5-23.5T640 1728v-349l864-1059l-1069 925l-395-162q-37-14-40-55q-2-40 32-59L1696 9q15-9 32-9q20 0 36 11" />
                    </svg>
                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Pelaporan Lebih Cepat
                </div>
                <div class="text-muted">
                    Laporan dapat dikirim dan diproses secara
                    real-time tanpa perlu prosedur panjang.
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                        class="my-1">
                        <path fill="#fff" d="M6 20h12V10H6zm6-7c1.1 0 2 .9 2 2s-.9 2-2 2s-2-.9-2-2s.9-2 2-2"
                            opacity="0.3" />
                        <path fill="#fff"
                            d="M18 8h-1V6c0-2.76-2.24-5-5-5S7 3.24 7 6v2H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2M9 6c0-1.66 1.34-3 3-3s3 1.34 3 3v2H9zm9 14H6V10h12zm-6-3c1.1 0 2-.9 2-2s-.9-2-2-2s-2 .9-2 2s.9 2 2 2" />
                    </svg>

                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Kerahasiaan Terjamin
                </div>
                <div class="text-muted">
                    Identitas pelapor dijaga sepenuhnya agar
                    proses tetap aman dan terpercaya.
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                        class="my-1">
                        <g fill="#fff">
                            <path d="M5 9V7h2v2zm4 0h10V7H9zm-4 6v2h2v-2zm14 2H9v-2h10z" />
                            <path fill-rule="evenodd"
                                d="M1 6a3 3 0 0 1 3-3h16a3 3 0 0 1 3 3v12a3 3 0 0 1-3 3H4a3 3 0 0 1-3-3zm3-1h16a1 1 0 0 1 1 1v5H3V6a1 1 0 0 1 1-1m-1 8v5a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-5z"
                                clip-rule="evenodd" />
                        </g>
                    </svg>

                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Data Tersimpan Rapi
                </div>
                <div class="text-muted">
                    Semua laporan terdokumentasi secara
                    digital, mudah diakses kapan pun dibutuhkan.

                </div>
            </div>
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"
                        class="my-1">
                        <g fill="none">
                            <path fill="#fff" fill-opacity="0.5"
                                d="M13.4 2h-2.8A1.6 1.6 0 0 0 9 3.6V22h6V3.6A1.6 1.6 0 0 0 13.4 2" />
                            <path stroke="#fff" stroke-linecap="round" stroke-linejoin="round"
                                stroke-miterlimit="10" stroke-width="1.5"
                                d="M2 22h20M9 8.6A1.6 1.6 0 0 0 7.4 7H4.6A1.6 1.6 0 0 0 3 8.6V22m6 0V3.6A1.6 1.6 0 0 1 10.6 2h2.8A1.6 1.6 0 0 1 15 3.6V22m6 0v-8.4a1.6 1.6 0 0 0-1.6-1.6h-2.8a1.6 1.6 0 0 0-1.6 1.6" />
                        </g>
                    </svg>
                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Monitoring Transparan
                </div>
                <div class="text-muted">
                    Pihak pelapor dapat memantau status
                    Aduan dan tindak lanjutnya secara jelas.

                </div>
            </div>
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 256 256"
                        class="my-1">
                        <g fill="#fff">
                            <path
                                d="m200 152l-40 40l-64-16l-56-40l32.68-65.37L128 56l55.32 14.63l.28 1.37H144l-45.66 44.29a8 8 0 0 0 1.38 12.42C117.23 139.9 141 139.13 160 120Z"
                                opacity="0.4" />
                            <path
                                d="m254.3 107.91l-25.52-51.06a16 16 0 0 0-21.47-7.15l-24.87 12.43l-52.39-13.86a8.14 8.14 0 0 0-4.1 0L73.56 62.13L48.69 49.7a16 16 0 0 0-21.47 7.15L1.7 107.9a16 16 0 0 0 7.15 21.47l27 13.51l55.49 39.63a8.1 8.1 0 0 0 2.71 1.25l64 16a8 8 0 0 0 7.6-2.1l55.07-55.08l26.42-13.21a16 16 0 0 0 7.15-21.46Zm-54.89 33.37L165 113.72a8 8 0 0 0-10.68.61C136.51 132.27 116.66 130 104 122l43.24-42h31.81l27.21 54.41ZM41.53 64L62 74.22l-25.57 51.05L16 115.06Zm116 119.13l-58.11-14.52l-49.2-35.14l28-56L128 64.28l9.8 2.59l-45 43.68l-.08.09a16 16 0 0 0 2.72 24.81c20.56 13.13 45.37 11 64.91-5L188 152.66Zm62-57.87l-25.52-51L214.47 64L240 115.06Zm-87.75 92.67a8 8 0 0 1-7.75 6.06a8 8 0 0 1-1.95-.24l-41.67-10.42a7.9 7.9 0 0 1-2.71-1.25l-26.35-18.82a8 8 0 0 1 9.3-13l25.11 17.94L126 208.24a8 8 0 0 1 5.82 9.7Z" />
                        </g>
                    </svg>
                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Kolaborasi Efektif
                </div>
                <div class="text-muted">
                    Menghubungkan siswa, guru, dan pihak
                    sekolah dalam satu sistem terpadu.
                </div>
            </div>
            <div class="col-md-4">
                <div class="icon btn btn-primary mb-2 rounded-1 ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 640 512"
                        class="my-1">
                        <path fill="#fff"
                            d="M337.8 5.4c-10.8-7.2-24.8-7.2-35.6 0L166.3 96H48c-26.5 0-48 21.5-48 48v320c0 26.5 21.5 48 48 48h208v-96c0-35.3 28.7-64 64-64s64 28.7 64 64v96h208c26.5 0 48-21.5 48-48V144c0-26.5-21.5-48-48-48H473.7zM96 192h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16v-64c0-8.8 7.2-16 16-16m400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16h-32c-8.8 0-16-7.2-16-16zM96 320h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16H96c-8.8 0-16-7.2-16-16v-64c0-8.8 7.2-16 16-16m400 16c0-8.8 7.2-16 16-16h32c8.8 0 16 7.2 16 16v64c0 8.8-7.2 16-16 16h-32c-8.8 0-16-7.2-16-16zM232 176a88 88 0 1 1 176 0a88 88 0 1 1-176 0m88-48c-8.8 0-16 7.2-16 16v32c0 8.8 7.2 16 16 16h32c8.8 0 16-7.2 16-16s-7.2-16-16-16h-16v-16c0-8.8-7.2-16-16-16" />
                    </svg>
                </div>
                <div class="text-primary" style="font-weight: 700;">
                    Mendukung Pembinaan
                    Sekolah
                </div>
                <div class="text-muted">
                    Membantu menciptakan lingkungan
                    belajar yang lebih tertib dan disiplin.

                </div>
            </div>
        </div>

    </div>
    <!-- end manfaat & kelebihan -->


    <!-- tata cara -->
    <div class="py-5" id="tata-cara">

        <!-- Title -->
        <div class="text-center mb-4">
            <h3 class="text-capitalize" style="color:var(--bs-primary);font-weight:650;">
                tata cara penggunaan SIPADU
            </h3>
            <p class="text-muted col-lg-6 mx-auto">
                Ikuti langkah mudah berikut untuk membuat laporan melalui sistem SIPADU dengan cepat, aman, dan
                terarah.
            </p>
        </div>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-5">
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">1</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Masuk ke
                            Halaman SIPADU</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Akses situs resmi SIPADU
                            sekolah melalui browser di
                            perangkat kamu.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">2</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Login atau
                            Isi Identitas</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Masukkan data pelapor sesuai
                            petunjuk. Identitas kamu akan
                            dijaga dengan aman.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">3</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Isi Formulir
                            Laporan</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Tuliskan permasalahan yang
                            ingin dilaporkan secara jelas
                            dan ringkas.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">4</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Kirim
                            Laporan</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Setelah semua data lengkap,
                            tekan tombol “Kirim Laporan”
                            untuk mengirim ke sistem.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">5</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Pantau
                            Status Aduan</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Lihat perkembangan laporan
                            kamu melalui fitur Status Aduan
                            di dashboard.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card bg-primary text-white" style="width: 20rem; height: 12rem;">
                    <div class="card-body">
                        <btn class="card-title text-dark bg-white rounded-circle px-3 py-2 fs-5"
                            style="font-weight: 800;">6</btn>
                        <h5 class="card-subtitle mb-1 mt-4" style="font-family: 'Poetsen One', sans-serif;">Terima
                            Tindak Lanjut</h5>
                        <p class="card-text" style="font-weight: 200;">
                            Pihak sekolah akan
                            menindaklanjuti laporan dan
                            memberikan hasil secara
                            transparan.
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end tata cara -->

    <!-- login pelapor -->
    <div class="py-5 text-center" id="login-pelapor">
        <h2 class="text-primary fw-bold" style="font-family: 'Roboto';">
            Pilih Jenis Pelapor
        </h2>
        <p class="text-muted mb-4" style="font-size: 1.1rem;">
            Masuk ke SIPADU sesuai peran kamu
        </p>

        <div class="row justify-content-center gap-4">

            <!-- Card Pelapor Siswa -->
            <div class="col-md-4">
                <div class="card shadow p-3 border-0 p-3 h-100">
                    <div class="text-center">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="#071F5C">
                            <path
                                d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5s-5 2.239-5 5s2.239 5 5 5zm0 2c-3.865 0-7 2.239-7 5v1h14v-1c0-2.761-3.135-5-7-5z" />
                        </svg>
                    </div>
                    <h4 class="mt-3 fw-bold text-primary">Pelapor Siswa</h4>
                    <p class="text-muted">
                        Khusus untuk siswa yang ingin melaporkan masalah, kendala, atau memberi saran.
                    </p>
                    <a href="/login_siswa" class="btn btn-primary w-100">Masuk sebagai Siswa</a>
                </div>
            </div>

            <!-- Card Pelapor Guru -->
            <div class="col-md-4">
                <div class="card shadow p-3 border-0 p-3 h-100">
                    <div class="text-center">
                        <svg width="80" height="80" viewBox="0 0 24 24" fill="#071F5C">
                            <path
                                d="M12 12c2.761 0 5-2.239 5-5s-2.239-5-5-5s-5 2.239-5 5s2.239 5 5 5zm0 2c-3.865 0-7 2.239-7 5v1h14v-1c0-2.761-3.135-5-7-5z" />
                        </svg>
                    </div>
                    <h4 class="mt-3 fw-bold text-primary">Pelapor Guru</h4>
                    <p class="text-muted">
                        Untuk guru atau staf yang ingin melaporkan kejadian atau kebutuhan siswa.
                    </p>
                    <a href="/login_guru" class="btn btn-primary w-100">Masuk sebagai Guru</a>
                </div>
            </div>

        </div>
    </div>
    <!-- end login pelapor -->

</div>




@endsection
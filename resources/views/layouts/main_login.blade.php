<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login Siswa | SIPADU
        @yield('title')
    </title>
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- link bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Comic+Neue:wght@300;400;700&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:wght@400;500;600;700&family=Raleway:ital,wght@0,100..900;1,100..900&family=Roboto:ital,wght@0,100..900;1,100..900&family=Poetsen+One&display=swap"
        rel="stylesheet">

    <style>
        :root {
            --bs-primary: #071F5C !important;
            --bs-primary-rgb: 7, 31, 92 !important;

        }

        html {
            scroll-behavior: smooth;
        }

        body {
            margin: 0;
            padding: 0;

        }

        .bg-login-siswa {
            background-image: url('{{ asset("assets/img/bg-login2.jpg") }}');
            background-size: cover;
            /* Biar gambarnya nutup full */
            background-position: center;
            /* Fokus di tengah */
            background-repeat: no-repeat;
            /* Biar ga ngulang gambar */
            min-height: 100vh;


        }

        .card-custom {
            background: rgba(255, 255, 255, 0.60) !important;
            /* angka 0.85 bisa kamu atur */
            border-radius: 12px;
            backdrop-filter: blur(1px);
            /* optional: efek kaca */
        }

        .btn-primary {
            --bs-btn-bg: var(--bs-primary);
            --bs-btn-border-color: var(--bs-primary);
            --bs-btn-hover-bg: color-mix(in srgb, var(--bs-primary) 90%, white);
            --bs-btn-hover-border-color: color-mix(in srgb, var(--bs-primary) 85%, white);
            --bs-btn-active-bg: color-mix(in srgb, var(--bs-primary) 80%, black);
            --bs-btn-active-border-color: color-mix(in srgb, var(--bs-primary) 75%, black);
        }
    </style>
</head>

<body class="bg-login-siswa ">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                
                <div class="container ">
                    <div class="row d-flex justify-content-center ">
                        <div class="col-lg-5">
                            @yield('content')
                            
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="{{asset('js/scripts.js')}}"></script>
</body>

</html>
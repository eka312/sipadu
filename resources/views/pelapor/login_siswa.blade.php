

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SIPADU</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            background-color: #E9F0F7;
            /* Warna background abu-abu kebiruan lembut */
            font-family: 'Inter', sans-serif;
        }

        .login-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 8px 10px -6px rgba(0, 0, 0, 0.1);
        }
    </style>

</head>

<body class="flex items-center justify-center min-h-screen p-6">

    <div class="w-full max-w-[420px] bg-white rounded-[20px] login-card overflow-hidden">

        <div class="bg-[#071F5C] pt-10 pb-8 px-8 text-center text-white relative overflow-hidden">
            <div class="absolute -top-6 -right-6 w-24 h-24 bg-white/10 rounded-full"></div>
            <div class="absolute top-12 -left-8 w-20 h-20 bg-white/10 rounded-full"></div>

            <div class="relative z-10 flex flex-col items-center">
                <div class="">
                    <img src="{{ asset('assets/img/logo_sipadu.png') }}"
                        alt="Logo SIPADU"
                        class="w-[160px] object-contain">

                </div>
                <p class="text-[16px] font-light opacity-80">Sistem Pengaduan Terpadu</p>
            </div>
        </div>

        <div class="px-10 py-10">
            <div class="text-center mb-8">
                <h2 class="text-[20px] font-bold text-gray-800">Login Siswa</h2>
                <p class="text-sm text-gray-400 mt-1">Silakan masuk menggunakan NIS Anda</p>
            </div>

            @if ($errors->any())
            <div class="mb-6 rounded-xl bg-red-50 border border-red-200 p-4 text-sm text-red-700">
                <div class="flex items-center gap-2">
                    <i class="fas fa-circle-exclamation"></i>
                    <span>{{ $errors->first() }}</span>
                </div>
            </div>
            @endif

            <form action="{{ route('login.siswa') }}" method="POST">
                @csrf
                @method('POST')
                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-600 mb-2">Username</label>
                    <div class="relative group">
                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                            <i class="far fa-user text-sm"></i>
                        </div>
                        <input type="text"
                            class="w-full pl-10 pr-4 py-3 bg-[#F0F5FF] border border-transparent focus:border-blue-500 focus:bg-white rounded-xl text-sm transition-all duration-200 outline-none placeholder:text-gray-400"
                            placeholder="12124" name="nis">
                    </div>
                </div>

                <div class="mb-5">
                    <label class="block text-[13px] font-medium text-gray-600 mb-2">Kata Sandi</label>
                    <div class="relative group mb-5">

                        <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none text-gray-400 group-focus-within:text-blue-500 transition-colors">
                            <i class="fas fa-lock text-sm"></i>
                        </div>

                        <input type="password"
                            id="password"
                            class="w-full pl-10 pr-10 py-3 bg-[#F0F5FF] border border-transparent focus:border-blue-500 focus:bg-white rounded-xl text-sm transition-all duration-200 outline-none"
                            placeholder="Masukkan kata sandi" name="password">

                        <div id="togglePassword"
                            class="absolute inset-y-0 right-0 pr-3.5 flex items-center text-gray-400 cursor-pointer hover:text-gray-600">
                            <i id="eyeIcon" class="far fa-eye text-sm"></i>
                        </div>
                    </div>
                </div>



                <label for="remember"
                    class="flex items-center gap-2.5 mb-8 cursor-pointer select-none">
                    <input type="checkbox"
                        id="remember"
                        name="remember"
                        class="w-4 h-4 rounded border-gray-300 text-[#071F5C] focus:ring-[#071F5C]"
                        {{ old('remember') ? 'checked' : '' }}>
                    <span class="text-sm text-gray-500">
                        ingat kata sandi
                    </span>
                </label>



                <button type="submit"
                    class="w-full bg-[#071F5C] hover:bg-[#0A2A7A] active:bg-[#051742]  text-white font-semibold py-3 rounded-xl transition duration-200">
                    Login
                </button>


            </form>

        </div>
    </div>
    <script>
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const eyeIcon = document.getElementById('eyeIcon');

        togglePassword.addEventListener('click', () => {
            const isPassword = passwordInput.type === 'password';

            passwordInput.type = isPassword ? 'text' : 'password';
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>


</body>

</html>
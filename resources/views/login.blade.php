<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="{{ ('assets/output.css') }}" rel="stylesheet">
</head>

<body class="flex items-center justify-center min-h-screen bg-[#FFF8F2]">

    <div class="flex flex-col items-center justify-center bg-white p-8 rounded-lg w-full max-w-md">

        <!-- Logo Section -->
        <div class="flex gap-4 items-center mb-6">
            <img src="{{ asset('assets/img/logo.png') }}" class="h-14" alt="Logo">
            <p class="font-bold text-3xl">Login</p>
        </div>

        <!-- Welcome Text -->
        <p class="font-bold text-xl md:text-2xl mb-2 text-center">Selamat Datang Di Landasan Login!</p>
        <p class="text-slate-500 text-sm md:text-base font-medium mb-6 text-center">
            Silahkan masuk untuk melanjutkan
        </p>

        <!-- LOGIN FORM -->
        <form action="{{ route('doLogin') }}" method="POST" class="w-full">
            @csrf

            <!-- USERNAME -->
            <div class="flex flex-col w-full mb-5 gap-y-1">
                <label class="text-slate-400 font-medium">Username</label>
                <input type="text"
                    name="username"
                    value="{{ old('username') }}"
                    placeholder="Masukkan Username Kamu"
                    class="border p-3 rounded-xl font-medium focus:ring-1 focus:ring-primary"
                    @error('username') style="border:2px solid #ef4444 !important;" @enderror>

                @error('username')
                <p style="color:#ef4444;font-size:14px;margin-top:4px;">
                    {{ $message }}
                </p>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="flex flex-col w-full mb-6 gap-y-1">
                <label class="text-slate-400 font-medium">Password</label>
                <input type="password"
                    name="password"
                    placeholder="Masukkan Password Kamu"
                    class="border p-3 rounded-xl font-medium focus:ring-1 focus:ring-primary"
                    @error('password') style="border:2px solid #ef4444 !important;" @enderror>

                @error('password')
                <p style="color:#ef4444;font-size:14px;margin-top:4px;">
                    {{ $message }}
                </p>
                @enderror

            </div>

            <!-- LOGIN BUTTON -->
            <button type="submit"
                class="bg-primary rounded-xl text-white w-full text-center py-3 font-semibold hover:bg-primary-dark transition">
                Masuk
            </button>
        </form>

        <!-- Divider -->
        <div class="flex items-center justify-center w-full my-4">
            <div class="flex-grow border-t border-slate-300"></div>
            <span class="px-3 text-slate-400 text-sm">atau</span>
            <div class="flex-grow border-t border-slate-300"></div>
        </div>

        <!-- REGISTER BUTTON -->
        <a href="{{ route('register') }}"
            class="bg-primary rounded-xl text-white w-3/4 mx-auto block text-center py-2 font-medium hover:bg-primary-dark transition">
            Buat Akun
        </a>

    </div>

</body>

</html>

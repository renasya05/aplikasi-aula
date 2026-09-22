<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Login - SAPA</title>

    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: #f3f5f8;
            min-height: 100vh;

            display: flex;
            align-items: center;
            justify-content: center;

            color: #263238;
        }

        .login-container {
            width: 100%;
            max-width: 430px;
            padding: 20px;
        }

        .login-card {
            background: #ffffff;
            border: 1px solid #e1e5e9;
            border-radius: 10px;
            padding: 35px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.06);
        }

        .logo {
            width: 65px;
            height: 65px;

            margin: 0 auto 18px;

            display: flex;
            align-items: center;
            justify-content: center;

            background: #1f4e79;
            color: white;

            border-radius: 8px;

            font-size: 21px;
            font-weight: bold;
        }

        .title {
            text-align: center;
            color: #1f2933;
            font-size: 25px;
            margin-bottom: 7px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 18px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 7px;
            color: #374151;
        }

        input {
            width: 100%;
            height: 45px;
            padding: 0 13px;

            border: 1px solid #d1d5db;
            border-radius: 6px;

            font-size: 14px;
            outline: none;

            transition: border-color 0.2s;
        }

        input:focus {
            border-color: #1f4e79;
        }

        .remember {
            display: flex;
            align-items: center;
            gap: 8px;

            margin-bottom: 20px;

            font-size: 13px;
            color: #6b7280;
        }

        .remember input {
            width: 15px;
            height: 15px;
        }

        .btn-login {
            width: 100%;
            height: 45px;

            border: none;
            border-radius: 6px;

            background: #1f4e79;
            color: white;

            font-size: 14px;
            font-weight: bold;

            cursor: pointer;
        }

        .btn-login:hover {
            background: #173a5c;
        }

        .register-text {
            text-align: center;
            margin-top: 23px;

            color: #6b7280;
            font-size: 14px;
        }

        .register-text a {
            color: #1f4e79;
            text-decoration: none;
            font-weight: bold;
        }

        .register-text a:hover {
            text-decoration: underline;
        }

        .alert {
            padding: 12px 14px;
            border-radius: 6px;
            margin-bottom: 20px;
            font-size: 13px;
        }

        .alert-success {
            background: #ecfdf5;
            color: #166534;
            border: 1px solid #bbf7d0;
        }

        .alert-error {
            background: #fef2f2;
            color: #991b1b;
            border: 1px solid #fecaca;
        }

        .error-text {
            display: block;
            margin-top: 6px;
            color: #dc2626;
            font-size: 12px;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            color: #9ca3af;
            font-size: 12px;
        }
    </style>
</head>

<body>

<div class="login-container">

    <div class="login-card">

        <div class="logo">
            SA
        </div>

        <h1 class="title">SAPA</h1>

        <p class="subtitle">
            Sistem Aplikasi Pemakaian Aula
        </p>

        {{-- Pesan sukses --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if($errors->any())
            <div class="alert alert-error">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">

            @csrf

            <div class="form-group">
                <label for="email">
                    Email
                </label>

                <input
                    type="email"
                    id="email"
                    name="email"
                    value="{{ old('email') }}"
                    placeholder="Masukkan email"
                    required
                    autofocus
                >

                @error('email')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <div class="form-group">
                <label for="password">
                    Password
                </label>

                <input
                    type="password"
                    id="password"
                    name="password"
                    placeholder="Masukkan password"
                    required
                >

                @error('password')
                    <span class="error-text">
                        {{ $message }}
                    </span>
                @enderror
            </div>

            <label class="remember">
                <input
                    type="checkbox"
                    name="remember"
                    value="1"
                >

                Ingat saya
            </label>

            <button type="submit" class="btn-login">
                Masuk
            </button>

        </form>

        <div class="register-text">
            Belum memiliki akun?

            <a href="{{ route('register') }}">
                Daftar sekarang
            </a>
        </div>

    </div>

    <div class="footer">
        SAPA &copy; {{ date('Y') }}
    </div>

</div>

</body>
</html>
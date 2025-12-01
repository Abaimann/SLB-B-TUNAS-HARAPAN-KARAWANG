<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/Icon.png') }}">
    <title>Login Admin SLB-B Tunas Harapan Karawang</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons (WAJIB UNTUK ICON MATA) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            background: linear-gradient(to bottom right, #d3eaff, #b8dcff);
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            width: 100%;
            max-width: 450px;
        }

        .login-card {
            background: #fff;
            padding: 35px;
            border-radius: 14px;
            box-shadow: 0 6px 25px rgba(0,0,0,0.08);
        }

        .form-control:focus {
            border-color: #42a5f5;
            box-shadow: none;
        }

        .btn-login {
            background-color: #42a5f5;
            border: none;
            font-weight: bold;
            padding: 10px;
        }

        .btn-login:hover {
            background-color: #1e88e5;
        }

        .password-wrapper {
            position: relative;
        }

        .toggle-eye {
            position: absolute;
            right: 14px;
            top: 70%;
            transform: translateY(-50%);
            cursor: pointer;
            opacity: 0.6;
        }

        .logo-img {
            width: 95px;
            margin-bottom: 10px;
        }
    </style>

</head>
<body>

<div class="login-container">
    <div class="login-card">

        <div class="text-center mb-3">
            <img src="{{ asset('assets/img/Icon.png') }}" class="logo-img" alt="Logo Sekolah">

            <h4 class="fw-bold">SLB B Tunas Harapan Karawang</h4>
            <p class="text-muted">Silakan login untuk masuk ke dashboard admin</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- EMAIL -->
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input
                    type="email"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                    placeholder="Masukkan email"
                    required
                >
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- PASSWORD -->
            <div class="mb-3 password-wrapper">
                <label class="form-label">Password</label>

                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control @error('password') is-invalid @enderror"
                    placeholder="Masukkan password"
                    required
                >

                <!-- Mata tutup/buka -->
                <span class="toggle-eye" onclick="togglePassword()">
                    <i id="eyeIcon" class="bi bi-eye-slash"></i>
                </span>

                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <!-- REMEMBER -->
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>

            <button class="btn btn-login w-100 text-white">Login</button>

        </form>
    </div>
</div>

<!-- SCRIPT MATA BUKA/TUTUP -->
<script>
    function togglePassword() {
        const input = document.getElementById("password");
        const icon = document.getElementById("eyeIcon");

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
</script>

</body>
</html>
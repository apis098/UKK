<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamstechnologies.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:09:38 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>Preskool - Login</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">

    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/feather/feather.css') }}">

    <!-- Pe7 CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/icons/flags/flags.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">

    {{-- izitoast --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    {{-- end izitoast --}}
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('/img/login.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Selamat datang di Educlass</h1>
                            <p class="account-subtitle">Belum punya akun? <a href="/register">register disini</a></p>
                            <h2>Sign in</h2>
                            <!-- Form -->
                            <form method="POST" action="{{ route('loginAction') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" type="email" id="email" name="email">
                                    <span class="profile-views"><i class="fas fa-solid fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" type="text" name="password" id="password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="forgotpass">
                                    <div class="remember-me">
                                        <label class="custom_check mr-2 mb-0 d-inline-flex remember-me"> Ingat saya
                                            <input type="checkbox" name="radio">
                                            <span class="checkmark"></span>
                                        </label>
                                    </div>
                                    @if (Route::has('password.request'))
                                        <a href="{{ route('password.request') }}">Lupa sandi?</a>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Login</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">Atau</span>
                            </div>

                            <!-- Social Login -->
                            <div class="text-center">
                                <a href="{{ route('redirect.google') }}" class="btn btn-primary btn-block">Lanjutkan
                                    Dengan Google <i class="fab fa-google-plus-g"></i></a>
                            </div>
                            <!-- /Social Login -->

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Main Wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('/js/feather.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('/js/script.js') }}"></script>
    <script>
        @if (session('success'))
            iziToast.success({
                title: 'Sukses',
                message: '{{ session('success') }}',
                position: 'topCenter'
            });
        @endif
        @if ($errors->any())
             iziToast.error({
                title: 'Sukses',
                message: '{{ $errors->first() }}',
                position: 'topCenter'
            });
        @endif
        @if (session('error'))
            iziToast.error({
                title: 'Gagal',
                message: '{{ session('error') }}',
                position: 'topCenter'
            });
        @endif
    </script>
</body>

<!-- Mirrored from preschool.dreamstechnologies.com/template/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:09:39 GMT -->

</html>

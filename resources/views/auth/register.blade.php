<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamstechnologies.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('/img/logo-small.png') }}">


    <!-- Fontfamily -->
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;0,900;1,400;1,500;1,700&amp;display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('/css/bootstrap.min.css') }}">

    <!-- Feathericon CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/feather/feather.css') }}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/plugins/fontawesome/css/all.min.css') }}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>

    <!-- Main Wrapper -->
    <div class="main-wrapper login-body">
        <div class="login-wrapper">
            <div class="container">
                <div class="loginbox">
                    <div class="login-left">
                        <img class="img-fluid" src="{{ asset('/img/login2.png') }}" alt="Logo">
                    </div>
                    <div class="login-right">
                        <div class="login-right-wrap">
                            <h1>Daftar</h1>
                            <p class="account-subtitle">Masukkan kridensial untuk membuat akun</p>

                            <!-- Form -->
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username <span class="login-danger">*</span></label>
                                    <input class="form-control" name="name" id="name" type="text">
                                    <span class="profile-views"><i class="fas fa-solid fa-user"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="login-danger">*</span></label>
                                    <input class="form-control" name="email" id="email" type="text">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <label>Password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-input" name="password" type="password">
                                    <span class="profile-views feather-eye toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <label>Konfirmasi password <span class="login-danger">*</span></label>
                                    <input class="form-control pass-confirm" name="password_confirmation"
                                        id="password_confirmation" type="password">
                                    <span class="profile-views feather-eye reg-toggle-password"></span>
                                </div>
                                <div class=" dont-have">Already Registered? <a href="/login">Login</a></div>
                                <div class="form-group mb-0">
                                    <button class="btn btn-primary btn-block" type="submit">Register</button>
                                </div>
                            </form>
                            <!-- /Form -->

                            <div class="login-or">
                                <span class="or-line"></span>
                                <span class="span-or">Atau</span>
                            </div>

                            <!-- Social Login -->
                            <div class="text-center">
                                <a href="{{ route('redirect.google') }}" class="btn btn-primary btn-block"> <i
                                        class="fab fa-google"></i> Lanjutkan Dengan Google</a>
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

    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('/js/feather.min.js') }}"></script>

    <!-- Custom JS -->
    <script src="{{ asset('/js/script.js') }}"></script>

</body>

<!-- Mirrored from preschool.dreamstechnologies.com/template/register.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->

</html>

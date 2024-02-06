<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from preschool.dreamstechnologies.com/template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <title>{{config('app.name','Laravel')}}</title>

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

    <!-- Pe7 CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/icons/flags/flags.css') }}">

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
                            <h1>Reset Password</h1>
                            <p class="account-subtitle">Kami bisa membantumu mengatur ulang sandi</p>
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <!-- Form -->
                            <form action="{{route('password.email')}}" method="POST">
								@csrf
                                <div class="form-group">
                                    <label>Masukkan email yang tertaut <span
                                            class="login-danger">*</span></label>
                                    <input class="form-control" type="email" name="email" id="email" @error('email') is-invalid @enderror value="{{old('email')}}">
                                    <span class="profile-views"><i class="fas fa-envelope"></i></span>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-primary btn-block" type="submit">Kirim</button>
                                </div>
                                <div class="form-group mb-0">
                                    <a href="/login" class="btn btn-primary primary-reset btn-block" >Login</a>
                                </div>
                            </form>
                            <!-- /Form -->

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

</body>

<!-- Mirrored from preschool.dreamstechnologies.com/template/forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 03 Feb 2024 17:10:51 GMT -->

</html>

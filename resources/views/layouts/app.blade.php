<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

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
    <!-- Wizard CSS -->
    <link rel="stylesheet" href="{{ asset('/plugins/twitter-bootstrap-wizard/form-wizard.css') }}">
    {{-- izitoast --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/izitoast/dist/css/iziToast.min.css">
    <script src="https://cdn.jsdelivr.net/npm/izitoast/dist/js/iziToast.min.js"></script>
    {{-- end izitoast --}}
</head>

<body>
    <div class="main-wrapper">
        @include('layouts.nav')
        @include('layouts.sidebar')
        @yield('content')
        @include('layouts.modal')
    </div>
    <!-- /Main Wrapper -->
    
    <!-- jQuery -->
    <script src="{{ asset('/js/jquery-3.7.1.min.js') }}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ asset('/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ asset('/js/feather.min.js') }}"></script>
    <!-- Slimscroll JS -->
    <script src="{{ asset('/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>
    <!-- Chart JS -->
    <script src="{{ asset('/plugins/apexchart/apexcharts.min.js') }}"></script>
    <script src="{{ asset('/plugins/apexchart/chart-data.js') }}"></script>
    <!-- Custom JS -->
    <script src="{{ asset('/js/script.js') }}"></script>
    <!-- Wizard JS -->
    <script src="{{ asset('/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js') }}"></script>
    <script src="{{ asset('/plugins/twitter-bootstrap-wizard/prettify.js') }}"></script>
    <script src="{{ asset('/plugins/twitter-bootstrap-wizard/form-wizard.js') }}"></script>
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
                title: 'Gagal',
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

</html>

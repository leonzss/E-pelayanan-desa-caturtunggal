@if (Session::get('kades') == true)

    <script>
        window.location.href = "/kepaladesa/beranda";

    </script>

@elseif (Session::get('rw') == true)

    <script>
        window.location.href = "/rw/beranda";

    </script>

@elseif (Session::get('rt') == true)

    <script>
        window.location.href = "/rt/beranda";

    </script>

@elseif (Session::get('verifikator') == true)

    <script>
        window.location.href = "/verifikator/beranda";

    </script>

@elseif (Session::get('masyarakat') == true)

    <script>
        window.location.href = "/masyarakat/beranda";

    </script>

@elseif (Session::get('admin') == true)

    <script>
        window.location.href = "/admin/beranda";

    </script>


@endif

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="assets/img/logo_small.png">

    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/login.css?v=1">
    <link rel="stylesheet" href="assets/css/register.css?v=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/css/all.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;700&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    >@yield('title')
</head>

<body>

    <!-- Navbar -->
    @yield('nav')
    <!-- End of Navbar -->

    @yield('content')

    <!-- JS -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/all.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="assets/js/script.js"></script>
    @yield('script')

</body>

</html>

@if (Session::get('kades') == false)

    <script>
        window.location.href = "/login";

    </script>

@endif


<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewpoKADES" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shoKADEScut icon" href="../../assets/img/logo_small.png">

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/main.css?v=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../assets/css/all.css">
    <!-- Google Font -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lora:wght@400;500;700&family=Montserrat:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.7/css/responsive.bootstrap4.min.css">

    <title>e-Pelayanan - KADES</title>
</head>

<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="../../assets/img/logoSleman.png" width="236" height="77" class="d-inline-block align-top"
                    alt="logoSleman">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto text-uppercase">
                    @yield('nav')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('daftar_pengajuan_kades') }}">Pengajuan Surat</a>
                            <a class="dropdown-item" href="{{ route('daftar_pengaduan_kades') }}">Pengaduan Layanan</a>
                            <a class="dropdown-item" href="{{ route('daftar_penduduk_kades') }}">Data Penduduk Desa Caturtunggal</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav text-uppercase">
                    @yield('notifikasi')
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Session::get('username') }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">KADES</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    @yield('content')

    <!-- JS -->
    <script src="../../assets/js/jquery-3.5.1.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/bootstrap.js"></script>
    <script src="../../assets/js/all.js"></script>

    <!-- Datatable -->
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.7/js/responsive.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ekko-lightbox/5.3.0/ekko-lightbox.js" crossorigin="anonymous">
    </script>
    <script src="../../assets/js/script.js"></script>

    @yield('script')

</body>

</html>

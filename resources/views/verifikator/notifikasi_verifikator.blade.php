@extends('layout.verifikator')

@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('verifikator.home') }}">Beranda</a>
    </li>

@endsection

@section('content')
</br></br>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light py-4">
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
                    <li class="nav-item ">
                        <a class="nav-link" href="beranda.html">Beranda</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Layanan
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="daftar_masyarakat.html">User (Masyarakat)</a>
                            <a class="dropdown-item" href="daftar_pengajuan.html">Pengajuan Surat (Masyarakat)</a>
                            <a class="dropdown-item" href="daftar_pengaduan.html">Pengaduan Layanan (Masyarakat)</a>
                        </div>
                    </li>
                </ul>
                <ul class="navbar-nav text-uppercase">
                    <li class="nav-item active">
                        <a class="nav-link" href="notifikasi_verifikator.html"><i class="fas fa-bell"></i> <span
                                class="badge badge-pill badge-core">10+</span></a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            akun
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item">verifikator</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="../../index.html">Logout</a>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
    </nav>
    <!-- End of Navbar -->

    <section class="card-feature">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Info User Baru</h5>
                        <div class="card-body">
                            Terdapat (5) user baru yang perlu diverifikasi
                        </div>
                        <div class="card-footer py-4">
                            <a href="verifikasi_masyarakat.html" class="btn btn-core btn-block">Lanjut Periksa</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Info Pengajuan surat</h5>
                        <div class="card-body">
                            Terdapat (5) pengajuan surat yang perlu diperiksa
                        </div>
                        <div class="card-footer py-4">
                            <a href="verifikasi_pengajuan.html" class="btn btn-core btn-block">Lanjut Periksa</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Info Pengaduan layanan</h5>
                        <div class="card-body">
                            Terdapat (5) pengaduan layanan yang perlu diperiksa
                        </div>
                        <div class="card-footer py-4">
                            <a href="verifikasi_pengaduan.html" class="btn btn-core btn-block">Lanjut Periksa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection

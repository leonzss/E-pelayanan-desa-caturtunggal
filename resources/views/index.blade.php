@extends('layout.landing')


@section('nav')
    <li class="nav-item">
        <a class="nav-link active" href="{{ route('landing') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profil') }}">Profil</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('informasi') }}">Informasi</a>
    </li>
    <li class="nav-item">
        <a class="nav-link btn btn-core" href="{{ route('login') }}">masuk</a>
    </li>

@endsection
@section('content')
    <!-- Header -->
    <section class="header">
    <img src="assets/img/banner0.png" width="100%" height="100%" alt="banner">
        </br></br></br></br>
    <!-- <img src="assets/img/banner1.png" weidth="600px" height="544px" alt="Hero Image"> -->
    <!-- <img src="assets/img/banner6.jpg" alt="Hero Image"> -->
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-5">
                    <h1>lebih praktis <br> dengan <span>e-Pelayanan</span></h1>
                    <p>Gunakan layanan dari aplikasi e-Pelayanan untuk mengajukan surat - menyurat atau melakukan pengaduan
                        dengan mudah dan cepat.</p>

                    <div class="row justify-content-xl-start justify-content-center">
                        <div class="col-6 col-sm-5">
                            <a href="{{ route('login') }}" class="btn btn-core btn-block">Masuk</a>
                        </div>
                        <div class="col-6 col-sm-5">
                            <a href="{{ route('register') }}" class="btn btn-second-outline btn-block">Buat Akun</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 d-none d-lg-block">
                    <img src="assets/img/hero-image.png" class="img-fluid" alt="Hero Image">
                </div>
            </div>
        </div>
    </section>

    <!-- feature -->
    <section class="feature">
        <div class="container">
            <div class="row mb-5 text-center">
                <div class="col">
                    <h2>Fitur e-Pelayanan</h2>
                    <p>Dengan fitur dari e-Pelayanan, masyarakat dapat lebih menghemat waktu dalam mengurus berkas</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-4 d-none d-sm-block">
                            <img src="assets/img/fitur-1.png" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5>Pengajuan Surat</h5>
                            <p>Masyarakat dapat membuat surat dengan mengisi form pengajuan online.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row d-flex align-items-center">
                        <div class="col-sm-4 d-none d-sm-block">
                            <img src="assets/img/fitur-2.png" class="img-fluid">
                        </div>
                        <div class="col-sm-8">
                            <h5>Pengaduan Layanan</h5>
                            <p>Masyarakat dapat membuat laporan pengaduan layanan secara online.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of feature -->

    <!-- step -->
    <section class="step">
        <div class="container">
            <div class="row mb-3 text-center">
                <div class="col">
                    <h2>Langkah Mudah Mengajukan Surat</h2>
                    <p>Silahkan ikuti langkah yang sudah kami siapkan untuk mengajukan surat.</p>
                </div>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-1.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Login Akun</h5>
                            <p>Silahkan login sebagai masyarakat dengan akun yang sudah diverifikasi</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-2.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Pilih Pengajuan</h5>
                            <p>Silahkan pilih surat yang ingin diajukan dan lampirkan file sesuai persyaratan</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-3.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Tunggu Hasilnya</h5>
                            <p>Silahkan tunggu hasil pengajuan surat dan cek track record secara berkala</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End of step -->

    <!-- step -->
    <section class="step">
        <div class="container">
            <div class="row mb-3 text-center">
                <div class="col">
                    <h2>Langkah Mudah Mengadukan pelayanan</h2>
                    <p>Silahkan ikuti langkah yang sudah kami siapkan untuk mengadukan pelayanan.</p>
                </div>
            </div>
            <div class="row text-center">

                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-1.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Login Akun</h5>
                            <p>Silahkan login sebagai masyarakat dengan akun yang sudah diverifikasi</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-4.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Pilih Pengaduan</h5>
                            <p>Silahkan isi formulir pengaduan berupa detail, tanggal, dan lokasi dari kejadian</p>
                        </figcaption>
                    </figure>
                </div>
                <div class="col-md-4">
                    <figure class="figure bg-white">
                        <img src="assets/img/step-3.png" class="figure-img img-fluid" alt="...">
                        <figcaption class="figure-caption">
                            <h5>Tunggu Hasilnya</h5>
                            <p>Silahkan tunggu hasil pengajuan surat dan cek track record secara berkala</p>
                        </figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>
    <!-- End of step -->
    <!-- footer -->
    <footer class="border-top p-5">
        <div class="container">
            <div class="row text-center mt-3">
                <div class="col text-light">
                    <p>Copyright &copy; 2023 &mdash; e-Pelayanan | All right reserved.</p>
                </div>
            </div>
        </div>
    </footer>
    <!-- End of Footer -->
@endsection

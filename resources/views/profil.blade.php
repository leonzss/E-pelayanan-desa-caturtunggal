@extends('layout.landing')


@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('landing') }}">Beranda</a>
    </li>
    <li class="nav-item active">
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
        <div class="container">
            <div class="row d-flex align-items-center">
                <div class="col-xl-12 text-center">
                    <h1><span>PROFIL</span></h1>
                    <p>Temukan informasi mengenai Profil Kelurahan Caturtunggal.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End of Header -->

    <section class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-body">

                            <!-- <img src="../assets/img/daerah.png" alt="" class="img-fluid mb-4" width="100%"> -->

                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left" type="button"
                                                data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                                                aria-controls="collapseOne">
                                                Profil Instansi
                                            </button>
                                        </h2>
                                    </div>

                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <strong>Nama Instansi:</strong> <br> Kantor Kelurahan Caturtunggal <br><br>
                                            <strong>Alamat:</strong> <br> Jl. Kasuari No.2 Demangan Baru, Tj. Kecamatan Depok, Kabupaten Sleman, D.I. Yogyakarta
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Visi & Misi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            <strong>VISI & MISI:</strong> <br> Agar pelaksanaan kegiatan penyelenggaraan Pemerintahan Kalurahan dapat terlaksana dengan baik dan terarah perlu dicapai dengan rencana Strategis Kalurahan, 
                                            yaitu dengan menyusun Rencana Pembangunan Jangka Menengah Tahun 2021 s/d 2026, yang dijabarkan setiap tahun dalam wujud Kegiatan baik Fisik maupun nonfisik yang dituangkan dalam Rencana Kerja Pembangunan Desa (RKP Desa) tahunan yang ditetapkan dengan Keputusan Lurah.
                                            Visi dan Misi Kalurahan merupakan implementasi dari Visi dan Misi Lurah terpilih dengan beberapa penambahan kegiatan yang disusun/digali berdasarkan musyawarah Kalurahan secara partisipatif. <br><br>
                                            <strong>VISI DESA:</strong> <br> Mempertahankan Pemerintah Kalurahan yang kuat dan masyarakat yang maju melalui peningkatan kinerja Pemerintahan Kalurahan yang bersih dan bertanggungjawab, peningkatan system pelayanan umum, pembangunan yang berkesinambungan dan berkeadilan berlandaskan potensi dan budaya <br><br>
                                            <strong>MISI DESA:</strong> <br>
                                            <ul>
                                                <li>
                                                    Meningkatkan kinerja Pemerintah Kalurahan Caturtunggal 
                                                    dan meningkatkan sistem pelayanan umum yang lebih baik, cepat, ramah, 
                                                    terjangkau, berkeadilan dan transparan.
                                                </li>
                                                <li>
                                                    Meningkatkan dan mengembangkan program Tri Daya Pembangunan meliputi :
                                                        <br> &nbsp; &nbsp; &nbsp;a. Bidang Sosial, Budaya dan Pendidikan
                                                        <br> &nbsp; &nbsp; &nbsp;b. Bidang Ekonomi
                                                        <br> &nbsp; &nbsp; &nbsp;c. Bidang Kesehatan dan Lingkungan
                                                </li>
                                                <li>
                                                    Meningkatkan potensi kelompok-kelompok berbagai bidang yang ada di Kalurahan Caturtunggal.
                                                </li>
                                                <li>
                                                    Meningkatkan koordinasi dan kerjasama dengan instansi atau Pemerintah Daerah.
                                                </li>
                                                <li>
                                                    Mengembangkan jaringan kerjasama dengan pihak-pihak lain untuk mendukung proses pembangunan di Kalurahan Caturtunggal.
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="btn btn-link btn-block text-left collapsed" type="button"
                                                data-toggle="collapse" data-target="#collapseThree" aria-expanded="false"
                                                aria-controls="collapseThree">
                                                Struktur Organisasi
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                        <img src="assets/img/Struktur.jpg" width="1000" height="800" class="d-inline-block align-top" alt="STRUKTUR">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

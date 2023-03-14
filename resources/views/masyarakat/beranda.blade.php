@extends('layout.masyarakat')

@section('nav')

    <li class="nav-item active">
        <a class="nav-link" href="{{ route('masyarakat.home') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengajuan_surat') }}">Pengajuan</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengaduan_layanan') }}">Pengaduan</a>
    </li>

@endsection

@section('content')
</br></br>
    <section class="slider">
        <div class="container">
            @if (count($berita) != 0)
                <div id="carouselExampleControls" class="carousel slide mt-5" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="container">

                            @foreach ($berita as $data)

                                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                                    <div class="row p-5 justify-content-center d-flex align-items-center">
                                        <div class="col-lg-4 text-center">
                                            <img src="{{ Storage::url('img/' . $data->gambar) }}" class="figure-img img-fluid"
                                                alt="...">
                                        </div>
                                        <div class="col-lg-6">
                                            <h4 class="mb-3">{{ $data->judul_berita }}</h4>
                                            <p class="mb-2">{{ Str::limit($data->detail_berita, 100, '...') }}
                                                @if (Str::length($data->detail_berita) >= 100)
                                                    <a href="#" aria-pressed="true" data-toggle="modal"
                                                        data-target="#Selengkapnya{{ $data->id }}">Selengkapnya</a>
                                                @endif
                                            </p>
                                            <div class="modal fade" id="Selengkapnya{{ $data->id }}" tabindex="-1"
                                                aria-labelledby="SelengkapnyaLabel" aria-hidden="true">
                                                <div class="modal-dialog modal-xl text-left">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title mb-0" id="SelengkapnyaLabel">
                                                                {{ $data->judul_berita }}</h5>
                                                            <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                            </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $data->detail_berita }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            @endforeach

                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            @endif
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row mb-2">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Langkah Pengajuan Surat</h5>
                        <div class="card-body pb-0">
                            <div id="accordion">
                                <div class="card" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanSatu">
                                        <a class="btn btn-link btn-block text-left accordion-link-custom"
                                            data-toggle="collapse" data-target="#collapsePengajuanSatu" aria-expanded="true"
                                            aria-controls="collapsePengajuanSatu">
                                            1) Langkah Pertama
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanSatu" class="collapse pt-2" aria-labelledby="pengajuanSatu"
                                        data-parent="#accordion">
                                        Pilih menu pengajuan pada navbar
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanDua">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengajuanDua" aria-expanded="true"
                                            aria-controls="collapsePengajuanDua">
                                            2) Langkah Kedua
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanDua" class="collapse pt-2" aria-labelledby="pengajuanDua"
                                        data-parent="#accordion">
                                        Isi formulir pengajuan surat. pilih surat kemudian lampirkan file sesuai kebutuhan,
                                        kemudian klik tombol buat pengajuan surat.
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengajuanTiga">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengajuanTiga" aria-expanded="true"
                                            aria-controls="collapsePengajuanTiga">
                                            3) Langkah Ketiga
                                        </a>
                                    </h5>
                                    <div id="collapsePengajuanTiga" class="collapse pt-2" aria-labelledby="pengajuanTiga"
                                        data-parent="#accordion">
                                        status pengajuan surat akan muncul dibagian daftar pengajuan surat. kemudian untuk
                                        melihat proses dari pengajuan surat dapat melihat pada bagian track record pengajuan
                                        surat.
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <a href="{{ route('pengajuan_surat') }}" class="btn btn-core btn-block">Lakukan Pengajuan
                                Surat</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Langkah Pengaduan Layanan</h5>
                        <div class="card-body pb-0">
                            <div id="accordion2">
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengaduanSatu">
                                        <a class="btn btn-link btn-block text-left accordion-link-custom"
                                            data-toggle="collapse" data-target="#collapsePengaduanSatu" aria-expanded="true"
                                            aria-controls="collapsePengaduanSatu">
                                            1) Langkah Pertama
                                        </a>
                                    </h5>
                                    <div id="collapsePengaduanSatu" class="collapse pt-2" aria-labelledby="pengaduan"
                                        data-parent="#accordion2">
                                        Pilih menu pengaduan pada navbar
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengaduanDua">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengaduanDua" aria-expanded="true"
                                            aria-controls="collapsePengaduanDua">
                                            2) Langkah Kedua
                                        </a>
                                    </h5>
                                    <div id="collapsePengaduanDua" class="collapse pt-2" aria-labelledby="pengaduanDua"
                                        data-parent="#accordion2">
                                        isi formulir pengaduan layanan. Silahkan isi judul pengaduan, detail kejadian, waktu
                                        kejadian, dan lokasi kejadian.
                                    </div>
                                </div>
                                <div class="card mb-0" style="border: none;">
                                    <h5 class="mb-0" id="pengaduanTiga">
                                        <a class="btn btn-link accordion-link-custom" data-toggle="collapse"
                                            data-target="#collapsePengaduanTiga" aria-expanded="true"
                                            aria-controls="collapsePengaduanTiga">
                                            3) Langkah Ketiga
                                        </a>
                                    </h5>
                                    <div id="collapsePengaduanTiga" class="collapse pt-2" aria-labelledby="pengaduanTiga"
                                        data-parent="#accordion2">
                                        setelah formuli diisi, pengaduan layanan akan tampil pada bagian daftar pengaduan
                                        layanan
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer py-4">
                            <a href="{{ route('pengaduan_layanan') }}" class="btn btn-core btn-block">Lakukan Pengaduan
                                Layanan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('script')

    @if ($message = Session::get('success'))
        <script>
            swal("{{ $message }}", " ", "success");

        </script>

    @elseif($message = Session::get('duplicate'))

        <script>
            swal("{{ $message }}", " ", "error");

        </script>

    @endif

@endsection

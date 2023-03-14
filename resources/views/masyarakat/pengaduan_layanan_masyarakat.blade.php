@extends('layout.masyarakat')

@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('masyarakat.home') }}">Beranda</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ route('pengajuan_surat') }}">Pengajuan</a>
    </li>
    <li class="nav-item active">
        <a class="nav-link" href="{{ route('pengaduan_layanan') }}">Pengaduan</a>
    </li>

@endsection

@section('content')
</br></br>
    <section class="card-feature">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Formulir Pengaduan Layanan</h5>
                        <div class="card-body">
                            <form method="POST" action="{{ route('pengaduanproses') }}">
                                @csrf

                                <input type="hidden" class="form-control" id="created_by" name="created_by"
                                    value=" {{ Session::get('id') }}">

                                <div class="form-group">
                                    <label for="waktu_kejadian">Judul Pengaduan</label>
                                    <input type="text" class="form-control" id="judul_pengaduan" name="judul_pengaduan">
                                </div>
                                <div class="form-group">
                                    <label for="detail_kejadian">Detail Kejadian</label>
                                    <textarea class="form-control" id="detail_kejadian" name="detail_pengaduan"
                                        rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="created_date">Waktu Kejadian</label>
                                    <input type="datetime-local" class="form-control" id="waktu_kejadian"
                                        name="waktu_kejadian" min="2022-01-07T00:00" max="3000-01-14T00:00">
                                </div>
                                <div class="form-group">
                                    <label for="lokasi_kejadian">Lokasi Kejadian</label>
                                    <textarea class="form-control" id="lokasi_kejadian" name="lokasi_kejadian"
                                        rows="3"></textarea>
                                </div>

                                <button type="submit" class="btn btn-core btn-block">Buat Pengaduan</button>

                            </form>
                        </div>

                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Daftar Pengaduan Layanan</h5>
                                <div class="card-body">
                                    @php
                                        $jumlahpengaduan = 0;
                                    @endphp
                                    @foreach ($pengaduan as $data)
                                        @if ($data->user_id == Session::get('id'))
                                            @php
                                                $jumlahpengaduan++;
                                            @endphp
                                            <div class="row mb-4">
                                                <div class="col-6">
                                                    <a href="#" class="card-link text-style text-dark">
                                                        {{ $data->judul_pengaduan }}
                                                        <br>
                                                        <small
                                                            class="text-muted">{{ $data->created_date->format('d-F-Y') }}</small>
                                                    </a>
                                                </div>

                                                <div class="col-6 text-right">
                                                    <a href="#" class="card-link text-style text-dark">
                                                        Status {{ $data->status }}
                                                    </a>
                                                </div>
                                            </div>

                                        @endif
                                    @endforeach

                                    @if ($jumlahpengaduan == 0)
                                        <p>Belum ada data pengaduan</p>
                                    @endif

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

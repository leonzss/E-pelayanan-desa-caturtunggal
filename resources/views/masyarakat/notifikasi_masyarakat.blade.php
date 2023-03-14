@extends('layout.masyarakat')

@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('masyarakat.home') }}">Beranda</a>
    </li>

@endsection

@section('content')
</br></br>
    <section class="card-feature">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Info Pengajuan Surat</h5>
                        <div class="card-body">
                            Pengajuan Surat telah diverifikasi oleh verifikator
                        </div>
                        <div class="card-footer py-4">
                            <a href="pengajuan_surat_masyarakat.html" class="btn btn-core btn-block">Lanjut Periksa</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

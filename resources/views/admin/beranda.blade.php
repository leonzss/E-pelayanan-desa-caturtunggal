@extends('layout.admin')

@section('nav')
    <ul class="navbar-nav mx-auto text-uppercase">
        <!-- <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">Beranda</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('daftar_informasi') }}">Daftar Informasi</a>
        </li> -->
    </ul>
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
    @error('gambar')
    <div class="alert alert-danger text-center">{{ "Mohon periksa ekstensi dan ukuran file" }}</div>
@enderror
    <section>
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <div class="card-header">
                            <div class="row d-flex align-items-center">
                                <div class="col-lg-6">
                                    <h5>Daftar Informasi</h5>
                                </div>
                                <div class="col-lg-6 text-right">
                                    <a class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal"
                                        data-target="#exampleModal">Tambah Artikel</a>
                                    <div class="modal fade" id="exampleModal" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Tambah Informasi
                                                        (Artikel)</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row">
                                                        <div class="col-md-12 text-left">
                                                            <div class="card shadow-sm">
                                                                <div class="card-body">

                                                                    <form method="POST"
                                                                        action="{{ route('tambah_informasi') }}"
                                                                        enctype="multipart/form-data">
                                                                        @csrf
                                                                        <input type="hidden" class="form-control"
                                                                            id="created_by" name="created_by"
                                                                            value=" {{ Session::get('id') }}">
                                                                        <div class="form-group">
                                                                            <label for="gambar_artikel">Gambar
                                                                                Artikel</label>
                                                                            <div class="custom-file">
                                                                                <input type="file" class="custom-file-input  @error('gambar') is-invalid @enderror"
                                                                                    id="gambar_artikel" name="gambar"
                                                                                    required>
                                                                                  
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Pilih File</label>
                                                                            </div>
                                                                            <p class="font-weight-normal mt-2">File .png
                                                                                ukuran maks. 2 MB - Resolusi gambar
                                                                                <strong>(400px X 300px)</strong></p>

                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="judul_artikel">Judul Artikel</label>
                                                                            <input type="text" class="form-control"
                                                                                id="judul_artikel" name="judul_berita"
                                                                                required>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="deskripsi_artikel">Deskripsi
                                                                                Artikel</label>
                                                                            <textarea class="form-control"
                                                                                id="deskripsi_artikel" name="detail_berita"
                                                                                rows="10" required></textarea>
                                                                        </div>
                                                                        <div class="card-footer py-4">
                                                                            <button href="#"
                                                                                class="btn btn-core btn-block first">Tambah
                                                                                Artikel</button>
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered data-table">
                                <thead>
                                    <tr>
                                        <th>no</th>
                                        <th>Judul Artikel</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            @foreach ($beritaberanda as $data)

                                <div class="modal fade" id="Modal-{{ $data->id }}" tabindex="-1"
                                    aria-labelledby="DetailLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Artikel (Informasi)
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body  table-responsive">
                                                                <table class="table table-bordered" style="width:100%">
                                                                    <tbody>

                                                                       
                                                                        <tr>
                                                                            <td>Judul Artikel</td>
                                                                            <td>{{ $data->judul_berita }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Deskripsi Artikel</td>
                                                                            <td>{{ $data->detail_berita }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tanggal Post</td>
                                                                            <td>{{ $data->tanggal_post }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
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
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('daftar_informasi') }}",
                columns: [
                    
                    {
                        data: 'id',
                        name: 'no'
                    },
                    {
                        data: 'judul_berita',
                        name: 'judul_berita'
                    },

                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    "targets": 2, // your case first column
                    "className": "text-center",
                    "width": "300",

                },
                {
                    "targets": 0,
                    "visible": false,
                } ],
            });
        });

    </script>
@endsection

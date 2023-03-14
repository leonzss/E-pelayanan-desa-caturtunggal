@extends('layout.admin')

@section('nav')

    <ul class="navbar-nav mx-auto text-uppercase">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.home') }}">Beranda</a>
        </li>
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('daftar_informasi') }}">Daftar Informasi</a>
        </li>
    </ul>

@endsection

@section('content')
</br></br>
    <section class="card-feature">
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
                                                                                <input type="file" class="custom-file-input"
                                                                                    id="gambar_artikel" name="gambar">
                                                                                <label class="custom-file-label"
                                                                                    for="customFile">Pilih File</label>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="judul_artikel">Judul Artikel</label>
                                                                            <input type="text" class="form-control"
                                                                                id="judul_artikel" name="judul_berita">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="deskripsi_artikel">Deskripsi
                                                                                Artikel</label>
                                                                            <textarea class="form-control"
                                                                                id="deskripsi_artikel" name="detail_berita"
                                                                                rows="10"></textarea>
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
                                        <th>Judul Artikel</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>


                                </tbody>
                            </table>
                            @foreach ($berita as $data)


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
                columns: [{
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
                    "targets": 1, // your case first column
                    "className": "text-center",
                    "width": "300",

                }, ],
            });



        });

    </script>
@endsection

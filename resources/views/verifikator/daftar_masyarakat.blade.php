@extends('layout.verifikator')

@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('verifikator.home') }}">Beranda</a>
    </li>

@endsection

@section('content')
</br></br>
    <section class="card-feature">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Validasi Akun</h5>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered data-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>
                            </table>
                            @foreach ($users as $data)
                                <div class="modal fade" id="exampleModal-{{ $data->nik->id }}" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-xl">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Detail Data Masyarakat</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <div class="card shadow-sm">
                                                            <div class="card-body table-responsive">
                                                                <table class="table table-bordered" style="width:100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>NIK</td>
                                                                            <td>{{ $data->nik->id_ktp }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama</td>
                                                                            <td>{{ $data->nik->nama }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Alamat</td>
                                                                            <td>{{ $data->nik->alamat }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tempat Lahir</td>
                                                                            <td>{{ $data->nik->tempat_lahir }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Tanggal Lahir</td>
                                                                            <td>{{ $data->nik->tanggal_lahir }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Status Perkawinan</td>
                                                                            <td>{{ $data->nik->status_perkawinan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Pekerjaan</td>
                                                                            <td>{{ $data->nik->pekerjaan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Jenis Kelamin</td>
                                                                            <td>{{ $data->nik->jenis_kelamin }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Dusun</td>
                                                                            <td>{{ $data->nik->dusun }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>RT</td>
                                                                            <td>{{ $data->nik->rt }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>RW</td>
                                                                            <td>{{ $data->nik->rw }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Agama</td>
                                                                            <td>{{ $data->nik->agama }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>KK</td>
                                                                            <td>{{ $data->nik->kk }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kecamatan</td>
                                                                            <td>{{ $data->nik->kecamatan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kelurahan</td>
                                                                            <td>{{ $data->nik->kelurahan }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kabupaten</td>
                                                                            <td>{{ $data->nik->kabupaten }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ayah</td>
                                                                            <td>{{ $data->nik->nama_ayah }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Nama Ibu</td>
                                                                            <td>{{ $data->nik->nama_ibu }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>Kewarganegaraan</td>
                                                                            <td>{{ $data->nik->kewarganegaraan }}</td>
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
                ajax: "{{ route('daftar_masyarakat') }}",
                columns: [{
                        data: 'nik.id_ktp',
                        name: 'nik'
                    },
                    {
                        data: 'username',
                        name: 'username'
                    },

                    {
                        data: 'email',
                        name: 'email'
                    },
                    {
                        data: 'phone',
                        name: 'phone'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    "targets": 4, // your case first column
                    "className": "text-center",

                }, ],
            });



        });
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    </script>
@endsection

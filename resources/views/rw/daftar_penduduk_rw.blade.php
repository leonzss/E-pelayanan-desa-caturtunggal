@extends('layout.rw')

@section('nav')

    <li class="nav-item">
        <a class="nav-link" href="{{ route('rw.home') }}">Beranda</a>
    </li>

@endsection

@section('content')
</br></br>
    <section class="card-feature">
        <div class="container">
            <div class="row mb-2">
                <div class="col-md-12">
                    <div class="card shadow-sm">
                        <h5 class="card-header">Data Penduduk Desa Caturtunggal</h5>
                        <div class="card-body table-responsive">
                            <table class="table table-striped table-bordered data-table" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>NIK</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>No. Telepon</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>KK</th>
                                    </tr>
                                </thead>
                                <tbody>



                                </tbody>
                            </table>
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
                ajax: "{{ route('daftar_penduduk_rw') }}",
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
                        data: 'nik.nama',
                        name: 'nama'
                    },
                    {
                        data: 'nik.alamat',
                        name: 'alamat'
                    },
                    {
                        data: 'nik.tempat_lahir',
                        name: 'tempat_lahir'
                    },
                    {
                        data: 'nik.tanggal_lahir',
                        name: 'tanggal_lahir'
                    },
                    {
                        data: 'nik.kk',
                        name: 'kk'
                    },
                ],
                columnDefs: [{
                    "targets": 8, // your case first column
                    "className": "text-center",

                }, ],
            });



        });

    </script>
@endsection

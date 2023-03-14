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

                    <ul class="nav nav-tabs mb-4" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="butuh-tab" data-toggle="tab" href="#butuh" role="tab"
                                aria-controls="butuh" aria-selected="true">Butuh divalidasi</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="sudah-tab" data-toggle="tab" href="#sudah" role="tab"
                                aria-controls="sudah" aria-selected="false">Sudah divalidasi</a>
                        </li>
                    </ul>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="butuh" role="tabpanel" aria-labelledby="butuh-tab">
                            <div class="card shadow-sm">
                                <h5 class="card-header">Daftar Surat</h5>
                                <div class="card-body">
                                    <table class="table table-striped table-bordered  data-table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>NIK</th>
                                                <th>Jenis Surat</th>
                                                <th>Keterangan</th>
                                                <th>Status</th>
                                                <th class="text-center">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>

                                    </table>
                                    @foreach ($pengajuan as $data)
                                        <div class="modal fade" id="exampleModal-{{ $data->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-xl">
                                                <div class=" modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModal3Label">Verifikasi Pengajuan
                                                        Surat</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row text-left">
                                                        <div class="col-md-12">
                                                            <div class="card shadow-sm">
                                                                @foreach ($data->transworkflow as $data2)
                                                                @endforeach
                                                                @if ($data2->wf_reference_id == '3')
                                                                    <div class="card-header text-center">
                                                                        <div class="row">
                                                                            <div class="col-lg-12">
                                                                                <a href="{{ route('tolakpengajuan_rw', $data2->id) }}"
                                                                                    class="btn btn-sm btn-danger">Tolak
                                                                                    Permintaan</a>
                                                                                <a href="{{ route('terimapengajuan_rw', $data2->id) }}"
                                                                                    class="btn btn-sm btn-core">Terima
                                                                                    Permintaan</a>

                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                @endif
                                                                <div class="card-body table-responsive">
                                                                    <table class="table table-bordered" style="width:100%">
                                                                        <tbody>
                                                                            <tr>
                                                                                <th width="20%">NIK</th>
                                                                                <td width="30%">
                                                                                    {{ $data->user->nik->id_ktp }}</td>
                                                                                <th width="20%">Nama</th>
                                                                                <td width="30%">{{ $data->user->nik->nama }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Alamat</th>
                                                                                <td>{{ $data->user->nik->alamat }}</td>
                                                                                <th>RT</th>
                                                                                <td>{{ $data->user->nik->rt }}</td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>RW</th>
                                                                                <td>{{ $data->user->nik->rw }}</td>
                                                                                <th>Tempat Lahir</th>
                                                                                <td>{{ $data->user->nik->tempat_lahir }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Tanggal Lahir</th>
                                                                                <td>{{ $data->user->nik->tanggal_lahir }}
                                                                                </td>
                                                                                <th>Status Perkawinan</th>
                                                                                <td>{{ $data->user->nik->status_perkawinan }}
                                                                                </td>
                                                                            </tr>

                                                                            <tr>
                                                                                <th>Pekerjaan</th>
                                                                                <td>{{ $data->user->nik->pekerjaan }}</td>
                                                                                <th>Jenis Kelamin</th>
                                                                                <td>{{ $data->user->nik->jenis_kelamin }}
                                                                                </td>
                                                                            </tr>

                                                                            @php
                                                                                $path = Storage::url('img/' . $data->Lampiran_1);
                                                    
                                                                            @endphp
                                                                            <tr>
                                                                                <th>Agama</th>
                                                                                <td>{{ $data->user->nik->agama }}</td>
                                                                                <th style="vertical-align: middle;">Lampiran
                                                                                </th>
                                                                                <td>
                                                                                    <a class="color-pink"
                                                                                        href="{{ url($path) }}"
                                                                                        data-toggle="lightbox"
                                                                                        data-max-width="800"
                                                                                        data-max-height="800">
                                                                                        File Lampiran
                                                                                    </a>
                                                                                </td>
                                                                            </tr>


                                                                            @foreach ($data->transworkflow as $data2)
                                                                            @endforeach
                                                                            <tr class="bg-light">
                                                                                <td colspan="2"><strong> Status Pengajuan
                                                                                        Surat</strong></td>
                                                                                @if ($data2->wf_reference->status == 'Success')
                                                                                    <td colspan="2"
                                                                                        style="color:rgb(24, 163, 24);">
                                                                                        <strong>
                                                                                            {{ $data2->wf_reference->status }}
                                                                                    </td>
                                                                                @elseif($data2->wf_reference->status ==
                                                                                    "Reject")
                                                                                    <td colspan="2" style="color:red;">
                                                                                        <strong>
                                                                                            {{ $data2->wf_reference->status }}
                                                                                    </td>
                                                                                @else
                                                                                    <td colspan="2"><strong>
                                                                                            {{ $data2->wf_reference->status }}
                                                                                    </td>
                                                                                @endif
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
                    <div class="tab-pane fade" id="sudah" role="tabpanel" aria-labelledby="sudah-tab">
                        <div class="card shadow-sm">
                            <h5 class="card-header">Daftar Surat</h5>
                            <div class="card-body">
                                <table class="table table-striped table-bordered  data-table2" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>NIK</th>
                                            <th>Jenis Surat</th>
                                            <th>Status</th>
                                            <th class="text-center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>

                                </table>
                                @foreach ($pengajuan2 as $data2)
                                    <div class="modal fade" id="Modal-{{ $data2->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-xl">
                                                <div class=" modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModal3Label">Detail Pengajuan Surat
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row text-left">
                                                    <div class="col-md-12">
                                                        <div class="card shadow-sm">
                                                            @foreach ($data2->transworkflow as $data3)
                                                            @endforeach
                                                            @if ($data3->wf_reference_id == '3')
                                                                <div class="card-header text-center">
                                                                    <div class="row">
                                                                        <div class="col-lg-12">
                                                                            <a href="{{ route('tolakpengajuan', $data3->id) }}"
                                                                                class="btn btn-sm btn-danger">Tolak
                                                                                Permintaan</a>
                                                                            <a href="{{ route('terimapengajuan', $data3->id) }}"
                                                                                class="btn btn-sm btn-core">Terima
                                                                                Permintaan</a>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endif
                                                            <div class="card-body table-responsive">
                                                                <table class="table table-bordered" style="width:100%">
                                                                    <tbody>
                                                                        <tr>
                                                                            <th width="20%">NIK</th>
                                                                            <td width="30%">{{ $data2->user->nik->id_ktp }}
                                                                            </td>
                                                                            <th width="20%">Nama</th>
                                                                            <td width="30%">{{ $data2->user->nik->nama }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Alamat</th>
                                                                            <td>{{ $data2->user->nik->alamat }}</td>
                                                                            <th>RT</th>
                                                                            <td>{{ $data2->user->nik->rt }}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>RW</th>
                                                                            <td>{{ $data2->user->nik->rw }}</td>
                                                                            <th>Tempat Lahir</th>
                                                                            <td>{{ $data2->user->nik->tempat_lahir }}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Tanggal Lahir</th>
                                                                            <td>{{ $data2->user->nik->tanggal_lahir }}</td>
                                                                            <th>Status Perkawinan</th>
                                                                            <td>{{ $data2->user->nik->status_perkawinan }}
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <th>Pekerjaan</th>
                                                                            <td>{{ $data2->user->nik->pekerjaan }}</td>
                                                                            <th>Jenis Kelamin</th>
                                                                            <td>{{ $data2->user->nik->jenis_kelamin }}</td>
                                                                        </tr>

                                                                        @php
                                                                            $path = Storage::url('img/' . $data2->Lampiran_1);

                                                                        @endphp
                                                                        <tr>
                                                                            <th>Agama</th>
                                                                            <td>{{ $data2->user->nik->agama }}</td>
                                                                            <th style="vertical-align: middle;">Lampiran
                                                                            </th>
                                                                            <td>
                                                                                <a class="color-pink"
                                                                                    href="{{ url($path) }}"
                                                                                    data-toggle="lightbox"
                                                                                    data-max-width="800"
                                                                                    data-max-height="800">
                                                                                    File Lampiran
                                                                                </a>
                                                                            </td>
                                                                        </tr>


                                                                        @foreach ($data2->transworkflow as $data3)
                                                                        @endforeach
                                                                        <tr class="bg-light">
                                                                            <td colspan="2"><strong> Status Pengajuan
                                                                                    Surat</strong></td>
                                                                            @if ($data3->wf_reference->status == 'Success')
                                                                                <td colspan="2"
                                                                                    style="color:rgb(24, 163, 24);"><strong>
                                                                                        {{ $data3->wf_reference->status }}
                                                                                </td>
                                                                            @elseif($data3->wf_reference->status ==
                                                                                "Reject")
                                                                                <td colspan="2" style="color:red;"><strong>
                                                                                        {{ $data3->wf_reference->status }}
                                                                                </td>
                                                                            @else
                                                                                <td colspan="2"><strong>
                                                                                        {{ $data3->wf_reference->status }}
                                                                                </td>
                                                                            @endif
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
                ajax: "{{ route('daftar_pengajuan_rw') }}",
                columns: [{
                        data: 'user.nik.id_ktp',
                        name: 'id_pengajuan'
                    },
                    {
                        data: 'jenis_surat',
                        name: 'jenis_surat'
                    },
                    {
                        data: 'kebutuhan',
                        name: 'kebutuhan'
                    },
                    {
                        data: 'transworkflow[].wf_reference.status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    "targets": 3, // your case first column
                    "className": "text-center",

                }, ],
            });



        });

    </script>
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var table = $('.data-table2').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('daftar_pengajuan2_rw') }}",
                columns: [{
                        data: 'user.nik.id_ktp',
                        name: 'id_pengajuan'
                    },
                    {
                        data: 'jenis_surat',
                        name: 'jenis_surat'
                    },
                    {
                        data: 'transworkflow[].wf_reference.status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
                columnDefs: [{
                    "targets": 3, // your case first column
                    "className": "text-center",

                }, ],
            });



        });

    </script>
    <script>
        $(document).on("click", '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });

    </script>
@endsection

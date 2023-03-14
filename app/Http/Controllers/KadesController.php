<?php

namespace App\Http\Controllers;



use App\Models\Pengaduan;
use App\Models\Pengajuan;
use App\Models\Notifikasi;
use App\Models\TransWorkflow;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Facades\DataTables;

class KadesController extends Controller
{
    public function daftar_penduduk_kades(Request $request)
    {

        $users = User::with('nik')->get();
        if ($request->ajax()) {
            $data = User::with('nik')->where('status', 'Active')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        // return response()->json(['data' => $users]);
        return view('kades.daftar_penduduk_kades', compact('users'));
    }

    public function pengaduan(Request $request)
    {
        $pengaduan = Pengaduan::with('user', 'user.nik')->where('status', 'valid')
            ->where('user_level_id', '2')
            ->get();
        if ($request->ajax()) {
            $data = Pengaduan::with('user', 'user.nik')->where('status', 'valid')
                ->where('user_level_id', '2')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->id_pengaduan . '">Verifikasi Pengaduan</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $pengaduan2 = Pengaduan::with('user', 'user.nik')->where('status', 'close')->get();
        if ($request->ajax()) {
            $data2 = Pengaduan::with('user', 'user.nik')->where('status', 'close')->get();
            return Datatables::of($data2)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModalModal-' . $row->id_pengaduan . '">Verifikasi Pengaduan</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        // return response()->json(['data' => $pengaduan2]);
        return view('kades/daftar_pengaduan', compact('pengaduan', 'pengaduan2'));
    }

    public function pengaduan2(Request $request)
    {

        $pengaduan2 = Pengaduan::with('user', 'user.nik')->where('status', 'close')->get();
        if ($request->ajax()) {
            $data2 = Pengaduan::with('user', 'user.nik')->where('status', 'close')->get();
            return Datatables::of($data2)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id_pengaduan . '">Detail Pengaduan</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // return response()->json(['data' => $pengaduan2]);
        return view('kades/daftar_pengaduan', compact('pengaduan2'));
    }



    public function tanganipengaduan(Request $request)
    {
        $notif = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Kades')->first();
        $jumlahnotif = $notif->jumlah - 1;



        $update = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Kades')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $notif2 = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Masyarakat')->first();
        $jumlahnotif2 = $notif->jumlah + 1;


        $update2 = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Masyarakat')->update([
            'jumlah' => $jumlahnotif2,
        ]);


        $update3 = Pengaduan::where('id_pengaduan', $request->id)->update([
            'remark' => $request->remark,
            'user_level_id' => "2",
            'status' => "close",
        ]);



        if ($update3) {
            return redirect()->route('daftar_pengaduan_kades')->with('success','pengaduan telah di tangani kades');
        } else {
            dd('gagal');
        }
    }



    // Pengajuan Surat dan proses------------------------------------------------------------------------------------------

    public function pengajuan(Request $request)
    {
        $pengajuan = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
            ->Where('current_wp', '4')
            ->get();

        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '4')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/kepaladesa/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
                        return $btn;
                    } else {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->id . '">Verifikasi Pengajuan</a>';
                        return $btn;
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $pengajuan2 = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
            ->where('current_wp', '!=', '4')
            ->where('current_wp', '!=', '1')
            ->get();
        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '!=', '4')
                ->where('current_wp', '!=', '1')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/kepaladesa/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
                        return $btn;
                    } else {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Verifikasi Pengajuan</a>';
                        return $btn;
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // return response()->json(['data' => $pengajuan]);
        return view('kades/daftar_pengajuan', compact('pengajuan', 'pengajuan2'));
    }

    public function pengajuan2(Request $request)
    {
        $pengajuan2 = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
            ->where('current_wp', '5')

            ->get();
        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '5')

                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/kepaladesa/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
                        return $btn;
                    } else {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Detail Pengajuan</a>';
                        return $btn;
                    }
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        // return response()->json(['data' => $pengajuan]);
        return view('kades/daftar_pengajuan', compact('pengajuan2'));
    }

    public function terimapengajuan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Kades')->first();
        $jumlahnotif = $notif->jumlah - 1;

        $update = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Kades')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $notif2 = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Masyarakat')->first();
        $jumlahnotif2 = $notif->jumlah + 1;


        $update2 = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Masyarakat')->update([
            'jumlah' => $jumlahnotif2,
        ]);

        $data = TransWorkflow::where('id', $id)->get();
        foreach ($data as $item)
            $array = json_decode($item->history);
        $date = date('d/m/Y  G:i:s');
        $array[] =  "Surat Telah Selesai Proses";
        $array[] =  $date;


        $history = json_encode($array);
        $update2 = TransWorkflow::where('id', $id)->update([
            'wf_reference_id' => "5",
            'history' => $history,
        ]);
        $update3 = Pengajuan::where('id', $id)->update([
            'current_wp' => "5",
        ]);
        if ($update3) {
            return redirect()->route('daftar_pengajuan_kades')->with('success','pengajuan telah selesai di proses');
        } else {
            return redirect()->route('daftar_pengajuan_kades')->with('failed','gagal melanjutkan proses');
        }
    }

    public function tolakpengajuan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Kades')->first();
        $jumlahnotif = $notif->jumlah - 1;

        $update = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Kades')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $data = TransWorkflow::where('id', $id)->get();
        foreach ($data as $item)
            $array = json_decode($item->history);

        $date = date('d/m/Y');
        $array[] =  "Surat Telah ditolak KADES";
        $array[] =  $date;
        $history = json_encode($array);
        $update = TransWorkflow::where('id', $id)->update([
            'wf_reference_id' => "6",
            "history" => $array,
        ]);
        $update = Pengajuan::where('id', $id)->update([
            'current_wp' => "6",
        ]);
        if ($update) {
            return redirect()->route('daftar_pengajuan_kades')->with('success','pengajuan telah di Tolak oleh KADES');
        } else {
            return redirect()->route('daftar_pengajuan_kades')->with('failed','gagal melanjutkan proses');
        }
    }

    public function generatePDF($id)
    {
        $item = Pengajuan::where('id', $id)->with('user', 'user.nik')->get();
        foreach ($item as $data)

        if ($data->jenis_surat == 'surat_pembuatan_ektp') {
            return  $pdf = PDF::loadView('surat/surat_pembuatan_ektp/index', compact('data'))
                ->stream('surat-pembuatan-ektp' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_pembuatan_kartu_keluarga') {
            return  $pdf = PDF::loadView('surat/surat_pembuatan_kartu_keluarga/index', compact('data'))
                ->stream('surat-pembuatan-kartu-keluarga' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_pembuatan_skck') {
            return  $pdf = PDF::loadView('surat/surat_pembuatan_skck/index', compact('data'))
                ->stream('surat-pembuatan-skck' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_keterangan_tinggal_sementara') {
            return  $pdf = PDF::loadView('surat/surat_keterangan_tinggal_sementara/index', compact('data'))
                ->stream('surat-keterangan-tinggal-sementara' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_keterangan_masuk_penduduk') {
            return  $pdf = PDF::loadView('surat/surat_keterangan_masuk_penduduk/index', compact('data'))
                ->stream('surat-keterangan-masuk-penduduk' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_keterangan_pindah_penduduk') {
            return  $pdf = PDF::loadView('surat/surat_keterangan_pindah_penduduk/index', compact('data'))
                ->stream('surat-keterangan-pindah-penduduk' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_keterangan_kelahiran') {
            return  $pdf = PDF::loadView('surat/surat_keterangan_kelahiran/index', compact('data'))
                ->stream('surat-keterangan-kelahiran' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_keterangan_kematian') {
            return  $pdf = PDF::loadView('surat/surat_keterangan_kematian/index', compact('data'))
                ->stream('surat-keterangan-kematian' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_permohonan_akta_kelahiran') {
            return  $pdf = PDF::loadView('surat/surat_permohonan_akta_kelahiran/index', compact('data'))
                ->stream('surat-permohonan-akta-kelahiran' . $data->user['nik']->id_ktp . '.pdf');

        } else if ($data->jenis_surat == 'surat_permohonan_akta_kematian') {
            return  $pdf = PDF::loadView('surat/surat_permohonan_akta_kematian/index', compact('data'))
                ->stream('surat-permohonan-akta-kematian' . $data->user['nik']->id_ktp . '.pdf');
        }
    }
}

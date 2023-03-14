<?php

namespace App\Http\Controllers;

use App\Models\Nik;
use App\Models\Notifikasi;
use App\Models\Pengaduan;
use App\Models\Pengajuan;
use App\Models\TransWorkflow;
use Illuminate\Http\Request;
use App\Models\User;
use Barryvdh\DomPDF\Facade as PDF;
use Yajra\DataTables\Facades\DataTables;

class VerifikatorController extends Controller
{


    // Beranda verifikator------------------------------------------------------------------------------------------

    public function index(Request $request)
    {


        $users = User::with('nik')->get();
        if ($request->ajax()) {
            $data = User::with('nik')->where('status', 'Nonactive')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="#" class="btn btn-sm btn-info" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->nik->id . '"><i class="fas fa-eye"></i></a>';

                    $btn = $btn . ' <a href="/verifikator/' . $row->nik->id . '/verified" class="btn btn-sm btn-core verified" role="button" aria-pressed="true" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="verified"><i class="fas fa-check"></i></a>';

                    $btn = $btn . ' <a href="/verifikator/' . $row->nik->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger deleteUser" role="button" aria-pressed="true"> <i class="fas fa-times"></i></a> ';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        $notif = Notifikasi::where('flag', 'Verifikator')->get();

        // return response()->json(['data' => $users]);
        return view('verifikator.daftar_masyarakat', compact('users', 'notif'));
    }

    public function daftar_penduduk_verifikator(Request $request)
    {

        $users = User::with('nik')->get();
        if ($request->ajax()) {
            $data = User::with('nik')->where('status', 'Active')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        $notif = Notifikasi::where('flag', 'Verifikator')->get();

        // return response()->json(['data' => $users]);
        return view('verifikator.daftar_penduduk_verifikator', compact('users', 'notif'));
    }


    // User verifikasi dan tolak pendaftaran------------------------------------------------------------------------------------------

    public function verified($id)
    {
        $update = User::where('id', $id)->update([
            'status' => "Active"
        ]);

        $notif = Notifikasi::where('jenis', 'akun')->first();
        $jumlahnotif = $notif->jumlah - 1;
        $update = Notifikasi::where('jenis', 'akun')->update([
            'jumlah' => $jumlahnotif,
        ]);

        return redirect()->route('daftar_masyarakat')->with('success','user telah di verifikasi');
    }

    public function destroy($id)
    {
        $notif = Notifikasi::where('jenis', 'akun')->first();
        $jumlahnotif = $notif->jumlah - 1;
        $update = Notifikasi::where('jenis', 'akun')->update([
            'jumlah' => $jumlahnotif,
        ]);

        Nik::find($id)->delete();
        return redirect()->route('daftar_masyarakat')->with('failed','user telah di tolak');
    }



    // Pengaduan Masyarakat  dan proses------------------------------------------------------------------------------------------

    public function pengaduan(Request $request)
    {
        $pengaduan = Pengaduan::with('user', 'user.nik')->where('status', 'open')->where('user_level_id', '4')->get();
        if ($request->ajax()) {
            $data = Pengaduan::with('user', 'user.nik')->where('status', 'open')->where('user_level_id', '4')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->id_pengaduan . '">Verifikasi Pengaduan</a>';

                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $pengaduan2 = Pengaduan::with('user', 'user.nik')->where('status', '!=', 'open')->get();
        if ($request->ajax()) {
            $data2 = Pengaduan::with('user', 'user.nik')->where('status', '!=', 'open')->get();
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
        return view('verifikator/daftar_pengaduan', compact('pengaduan', 'pengaduan2'));
    }

    public function pengaduan2(Request $request)
    {

        $pengaduan2 = Pengaduan::with('user', 'user.nik')->where('status', '!=', 'open')->get();
        if ($request->ajax()) {
            $data2 = Pengaduan::with('user', 'user.nik')->where('status', '!=', 'open')->get();
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
        return view('verifikator/daftar_pengaduan', compact('pengaduan2'));
    }



    public function terimapermintaan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah - 1;

        $notif2 = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'RT')->first();
        $jumlahnotif2 = $notif2->jumlah + 1;

        $update = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $update2 = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'RT')->update([
            'jumlah' => $jumlahnotif2,
        ]);


        $update3 = Pengaduan::where('id_pengaduan', $id)->update([
            'status' => "valid",
            'user_level_id' => "5",
        ]);
        if ($update3) {
            return redirect()->route('daftar_pengaduan')->with('success','pengaduan telah di lanjutkan ke RT');
        } else {
            return redirect()->route('daftar_pengaduan')->with('failed','gagal melanjutkan proses');
        }
    }

    public function tolakpermintaan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah - 1;

        $update = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $update2 = Pengaduan::where('id_pengaduan', $id)->update([
            'status' => "invalid",
        ]);

        if ($update2) {
            return redirect()->route('daftar_pengaduan')->with('success','pengaduan telah di tolak');
        } else {
            return redirect()->route('daftar_pengaduan')->with('failed','gagal melanjutkan proses');
        }
    }


    // Pengajuan Surat dan proses------------------------------------------------------------------------------------------

    public function pengajuan(Request $request)
    {
        $pengajuan = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
            ->where('current_wp', '!=', '5')
            ->Where('current_wp', '1')
            ->get();

        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '!=', '5')
                ->Where('current_wp', '1')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#exampleModal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/verifikator/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
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
            ->where('current_wp', '!=', '1')
            ->get();
        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '!=', '1')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/verifikator/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
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
        return view('verifikator/daftar_pengajuan', compact('pengajuan', 'pengajuan2'));
    }

    public function pengajuan2(Request $request)
    {
        $pengajuan2 = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
            ->where('current_wp', '!=', '1')
            ->get();
        if ($request->ajax()) {
            $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')
                ->where('current_wp', '!=', '1')
                ->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {

                    if ($row->current_wp == '5') {
                        $btn = '  <a href="#" class="btn btn-sm btn-core" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '">Detail Pengajuan</a>';
                        $btn = $btn . '   <a href="/verifikator/pengajuan/' . $row->id . '/generate-pdf" class="btn btn-sm btn-core" role="button" >download surat</a>';
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
        return view('verifikator/daftar_pengajuan', compact('pengajuan2'));
    }

    public function terimapengajuan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah - 1;

        $notif2 = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'RT')->first();
        $jumlahnotif2 = $notif2->jumlah + 1;

        $update = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);

        $update2 = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'RT')->update([
            'jumlah' => $jumlahnotif2,
        ]);


        $data = TransWorkflow::where('id', $id)->get();
        foreach ($data as $item)
            $array = json_decode($item->history);

        $date = date('d/m/Y  G:i:s');
        $array[] =  "Surat Telah diteruskan Verifikator";
        $array[] =  $date;
        $history = json_encode($array);
        $update3 = TransWorkflow::where('id', $id)->update([
            'wf_reference_id' => "2",
            "history" => $array,
        ]);
        $update4 = Pengajuan::where('id', $id)->update([
            'current_wp' => "2",
        ]);
        if ($update4) {
            return redirect()->route('daftar_pengajuan')->with('success','pengajuan telah di lanjutkan ke RT');
        } else {
            return redirect()->route('daftar_pengajuan')->with('failed','gagal melanjutkan proses');
        }
    }

    public function tolakpengajuan($id)
    {
        $notif = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah - 1;



        $update = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);



        $data = TransWorkflow::where('id', $id)->get();
        foreach ($data as $item)
            $array = json_decode($item->history);

        $date = date('d/m/Y  G:i:s');
        $array[] =  "Surat di Tolak Verifikator";
        $array[] =  $date;
        $history = json_encode($array);
        $update2 = TransWorkflow::where('id', $id)->update([
            'wf_reference_id' => "6",
            "history" => $array,
        ]);
        $update3 = Pengajuan::where('id', $id)->update([
            'current_wp' => "6",
        ]);
        if ($update3) {
            return redirect()->route('daftar_pengajuan')->with('failed','pengajuan telah di Tolak oleh verifikator');
        } else {
            return redirect()->route('daftar_pengajuan')->with('failed','gagal melanjutkan proses');
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

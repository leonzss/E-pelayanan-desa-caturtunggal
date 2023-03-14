<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Pengajuan;
use App\Models\TransWorkflow;
use Illuminate\Http\Request;
use App\Models\Notifikasi;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade as PDF;

class MasyarakatController extends Controller
{
    public function pengaduanMasyarakat()
    {

        $pengaduan = Pengaduan::all();
        return view('masyarakat.pengaduan_layanan_masyarakat', compact('pengaduan'));
    }

    public function pengajuanSurat()
    {

        $data = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')->get();
        return view('masyarakat/pengajuan_surat_masyarakat', compact('data'));
    }

    public function pengajuanSurattracing($id)
    {

        $data = TransWorkflow::where('pengajuan_id', $id)->get();
        return response()->json(array('data' => $data), 200);
    }

    public function pengaduan(Request $request)
    {

        $this->validate($request, [
            'judul_pengaduan' => 'required',
            'detail_pengaduan' => 'required',
            'lokasi_kejadian' => 'required',
            'waktu_kejadian' => 'required',
            'created_by' => 'required',

        ]);


        $pengaduan = new Pengaduan();
        $pengaduan->judul_pengaduan = $request->judul_pengaduan;
        $pengaduan->detail_pengaduan = $request->detail_pengaduan;
        $pengaduan->lokasi_kejadian = $request->lokasi_kejadian;
        $pengaduan->status = "open";
        $pengaduan->user_id = $request->created_by;
        $pengaduan->user_level_id = '4';
        $pengaduan->created_date = $request->waktu_kejadian;
        $pengaduan->save();

        $notif = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah + 1;
        $update = Notifikasi::where('jenis', 'Pengaduan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);

        return redirect()->route('masyarakat.home')->with('success', 'pengaduan akan di proses');
    }

    public function pengajuan(Request $request)
    {

        $datas = Pengajuan::with('user', 'user.nik', 'transworkflow', 'transworkflow.wf_reference')->where('jenis_surat', $request->jenis_surat)->get();
        foreach ($datas as $data)

        if ($request->ktp) {
            $request->validate([
                'jenis_surat' => 'required',
                'kebutuhan' => 'required',

                // 'ktp' => 'required|mimes:jpeg,png|max:2048',
                // 'kk' =>'required|mimes:jpeg,png|max:2048',
                // 'foto3x4' =>'required|mimes:jpeg,png|max:2048',

            ]);
        } else {
            $request->validate([
                'jenis_surat' => 'required',
                'kebutuhan' => 'required',

            ]);
        }

        $id = $request->created_by;
        if ($request->ktp) {
            $extension1 = $request->ktp->extension();

            $request->ktp->storeAs('/public/img', $id . "ktp." . $extension1);
           
            $url1 = Storage::url($id . "ktp." . $extension1);
        }
        if ($request->kk) {
            $extension2 = $request->kk->extension();

            $request->kk->storeAs('/public/img', $id . "kk." . $extension2);
            
            $url2 = Storage::url($id . "kk." . $extension2);
        }
        if ($request->foto3x4) {
            $extension3 = $request->foto3x4->extension();

            $request->foto3x4->storeAs('/public/img', $id . "foto3x4." . $extension3);

            $url3 = Storage::url($id . "foto3x4." . $extension3);
        }


        $date = date('d/m/Y  G:i:s');
        $array = [
            "Surat Diajukan",
            $date
        ];
        $history = json_encode($array);

        $transworkflow = new TransWorkflow();
        $transworkflow->history = $history;
        $pengajuan = new Pengajuan();
        $pengajuan->jenis_surat = $request->jenis_surat;
        if ($request->ktp) {
            $pengajuan->Lampiran_1 = $id . "ktp." . $extension1;
        } else if ($request->kk) {
            $pengajuan->Lampiran_2 = $id . "kk." . $extension2;
        } else if ($request->foto3x4) {
            $pengajuan->Lampiran_3 = $id . "foto3x4." . $extension3;
        } else {
            $takelampiran = Pengajuan::where('user_id', $id)->first();

            $pengajuan->Lampiran_1 = $takelampiran->Lampiran_1;
            $pengajuan->Lampiran_2 = $takelampiran->Lampiran_2;
            $pengajuan->Lampiran_3 = $takelampiran->Lampiran_3;
        }
        $pengajuan->user_id = $request->created_by;
        $pengajuan->kebutuhan = $request->kebutuhan;
        $pengajuan->created_date = now();

        $pengajuan->save();
        $pengajuan->transworkflow()->save($transworkflow);

        $notif = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->first();
        $jumlahnotif = $notif->jumlah + 1;
        $update = Notifikasi::where('jenis', 'Pengajuan')->where('flag', 'Verifikator')->update([
            'jumlah' => $jumlahnotif,
        ]);


        return redirect()->route('masyarakat.home')->with('success', 'pengajuan surat akan di proses');
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

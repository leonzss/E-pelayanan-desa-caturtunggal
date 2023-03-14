<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Models\Nik;
use App\Models\Notifikasi;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function loginPost(Request $request)
    {


        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        $username = $request->username;
        $password = $request->password;

        $data = User::where('username', $username)->first();


        if ($data) {

            if (Hash::check($password, $data->password) && $data->status == "Active") {
                Session::put('username', $data->username);

                if ($data->user_level_id == '1') {
                    Session::put('masyarakat', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('masyarakat.home');
                } else if ($data->user_level_id == "5") {
                    Session::put('rt', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('rt.home');
                } else if ($data->user_level_id == "2") {
                    Session::put('kades', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('kades.home');
                } else if ($data->user_level_id == "3") {
                    Session::put('admin', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('admin.home');
                } else if ($data->user_level_id == "4") {
                    Session::put('verifikator', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('verifikator.home');
                } else if ($data->user_level_id == "6") {
                    Session::put('rw', TRUE);
                    Session::put('id', $data->id);
                    return redirect()->route('rw.home');
                }
            }
        } else {

            return redirect()->route('login')->with('usernotfound', 'akun tidak ditemukan atau belum diverifikasi');
        }
        return redirect()->route('login')->with('usernotfound', 'akun tidak ditemukan atau belum diverifikasi');
    }


    public function logout()
    {
        Session::flush();
        return redirect()->route('login')->with('alert', 'Kamu sudah logout');
    }



    // Register akun masyarakat
    public function registerpost(Request $request)
    {
        $data = Nik::where('id_ktp', $request->nik)->first();
       
        if(!empty($data)){
            return redirect()->route('register')->with('usernotfound', 'nik yang sama telah terdaftar sebelumnya');
        }

        $this->validate($request, [
            'nama' => ['required', 'string', 'max:100'],
            'alamat' => ['required', 'string', 'max:100'],
            'tempat_lahir' => ['required', 'string', 'max:50'],
            'tanggal_lahir' => ['required', 'string', 'max:60'],
            'status_perkawinan' => ['required'],
            'pekerjaan' => ['required', 'string', 'max:50'],
            'jenis_kelamin' => ['required'],
            'dusun' => ['required', 'string', 'max:50'],
            'rt' => ['required'],
            'rw' => ['required'],
            'agama' => ['required'],
            'kk' => ['required', 'string', 'max:100'],
            'kecamatan' => ['required', 'string', 'max:100'],
            'kelurahan' => ['required', 'string', 'max:100'],
            'kabupaten' => ['required', 'string', 'max:100'],
            'nama_ayah' => ['required', 'string', 'max:100'],
            'nama_ibu' => ['required', 'string', 'max:100'],
            'kewarganegaraan' => ['required', 'string', 'max:100'],
            'username' => ['required', 'string', 'max:255'],
            'nik' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:user'],
            'phone' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:5', 'confirmed'],
            // 'ktp' => ['required', 'mimes:png', 'max:2048'],
            // 'kk1' => ['required', 'mimes:png', 'max:2048'],
            // 'foto3x4' => ['required', 'mimes:png', 'max:2048'],
            // 'ktp' => 'required|mimes:jpeg,png|max:2048',
            // 'kk' =>'required|mimes:jpeg,png|max:2048',
            // 'foto3x4' =>'required|mimes:jpeg,png|max:2048',
        ]);

        //if ($request->ktp) {
        //    $extension1 = $request->ktp->extension();

        //    $request->ktp->storeAs('/public/img', $request->nik . "ktp_regis." . $extension1);
           
        //    $url1 = Storage::url($request->nik . "ktp_regis." . $extension1);
        // }
        //if ($request->kk1) {
        //    $extension2 = $request->kk1->extension();

        //    $request->kk1->storeAs('/public/img', $request->nik . "kk_regis." . $extension2);
            
        //    $url2 = Storage::url($request->nik . "kk_regis." . $extension2);
        //}
        //if ($request->foto3x4) {
        //    $extension3 = $request->foto3x4->extension();

        //    $request->foto3x4->storeAs('/public/img', $request->nik . "foto3x4_regis." . $extension3);

        //    $url3 = Storage::url($request->nik . "foto3x4_regis." . $extension3);
        //}

        $newuser = new User;
        $newuser->username = $request->username;
        $newuser->email = $request->email;
        $newuser->phone = $request->phone;
        $newuser->password = Hash::make($request['password']);

        $nik = new Nik();
        $nik->id_ktp =  $request->nik;
        $nik->nama =  $request->nama;
        $nik->alamat =  $request->alamat;
        $nik->tempat_lahir =  $request->tempat_lahir;
        $nik->tanggal_lahir =  $request->tanggal_lahir;
        $nik->status_perkawinan =  $request->status_perkawinan;
        $nik->pekerjaan =  $request->pekerjaan;
        $nik->jenis_kelamin =  $request->jenis_kelamin;
        $nik->dusun =  $request->dusun;
        $nik->rt =  $request->rt;
        $nik->rw =  $request->rw;
        $nik->agama =  $request->agama;
        $nik->kk =  $request->kk;
        $nik->kecamatan =  $request->kecamatan;
        $nik->kelurahan =  $request->kelurahan;
        $nik->kabupaten =  $request->kabupaten;
        $nik->nama_ayah =  $request->nama_ayah;
        $nik->nama_ibu =  $request->nama_ibu;
        $nik->kewarganegaraan =  $request->kewarganegaraan;
        //$nik->Lampiran_1 =  $request->nik . "ktp_regis." . $extension1;
        //$nik->Lampiran_2 =  $request->nik . "kk_regis." . $extension2;
        //$nik->Lampiran_3 =  $request->nik . "foto3x4_regis." . $extension3;
        $nik->save();
        $nik->user()->save($newuser);

        $notif = Notifikasi::where('jenis', 'akun')->first();
        $jumlahnotif = $notif->jumlah + 1;
        $update = Notifikasi::where('jenis', 'akun')->update([
            'jumlah' => $jumlahnotif,
        ]);


        return redirect()->route('login')->with('usernotfound', 'menunggu akun untuk di verifikasi');
    }
}

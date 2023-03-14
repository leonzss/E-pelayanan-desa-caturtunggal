<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//-----------------------------------------------------------Landing dan Auth--------------------------------------------------------------

Route::view('/', 'index')->name('landing');

Route::view('/profil', 'profil')->name('profil');

Route::view('/login', 'auth.login')->name('login');
Route::POST('/loginpost', [App\Http\Controllers\AuthController::class, 'loginPost'])->name('loginpost');
Route::get('/logout', [App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

Route::view('/register', 'auth.register')->name('register');
Route::POST('/registerpost', [App\Http\Controllers\AuthController::class, 'registerpost'])->name('registerpost');

//-----------------------------------------------------------Admin---------------------------------------------------------------------

Route::get('admin/beranda', [App\Http\Controllers\HomeController::class, 'admin'])->name('admin.home');
Route::get('admin/daftar-informasi', [App\Http\Controllers\AdminController::class, 'informasi'])->name('daftar_informasi');
Route::POST('admin/tambah-informasi', [App\Http\Controllers\AdminController::class, 'tambahinformasi'])->name('tambah_informasi');

Route::get('admin/beranda/{id}/delete', [App\Http\Controllers\AdminController::class, 'deleteinformasi'])->name('delete_informasi');

Route::get('/informasi', [App\Http\Controllers\AdminController::class, 'tampilinformasi'])->name('informasi');



//-----------------------------------------------------------RT---------------------------------------------------------------------

Route::get('rt/beranda', [App\Http\Controllers\HomeController::class, 'rt'])->name('rt.home');

Route::get('rt/daftar-pengajuan', [App\Http\Controllers\RtController::class, 'pengajuan'])->name('daftar_pengajuan_rt');
Route::get('rt/daftar-penduduk-rt',[App\Http\Controllers\RtController::class, 'daftar_penduduk_rt'])->name('daftar_penduduk_rt');
Route::get('rt/daftar-pengajuan2', [App\Http\Controllers\RtController::class, 'pengajuan2'])->name('daftar_pengajuan2_rt');
Route::get('rt/daftar-pengaduan', [App\Http\Controllers\RtController::class, 'pengaduan'])->name('daftar_pengaduan_rt');
Route::get('rt/daftar-pengaduan2', [App\Http\Controllers\RtController::class, 'pengaduan2'])->name('daftar_pengaduan2_rt');

Route::POST('rt/tanganipengaduan', [App\Http\Controllers\RtController::class, 'tanganipengaduan'])->name('tanganipengaduan_rt');
Route::get('rt/teruskanpengaduan/{id}', [App\Http\Controllers\RtController::class, 'teruskanpengaduan'])->name('teruskanpengaduan_rt');

Route::get('rt/tolakpengajuan/{id}', [App\Http\Controllers\RtController::class, 'tolakpengajuan'])->name('tolakpengajuan_rt');
Route::get('rt/terimapengajuan/{id}', [App\Http\Controllers\RtController::class, 'terimapengajuan'])->name('terimapengajuan_rt');

Route::get('rt/pengajuan/{id}/generate-pdf', [App\Http\Controllers\KadesController::class, 'generatePDF'])->name('getsuratrt');




//-----------------------------------------------------------RW---------------------------------------------------------------------

Route::get('rw/beranda', [App\Http\Controllers\HomeController::class, 'rw'])->name('rw.home');
Route::get('rw/daftar-penduduk-rw',[App\Http\Controllers\RwController::class, 'daftar_penduduk_rw'])->name('daftar_penduduk_rw');
Route::get('rw/daftar-pengajuan', [App\Http\Controllers\RwController::class, 'pengajuan'])->name('daftar_pengajuan_rw');
Route::get('rw/daftar-pengajuan2', [App\Http\Controllers\RwController::class, 'pengajuan2'])->name('daftar_pengajuan2_rw');
Route::get('rw/daftar-pengaduan', [App\Http\Controllers\RwController::class, 'pengaduan'])->name('daftar_pengaduan_rw');
Route::get('rw/daftar-pengaduan2', [App\Http\Controllers\RwController::class, 'pengaduan2'])->name('daftar_pengaduan2_rw');

Route::POST('rw/tanganipengaduan', [App\Http\Controllers\RwController::class, 'tanganipengaduan'])->name('tanganipengaduan_rw');
Route::get('rw/teruskanpengaduan/{id}', [App\Http\Controllers\RwController::class, 'teruskanpengaduan'])->name('teruskanpengaduan_rw');

Route::get('rw/tolakpengajuan/{id}', [App\Http\Controllers\RwController::class, 'tolakpengajuan'])->name('tolakpengajuan_rw');
Route::get('rw/terimapengajuan/{id}', [App\Http\Controllers\RwController::class, 'terimapengajuan'])->name('terimapengajuan_rw');

Route::get('rw/pengajuan/{id}/generate-pdf', [App\Http\Controllers\KadesController::class, 'generatePDF'])->name('getsuratrw');

//-----------------------------------------------------------Kepala Desa---------------------------------------------------------------------

Route::get('kepaladesa/beranda', [App\Http\Controllers\HomeController::class, 'kepaladesa'])->name('kades.home');
Route::get('kepaladesa/daftar-penduduk-kades',[App\Http\Controllers\KadesController::class, 'daftar_penduduk_kades'])->name('daftar_penduduk_kades');
Route::get('kepaladesa/daftar-pengajuan', [App\Http\Controllers\KadesController::class, 'pengajuan'])->name('daftar_pengajuan_kades');
Route::get('kepaladesa/daftar-pengajuan2', [App\Http\Controllers\KadesController::class, 'pengajuan2'])->name('daftar_pengajuan2_kades');
Route::get('kepaladesa/daftar-pengaduan', [App\Http\Controllers\KadesController::class, 'pengaduan'])->name('daftar_pengaduan_kades');
Route::get('kepaladesa/daftar-pengaduan2', [App\Http\Controllers\KadesController::class, 'pengaduan2'])->name('daftar_pengaduan2_kades');

Route::POST('kepaladesa/tanganipengaduan', [App\Http\Controllers\KadesController::class, 'tanganipengaduan'])->name('tanganipengaduan_kades');
Route::get('kepaladesa/teruskanpengaduan/{id}', [App\Http\Controllers\KadesController::class, 'teruskanpengaduan'])->name('teruskanpengaduan_kades');

Route::get('kepaladesa/tolakpengajuan/{id}', [App\Http\Controllers\KadesController::class, 'tolakpengajuan'])->name('tolakpengajuan_kades');
Route::get('kepaladesa/terimapengajuan/{id}', [App\Http\Controllers\KadesController::class, 'terimapengajuan'])->name('terimapengajuan_kades');

Route::get('kepaladesa/pengajuan/{id}/generate-pdf', [App\Http\Controllers\KadesController::class, 'generatePDF'])->name('getsurat');


//-----------------------------------------------------------Masyarakat---------------------------------------------------------------------


Route::get('masyarakat/beranda', [App\Http\Controllers\HomeController::class, 'masyarakat'])->name('masyarakat.home');
Route::get('masyarakat/pengajuan-surat', [App\Http\Controllers\MasyarakatController::class, 'pengajuanSurat'])->name('pengajuan_surat');
Route::get('masyarakat/tracing/{id}/pengajuan-surat', [App\Http\Controllers\MasyarakatController::class, 'pengajuanSurattracing'])->name('pengajuan_surat_tracing');
Route::POST('masyarakat/proses/pengajuan-surat', [App\Http\Controllers\MasyarakatController::class, 'pengajuan'])->name('pengajuanproses');
Route::get('masyarakat/pengaduan-layanan', [App\Http\Controllers\MasyarakatController::class, 'pengaduanMasyarakat'])->name('pengaduan_layanan');
Route::POST('masyarakat/prosespengaduanlayanan', [App\Http\Controllers\MasyarakatController::class, 'pengaduan'])->name('pengaduanproses');
Route::view('masyarakat/notifikasi-masyarakat', 'masyarakat/notifikasi_masyarakat')->name('notifikasi_masyarakat');
Route::get('masyarakat/pengajuan/{id}/generate-pdf', [App\Http\Controllers\KadesController::class, 'generatePDF'])->name('getsuratmasyarakat');



//-----------------------------------------------------------Verifikator---------------------------------------------------------------------


Route::get('verifikator/beranda', [App\Http\Controllers\HomeController::class, 'verifikator'])->name('verifikator.home');

Route::get('verifikator/daftar-masyarakat',[App\Http\Controllers\VerifikatorController::class, 'index'])->name('daftar_masyarakat');
Route::get('verifikator/daftar-penduduk-verifikator',[App\Http\Controllers\VerifikatorController::class, 'daftar_penduduk_verifikator'])->name('daftar_penduduk_verifikator');
Route::get('verifikator/{id}/delete',[App\Http\Controllers\VerifikatorController::class, 'destroy']);
Route::get('verifikator/{id}/verified',[App\Http\Controllers\VerifikatorController::class, 'verified'])->name('verified');

Route::get('verifikator/daftar-pengajuan', [App\Http\Controllers\VerifikatorController::class, 'pengajuan'])->name('daftar_pengajuan');
Route::get('verifikator/daftar-pengajuan2', [App\Http\Controllers\VerifikatorController::class, 'pengajuan2'])->name('daftar_pengajuan2');
Route::get('verifikator/tolakpengajuan/{id}', [App\Http\Controllers\VerifikatorController::class, 'tolakpengajuan'])->name('tolakpengajuan');
Route::get('verifikator/terimapengajuan/{id}', [App\Http\Controllers\VerifikatorController::class, 'terimapengajuan'])->name('terimapengajuan');

Route::get('verifikator/daftar-pengaduan', [App\Http\Controllers\VerifikatorController::class, 'pengaduan'])->name('daftar_pengaduan');
Route::get('verifikator/daftar-pengaduan2', [App\Http\Controllers\VerifikatorController::class, 'pengaduan2'])->name('daftar_pengaduan2');
Route::get('verifikator/tolakpermintaan/{id}', [App\Http\Controllers\VerifikatorController::class, 'tolakpermintaan'])->name('tolakpermintaan');
Route::get('verifikator/terimapermintaan/{id}', [App\Http\Controllers\VerifikatorController::class, 'terimapermintaan'])->name('terimapermintaan');

Route::get('verifikator/pengajuan/{id}/generate-pdf', [App\Http\Controllers\KadesController::class, 'generatePDF'])->name('getsurat');

Route::view('verifikator/notifikasi-masyarakat', 'masyarakat/notifikasi_masyarakat')->name('notifikasi_masyarakat');


<?php

namespace App\Http\Controllers;

use App\Models\Notifikasi;
use App\Models\Berita;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function masyarakat()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $notif = Notifikasi::where('flag', 'Masyarakat')->get();
        return view('masyarakat/beranda', compact('notif', 'berita'));
    }
    public function rt()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $notif = Notifikasi::where('flag', 'RT')->get();
        return view('rt/beranda', compact('notif', 'berita'));
    }
    public function kepaladesa()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $notif = Notifikasi::where('flag', 'Kades')->get();
        return view('kades/beranda', compact('notif', 'berita'));
    }
    public function admin()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $beritaberanda = Berita::orderBy('id', 'desc')->get();
        return view('admin/beranda', compact('berita','beritaberanda'));
    }
    public function verifikator()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $notif = Notifikasi::where('flag', 'Verifikator')->get();
        return view('verifikator/beranda', compact('notif', 'berita'));
    }
    public function rw()
    {
        $berita = Berita::orderBy('id', 'desc')->take(3)->get();
        $notif = Notifikasi::where('flag', 'RW')->get();
        return view('rw/beranda', compact('notif', 'berita'));
    }
}

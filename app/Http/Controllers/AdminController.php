<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Berita;
use DataTables;
use Illuminate\Support\Facades\Storage;


class AdminController extends Controller
{
    public function informasi(Request $request)
    {
         $beritaberanda = Berita::orderBy('tanggal_post', 'desc')->get();
 
         if ($request->ajax()) {
             $data = Berita::orderBy('tanggal_post', 'desc')->get();
             return Datatables::of($data)
                 ->addIndexColumn()
                 ->addColumn('action', function ($row) {
 
                     $btn = '  <a href="#" class="btn btn-sm btn-info" role="button" aria-pressed="true" data-toggle="modal" data-target="#Modal-' . $row->id . '"><i class="fas fa-eye"></i></a>';
 
                     $btn = $btn . ' <a href="/admin/beranda/' . $row->id . '/delete" data-toggle="tooltip"  data-id="' . $row->id . '" data-original-title="Delete" class="btn btn-sm btn-danger deleteUser" role="button" aria-pressed="true"> <i class="fas fa-times"></i></a> ';
 
                     return $btn;
                 })
                 ->rawColumns(['action'])
                 ->make(true);
         }
 
         return view('admin/admin.home', compact('beritaberanda'));
     }

    public function tambahinformasi(Request $request)
    {
        $this->validate($request, [
            'gambar' => 'required|mimes:jpeg,png|max:2048',
            'judul_berita' => 'required',
            'detail_berita' => 'required',

        ]);
        
        $extension = $request->gambar->extension();

        $request->gambar->storeAs('/public/img', $request->judul_berita . "." . $extension);

        $url = Storage::url($request->judul_berita . "." . $extension);

        $berita = new Berita();

        $berita->gambar = $request->judul_berita . "." . $extension;
        $berita->judul_berita = $request->judul_berita;
        $berita->detail_berita = $request->detail_berita;
        $berita->tanggal_post = now();
        $berita->created_by = $request->created_by;
        $berita->save();

        return redirect()->route('admin.home')->with('success','berita berhasil ditambahkan');
    }




    public function deleteinformasi($id)
    {
        Berita::find($id)->delete();
        return redirect()->route('admin.home')->with('success','berita telah dihapus');
    }



    public function tampilinformasi()
    {
        $berita = Berita::orderBy('tanggal_post', 'desc')->take(6)->get();
        return view('informasi', compact('berita'));
    }
}

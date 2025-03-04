<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return view('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('thumbnail'))
        {
            $gambar = $request->file('thumbnail'); //mengambil gambar yang diupload di form.
            $path = 'public/images/kategori'; //path menyimpan data gambar.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension gambar yang asli.
            $name = 'gambar_kategori_'.Carbon::now()->format('YmdHis').'.'.$ext; ///nama ketika sudah diupload.
            $gambar->storeAs($path, $name); //disimpan ke path yang sudah ditentukan dengan nama file yang sudah ditentukan (gambar_kategori_tanggal.ext)
            $data['thumbnail'] = $name; //nilai yang disimpan ke dalam database.
        }

        return $data;

    }
}

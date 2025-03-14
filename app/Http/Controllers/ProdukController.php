<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $data = Produk::paginate(10);
        return view('produk.index', compact('data'));
    }
    public function create()
    {
        $kategori = Kategori::all();
        return view('produk.create', compact('kategori'));
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasFile('thumbnail'))
        {
            $gambar = $request->file('thumbnail'); //mengambil gambar yang diupload di form.
            $path = 'public/images/produk'; //path menyimpan data gambar.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension gambar yang asli.
            $name = 'gambar_produk_'.Carbon::now()->format('YmdHis').'.'.$ext; ///nama ketika sudah diupload.
            $gambar->storeAs($path, $name); //disimpan ke path yang sudah ditentukan dengan nama file yang sudah ditentukan (gambar_kategori_tanggal.ext)
            $data['thumbnail'] = $name; //nilai yang disimpan ke dalam database.
        }
        Produk::create($data); //mengirimkan data ke database
        return redirect()->route('produk.index')->with('success', 'Produk berhasil ditambahkan.'); //respon redirect ke index kategori
    }

    public function detail($id)
    {
        $data = Produk::findOrFail($id);
        $kategori = Kategori::all();
        return view('produk.detail', compact('data', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $data = Produk::findOrFail($id);
        if($request->hasFile('thumbnail'))
        {
            $gambar = $request->file('thumbnail'); //mengambil gambar yang diupload di form.
            $path = 'public/images/produk'; //path menyimpan data gambar.
            $ext = $gambar->getClientOriginalExtension(); //mengambil extension gambar yang asli.
            $name = 'gambar_produk_'.Carbon::now()->format('YmdHis').'.'.$ext; ///nama ketika sudah diupload.
            $gambar->storeAs($path, $name); //disimpan ke path yang sudah ditentukan dengan nama file yang sudah ditentukan (gambar_kategori_tanggal.ext)
            $input['thumbnail'] = $name; //nilai yang disimpan ke dalam database.
            Storage::delete('public/images/produk/'.$data->thumbnail); //menghapus file lama di folder storage.
        }
        $data->update($input);
        return back()->with('success', 'Data berhasil diubah.');
    }

    public function delete($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return redirect()->route('produk.index')->with('success','Data berhasil dihapus');
    }
}

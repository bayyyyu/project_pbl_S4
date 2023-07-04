<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\KatalogPohon;
use Illuminate\Http\Request;

class AdminKatalogPohonController extends Controller
{
    function index(Request $request)
    {
        $data['list_katalog_pohon'] = KatalogPohon::all();
        return view('Admin.Katalog-Pohon.index', $data);
    }
    function create()
    {
        return view('Admin.Katalog-Pohon.create');
    }
    public function store(Request $request)
    {
        $katalog_pohon = new KatalogPohon();
        $katalog_pohon->nama_pohon = $request->input('nama_pohon');
        $katalog_pohon->nama_lain_pohon = $request->input('nama_lain_pohon');
        $katalog_pohon->deskripsi = $request->input('deskripsi');

        $katalog_pohon->handleUploadFoto();
        $katalog_pohon->save();

        return redirect('Admin/Katalog-Pohon')->with('success', 'Data berhasil ditambahkan.');
    }
    function show(KatalogPohon $katalog_pohon)
    {
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.show', $data);
    }
    function edit(KatalogPohon $katalog_pohon)
    {
        $data['katalog_pohon'] = $katalog_pohon;
        return view('Admin.Katalog-Pohon.edit', $data);
    }
    function update(KatalogPohon $katalog_pohon)
    {
        $katalog_pohon->nama_pohon = request('nama_pohon');
        $katalog_pohon->nama_lain_pohon = request('nama_lain_pohon');
        $katalog_pohon->deskripsi = request('deskripsi');
        if (request('foto')) $katalog_pohon->handleUploadFoto();
        $katalog_pohon->save();
        return redirect('Admin/Katalog-Pohon')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(KatalogPohon $katalog_pohon)
    {
        $katalog_pohon->delete();

        return redirect('Admin/Katalog-Pohon')->with('danger', 'Data Berhasil Dihapus');
    }
}

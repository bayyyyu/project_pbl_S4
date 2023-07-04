<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class TanamanController extends Controller
{
    function index()
    {
        $data['list_tanaman'] = Tanaman::all();
        return view('Admin.Tanaman.index', $data);
    }
    function create()
    {
        $list_event = Event::all();
        return view('Admin.Tanaman.create', compact('list_event'));
    }
    function store(Request $request)
    {
        if (Auth::check()) {
            Session::flash('lokasi', $request->lokasi);
            Session::flash('umur_tanaman', $request->umur_tanaman);
            Session::flash('lat', $request->lat);
            Session::flash('lng', $request->lng);
            Session::flash('deskripsi', $request->deskripsi);
            Session::flash('sample', $request->sample);
            Session::flash('tanggal_penanaman', $request->tanggal_penanaman);
            Session::flash('jenis_mangrove', $request->jenis_mangrove);
            Session::flash('jenis_tanah', $request->jenis_tanah);
            Session::flash('masa_tumbuh', $request->masa_tumbuh);

            $request->validate([
                'lokasi' => 'required',
                'umur_tanaman' => 'required',
                'lat' => 'required',
                'lng' => 'required',
                'deskripsi' => 'required',
                'tanggal_penanaman' => 'required',
                'jenis_mangrove' => 'required',
                'jenis_tanah' => 'required',
                'masa_tumbuh' => 'required',
                'event_id' => 'required',
            ], [
                'lokasi.required' => 'Lokasi Wajib Diisi',
                'umur_tanaman.required' => 'Umur Tanaman Saat Ditanam Wajib Diisi',
                'lat.required' => 'latitude Wajib Diisi',
                'lng.required' => 'longitude Wajib Diisi',
                'deskripsi.required' => 'deskripsi Wajib Diisi',
                'tanggal_penanaman.required' => 'Tanggal Penanaman Wajib Diisi',
                'jenis_mangrove.required' => 'Jenis Mangrove Wajib Diisi',
                'jenis_tanah.required' => 'Jenis Tanah Wajib Diisi',
                'masa_tumbuh.required' => 'Masa Tumbuh Wajib Diisi',
                'even_id.required' => 'Event Penanaman Wajib Diisi',

            ]);


            // memeriksa apakah pengguna sudah login
            $tanaman = new Tanaman;
            $tanaman->sample = Str::random(7);
            $tanaman->tanggal_penanaman = request('tanggal_penanaman');
            $tanaman->jenis_mangrove = request('jenis_mangrove');
            $tanaman->jenis_tanah = request('jenis_tanah');
            $tanaman->masa_tumbuh = request('masa_tumbuh');
            $tanaman->lokasi = request('lokasi');
            $tanaman->umur_tanaman = request('umur_tanaman');
            $tanaman->lat = request('lat');
            $tanaman->lng = request('lng');
            $tanaman->deskripsi = request('deskripsi');
            $tanaman->event_id = request('event_id');
            $tanaman->status_penanaman = "baru ditanam";
            $tanaman->user_id = Auth::user()->id;

            $tanaman->handleUploadFoto();
            $tanaman->save();

            return redirect('Admin/Tanaman')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect('Auth/Login')->with('error', 'Anda harus login terlebih dahulu');
        }
    }

    function show(Tanaman $tanaman)
    {
        $data['tanaman'] = $tanaman;
        return view('Admin.Tanaman.show', $data);
    }

    function edit(Tanaman $tanaman, Event $event)
    {
        $list_event = Event::all();
        $data['tanaman'] = $tanaman;
        $data['event'] = $event;
        return view('Admin.Tanaman.edit', compact('list_event'), $data);
    }

    function update(Tanaman $tanaman)
    {
        if (request('sample')) $tanaman->sample = (request('sample'));
        if (request('tanggal_penanaman')) $tanaman->tanggal_penanaman = (request('tanggal_penanaman'));
        if (request('jenis_mangrove')) $tanaman->jenis_mangrove = (request('jenis_mangrove'));
        if (request('jenis_tanah')) $tanaman->jenis_tanah = (request('jenis_tanah'));
        if (request('masa_tumbuh')) $tanaman->masa_tumbuh = (request('masa_tumbuh'));
        if (request('lokasi')) $tanaman->lokasi = (request('lokasi'));
        if (request('umur_tanaman')) $tanaman->umur_tanaman = (request('umur_tanaman'));
        if (request('lat')) $tanaman->lat = (request('lat'));
        if (request('lng')) $tanaman->lng = (request('lng'));
        if (request('deskripsi')) $tanaman->deskripsi = (request('deskripsi'));
        $tanaman->status_penanaman = request('status_penanaman');
        $tanaman->event_id = request('event_id');
        $tanaman->user_id = Auth::user()->id;

        if (request('foto')) $tanaman->handleUploadFoto();
        $tanaman->save();

        return redirect('Admin/Tanaman')->with('success', 'Data Berhasil Diedit');
    }
    function destroy(Tanaman $tanaman)
    {
        $tanaman->delete();

        return redirect('Admin/Tanaman')->with('danger', 'Data Berhasil Dihapus');
    }
}

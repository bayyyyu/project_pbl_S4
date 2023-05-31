<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminEventController extends Controller
{
    function index()
    {
        $data['list_event'] = Event::all();
        $data['jumlah_penanaman'] = [];
        foreach ($data['list_event'] as $event) {
            $jumlahPenanaman = DB::table('tanaman')->where('event_id', $event->id)->count();
            $data['jumlah_penanaman'][$event->id] = $jumlahPenanaman;
        }
        return view('Admin.Event.index', $data);
    }
    function create()
    {
        return view('Admin.Event.create');
    }
    public function store(Request $request)
    {
        $event = new Event;
        $event->nama_event = $request->input('nama_event');
        $event->tanggal_event = $request->input('tanggal_event');
        $event->deskripsi = $request->input('deskripsi');
        $event->lat = $request->input('lat');
        $event->lng = $request->input('lng');
        $event->jam = $request->input('jam');

        $event->handleUploadFoto();
        $event->save();

        return redirect('Admin/Event')->with('success', 'Event Penanaman berhasil ditambahkan.');
    }
    public function show(Event $event)
    {
        $data['event'] = $event;
        $jumlahPenanaman = DB::table('tanaman')
        ->where('event_id', $event->id)
            ->count();
        $data['jumlah_penanaman'] = $jumlahPenanaman;
        return view('Admin.Event.show', $data);
    }
}

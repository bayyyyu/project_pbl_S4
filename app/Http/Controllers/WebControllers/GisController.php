<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;



class GisController extends Controller
{
    function index(){

        $tanaman = Tanaman::with('eventPenanaman')->get();
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        return view('Web.GIS.index', compact('tanaman'), $data);
    }
}

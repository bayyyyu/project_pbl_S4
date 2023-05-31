<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;

class EventController extends Controller
{
    function index()
    {

        $tanaman = Tanaman::with('eventPenanaman')->get();
        $data['list_event'] = Event::all();
        return view('Web.Event.index', compact('tanaman'), $data);
    }
}

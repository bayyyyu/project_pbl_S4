<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Tanaman;
use App\Models\Event;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    function index()
    {

        $tanaman = Tanaman::with('eventPenanaman')->get();
        $data['list_tanaman'] = Tanaman::all();
        $data['list_event'] = Event::all();
        return view('Web.Profil.index', compact('tanaman'), $data);
    }
}

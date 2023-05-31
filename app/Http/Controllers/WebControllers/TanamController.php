<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use App\Models\Tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class TanamController extends Controller
{
    function index()
    {
        $data['list_tanaman'] = Tanaman::all();
        return view('Web.Penanaman.index', $data);
    }
}

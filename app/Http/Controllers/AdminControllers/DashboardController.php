<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Tanaman;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    function index()
    {
        $tanaman = Tanaman::count();
        $event = Event::count();
        return view('Admin.Dashboard.index', compact('tanaman','event'));
    }
}

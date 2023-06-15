<?php

namespace App\Http\Controllers\WebControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KatalogPohonController extends Controller
{
    function index()
    {
        return view('Web.Katalog-Pohon.index');
    }
    function show()
    {
        return view('Web.Katalog-Pohon.show');
    }
}

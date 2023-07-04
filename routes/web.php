<?php

use App\Http\Controllers\AdminControllers\AuthController;
use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\TanamanController;
use App\Http\Controllers\AdminControllers\UserController;
use App\Http\Controllers\AdminControllers\AdminEventController;
use App\Http\Controllers\AdminControllers\AdminKatalogPohonController;
use App\Http\Controllers\AdminControllers\DokumentasiController;
use App\Http\Controllers\WebControllers\ErrorController;
use App\Http\Controllers\WebControllers\EventController;
use App\Http\Controllers\WebControllers\GisController;
use App\Http\Controllers\WebControllers\HomeController;
use App\Http\Controllers\WebControllers\InformasiController;
use App\Http\Controllers\WebControllers\KatalogPohonController;
use App\Http\Controllers\WebControllers\ProfilController;
use App\Http\Controllers\WebControllers\TanamController;
use App\Models\Dokumentasi;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('');
});


// Auth
Route::get('Auth/Login', [AuthController::class, 'showLogin'])->middleware('isTamu');
Route::post('Auth/Login', [AuthController::class, 'loginProcess'])->middleware('isTamu');
Route::get('Auth/Logout', [AuthController::class, 'logout']);
Route::get('Auth/Register', [AuthController::class, 'register'])->middleware('isTamu');
Route::post('Auth/Register', [AuthController::class, 'createAcount'])->middleware('isTamu');


// Dashboard
Route::get('Admin/Dashboard', [DashboardController::class, 'index'])->middleware('isError');

// katalog pohon
Route::get('Admin/Katalog-Pohon', [AdminKatalogPohonController::class, 'index'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/create', [AdminKatalogPohonController::class, 'create'])->middleware('isError');
Route::post('Admin/Katalog-Pohon', [AdminKatalogPohonController::class, 'store'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'show'])->middleware('isError');
Route::get('Admin/Katalog-Pohon/{katalog_pohon}/edit', [AdminKatalogPohonController::class, 'edit'])->middleware('isError');
Route::put('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'update'])->middleware('isError');
Route::delete('Admin/Katalog-Pohon/{katalog_pohon}', [AdminKatalogPohonController::class, 'destroy'])->middleware('isError');

// Tanaman
Route::get('Admin/Tanaman', [TanamanController::class, 'index'])->middleware('isError');
Route::get('Admin/Tanaman/create', [TanamanController::class, 'create'])->middleware('isError');
Route::post('Admin/Tanaman', [TanamanController::class, 'store'])->middleware('isError');
Route::get('Admin/Tanaman/{tanaman}', [TanamanController::class, 'show'])->middleware('isError');
Route::get('Admin/Tanaman/{tanaman}/edit', [TanamanController::class, 'edit'])->middleware('isError');
Route::put('Admin/Tanaman/{tanaman}', [TanamanController::class, 'update'])->middleware('isError');
Route::delete('Admin/Tanaman/{tanaman}', [TanamanController::class, 'destroy'])->middleware('isError');

// event
Route::get('Admin/Event', [AdminEventController::class, 'index'])->middleware('isError');
Route::get('Admin/Event/create', [AdminEventController::class, 'create'])->middleware('isError');
Route::post('Admin/Event', [AdminEventController::class, 'store'])->middleware('isError');
Route::get('Admin/Event/{event}', [AdminEventController::class, 'show'])->middleware('isError');
Route::get('Admin/Event/{event}/edit', [AdminEventController::class, 'edit'])->middleware('isError');
Route::get('Admin/Event/{event}/dokumentasi', [AdminEventController::class, 'dokumentasi'])->middleware('isError');
Route::put('Admin/Event/{event}', [AdminEventController::class, 'update'])->middleware('isError');
Route::delete('Admin/Event/{event}', [AdminEventController::class, 'destroy'])->middleware('isError');
// Route::get('Admin/Dokumentasi/{eventId}/create', [DokumentasiController::class, 'create'])->middleware('isError');
// Route::post('Admin/Dokumentasi', [DokumentasiController::class, 'store'])->middleware('isError');


// User
Route::get('Admin/User', [UserController::class, 'index'])->middleware('isError');
Route::get('Admin/User/create', [UserController::class, 'create'])->middleware('isError');
Route::post('Admin/User', [UserController::class, 'store'])->middleware('isError');
Route::get('Admin/User/{user}', [UserController::class, 'show'])->middleware('isError');
Route::get('Admin/User/{user}/edit', [UserController::class, 'edit'])->middleware('isError');
Route::put('Admin/User/{user}', [UserController::class, 'update'])->middleware('isError');
Route::delete('Admin/User/{user}', [UserController::class, 'destroy'])->middleware('isError');

//Error
Route::get('404', [ErrorController::class, 'index']);
Route::get('Profil', [ProfilController::class, 'index']);

//Web/Home
Route::get('/', [HomeController::class, 'index']);
Route::get('Home', [HomeController::class, 'index']);

//Web/Katalog Pohon
Route::get('Katalog-Pohon', [KatalogPohonController::class, 'index']);
Route::get('/getDeskripsiPohon/{id}', [KatalogPohonController::class, 'getDeskripsiPohon']);
Route::get('/Katalog-Pohon/{id}', [KatalogPohonController::class, 'show']);


//Web/Event
Route::get('Event', [EventController::class, 'index']);
Route::get('Event/{event}', [EventController::class, 'show']);

//Web/Tanam
Route::get('Penanaman', [TanamController::class, 'index']);
Route::get('Penanaman/{tanaman}', [TanamController::class, 'show']);

//Web/GIS
Route::get('GIS', [GisController::class, 'index']);

//Web/Informasi
Route::get('Informasi', [InformasiController::class, 'index']);
Route::get('Informasi/show', [InformasiController::class, 'show']);

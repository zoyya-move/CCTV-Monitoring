<?php

use Illuminate\Support\Facades\Route;
use App\Models\Cctv;
use App\Http\Controllers\CctvController;

// Halaman Welcome (Landing Page)
Route::get('/', function () {
    return view('welcome');
});

// Halaman Dashboard
Route::get('/dashboard', function () {
    $cctvs = Cctv::all();
    return view('dashboard', compact('cctvs'));
})->name('dashboard');

Route::get('/map', function () {
    $cctvs = Cctv::all();
    return view('map', compact('cctvs'));
});

// Route untuk CRUD CCTV
Route::resource('cctv', CctvController::class);

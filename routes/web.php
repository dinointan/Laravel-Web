<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
    return view('dashboard', compact('data'));
});



Route::get('/mahasiswa', [MahasiswaController::class, 'index']);

Route::get('/prodi', [ProdiController::class, 'index']);




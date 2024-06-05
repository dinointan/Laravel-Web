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
Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);

Route::get('/prodi', [ProdiController::class, 'index']);
Route::get('/prodi/tambah', [ProdiController::class, 'tambah']);
Route::post('/prodi/store', [ProdiController::class, 'store']);
Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
Route::put('/prodi/{id}', [ProdiController::class, 'update']);
Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);

// Route::resource('/prodi', ProdiController::class);






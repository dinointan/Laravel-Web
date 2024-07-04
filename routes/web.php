<?php

use App\Http\Controllers\LoginControlller;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use GuzzleHttp\Middleware;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    $data = ['nama' => "intan", 'foto' => 'E020322098.jpeg'];
    return view('dashboard', compact('data'));
})->name('home')->middleware('auth');

// Route::get('/mahasiswa', [MahasiswaController::class, 'index']);
// Route::get('/mahasiswa/tambah', [MahasiswaController::class, 'tambah']);
// Route::post('/mahasiswa/store', [MahasiswaController::class, 'store']);

// Route::get('/prodi', [ProdiController::class, 'index']);
// Route::get('/prodi/create', [ProdiController::class, 'create']);
// Route::post('/prodi/store', [ProdiController::class, 'store']);
// Route::get('/prodi/{id}/edit', [ProdiController::class, 'edit']);
// Route::put('/prodi/{id}', [ProdiController::class, 'update']);
// Route::delete('/prodi/{id}', [ProdiController::class, 'destroy']);
Route::resource('/prodi', ProdiController::class)->except('index')->middleware('admin');
Route::get('/prodi', [ProdiController::class, 'index'])->middleware('auth');
Route::resource('/mahasiswa', MahasiswaController::class)->except('index')->middleware('admin');
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->middleware('auth');

Route::get('/login', [LoginControlller::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginControlller::class, 'authenticate']);
Route::post('/logout', [LoginControlller::class, 'logout']);





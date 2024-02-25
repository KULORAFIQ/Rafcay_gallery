<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\AlbumController;


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

Route::get('/', function () {return view('index');});

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::resource('foto', 'FotoController');



// Rute untuk menampilkan halaman index foto
Route::get('/foto', [FotoController::class, 'index'])->name('foto.index');

// Rute untuk menampilkan halaman tambah foto
Route::get('/foto/create', [FotoController::class, 'create'])->name('foto.create');

// Rute untuk menyimpan foto baru
Route::post('/foto', [FotoController::class, 'store'])->name('foto.store');

// Rute untuk menampilkan halaman edit foto
Route::get('/foto/{foto}/edit', [FotoController::class, 'edit'])->name('foto.edit');

// Rute untuk memperbarui foto
Route::put('/foto/{foto}', [FotoController::class, 'update'])->name('foto.update');

// Rute untuk menghapus foto
Route::delete('/foto/{foto}', [FotoController::class, 'destroy'])->name('foto.destroy');




// Rute untuk menampilkan halaman index album
Route::get('/album', [AlbumController::class, 'index'])->name('album.index');

// Rute untuk menampilkan halaman tambah album
Route::get('/album/create', [AlbumController::class, 'create'])->name('album.create');

// Rute untuk menyimpan album baru
Route::post('/album', [AlbumController::class, 'store'])->name('album.store');

// Rute untuk menampilkan halaman edit album
Route::get('/album/{album}/edit', [AlbumController::class, 'edit'])->name('album.edit');

// Rute untuk memperbarui album
Route::put('/album/{album}', [AlbumController::class, 'update'])->name('album.update');

// Rute untuk menghapus album
Route::delete('/album/{album}', [AlbumController::class, 'destroy'])->name('album.destroy');

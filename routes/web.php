<?php

use App\Http\Controllers\MahasiswaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::view('about', 'about')->name('about');

    Route::get('mahasiswa', [\App\Http\Controllers\MahasiswaController::class, 'index'])->name('mahasiswa.index');
    Route::get('getKelas', [\App\Http\Controllers\MahasiswaController::class, 'getKelas'])->name('getKelas');
    Route::post('mahasiswa/store', [\App\Http\Controllers\MahasiswaController::class, 'store'])->name('mahasiswa.store');
    Route::get('mahasiswa/hapus/{id}', [MahasiswaController::class, 'delete'])->name('mahasiswa.delete');
    Route::get('mahasiswa/show', [MahasiswaController::class, 'getMahasiswa']);

    Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
    Route::put('profile', [\App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
});

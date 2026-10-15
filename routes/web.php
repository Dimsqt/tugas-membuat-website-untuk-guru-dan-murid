<?php // Dikerjakan secara mandiri

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InformasiController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Disini didefinisikan semua route untuk aplikasi website informasi sekolah.
| Route dibagi menjadi 3 grup: guest, admin, dan user.
*/

// redirect halaman utama ke login
Route::get('/', function () {
    return redirect()->route('login');
});

// route untuk guest (belum login)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.proses');
});

// route logout (harus sudah login)
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// route untuk admin (harus login + role admin)
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    // halaman dashboard admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD informasi
    Route::resource('/informasi', InformasiController::class)->names('informasi');
});

// route untuk user biasa (harus login + role user)
Route::middleware(['auth', 'user'])->prefix('user')->name('user.')->group(function () {
    // halaman beranda user
    Route::get('/beranda', [BerandaController::class, 'index'])->name('beranda');
    // detail informasi
    Route::get('/informasi/{informasi}', [BerandaController::class, 'show'])->name('informasi.show');
});

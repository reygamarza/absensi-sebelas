<?php

use App\Http\Controllers\ProfileController;

use App\Livewire\Operator\Dashboard\Main as OperatorDashboard;
use App\Livewire\Operator\KelasJurusan\Jurusan\Main as OperatorJurusan;
use App\Livewire\Operator\KelasJurusan\Kelas\Main as OperatorKelas;
use App\Livewire\Operator\DaftarPengguna\Kesiswaan\Main as OperatorKesiswaan;
use App\Livewire\Operator\DaftarPengguna\WaliKelas\Main as OperatorWaliKelas;
use App\Livewire\Operator\DaftarPengguna\WaliSiswa\Main as OperatorWaliSiswa;

use App\Livewire\Kesiswaan\Dashboard as KesiswaanDashboard;
use App\Livewire\Operator\Dashboard\Main;
use App\Livewire\WaliKelas\Dashboard as WaliKelasDashboard;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => '/operator', 'middleware' => ['can:isOperator']], function () {
        Route::get('/', OperatorDashboard::class)->name('operator.dashboard');
        Route::get('/kelas-jurusan/kelas', OperatorKelas::class)->name('operator.kelas');
        Route::get('/kelas-jurusan/jurusan', OperatorJurusan::class)->name('operator.jurusan');
        Route::get('/daftar-pengguna/kesiswaan', OperatorKesiswaan::class)->name('operator.kesiswaan');
        Route::get('/daftar-pengguna/wali-kelas', OperatorWaliKelas::class)->name('operator.wali-kelas');
        Route::get('/daftar-pengguna/wali-siswa', OperatorWaliSiswa::class)->name('operator.wali-siswa');
    });

    Route::group(['prefix' => '/kesiswaan', 'middleware' => ['can:isKesiswaan']], function () {
        Route::get('/', KesiswaanDashboard::class)->name('kesiswaan.dashboard');
    });

    Route::group(['prefix' => '/wali-kelas', 'middleware' => ['can:isWaliKelas']], function () {
        Route::get('/', WaliKelasDashboard::class)->name('wali-kelas.dashboard');
    });

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

<?php

use App\Http\Controllers\ProfileController;
use App\Livewire\Kesiswaan\Dashboard as KesiswaanDashboard;
use App\Livewire\Operator\Dashboard as OperatorDashboard;
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

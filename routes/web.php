<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurrentReservationController;
use App\Http\Controllers\EventSearchController;
use Illuminate\Support\Facades\Route;

// Breezeのデフォルトルート
Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ユーザー関連のルート
Route::get('user/login', function () {
    return view('auth.login'); //一旦Breezeのデフォルトログイン画面を仮置き
})->name('login');

Route::middleware('auth')->group(function () {
    // ホーム画面表示（現在の予約表示を含む）
    Route::get('/user/home', [CurrentReservationController::class, 'index'])->name('user.home');

    // イベント検索
    Route::get('/user/events/search', [EventSearchController::class, 'search'])->name('events.search');

    // イベント詳細
    Route::get('/event/{id}', [EventSearchController::class, 'show'])->name('event.show');

    // 申込確認
    Route::post('/event/{id}/confirm', [EventSearchController::class, 'confirm'])->name('event.confirm');

    // 申込完了
    Route::post('/event/{id}/complete', [EventSearchController::class, 'complete'])->name('event.complete');
});

// Breeze認証関連
require __DIR__.'/auth.php';

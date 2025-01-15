<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CurrentReservationController;
use App\Http\Controllers\EventSearchController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\RecommendController;
use Illuminate\Support\Facades\Route;

// Breezeのデフォルトルート
Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ユーザー関連のルート
// Route::get('user/login', function () {
//     return view('auth.login'); //一旦Breezeのデフォルトログイン画面を仮置き
// })->name('login');

Route::get('user/login', [AuthenticatedSessionController::class, 'create'])->name('login');
Route::post('user/login', [AuthenticatedSessionController::class, 'store']);

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

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

// レコメンド機能
Route::get('/recommend/question/1', [RecommendController::class, 'question1'])->name('recommend.question1');
Route::post('/recommend/question/1', [RecommendController::class, 'storeAnswer1']);

Route::get('/recommend/question/2', [RecommendController::class, 'question2'])->name('recommend.question2');
Route::post('/recommend/question/2', [RecommendController::class, 'storeAnswer2']);

Route::get('/recommend/question/3', [RecommendController::class, 'question3'])->name('recommend.question3');
Route::post('/recommend/question/3', [RecommendController::class, 'storeAnswer3']);

Route::get('/recommend/thankyou', [RecommendController::class, 'thankyou'])->name('recommend.thankyou');

// Breeze認証関連
require __DIR__.'/auth.php';

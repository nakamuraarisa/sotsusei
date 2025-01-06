<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventSearchController;
use Illuminate\Support\Facades\Route;


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

//以下は元々入ってた、Laravel Breezeのデフォルトのコード

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//ここから私が作ったもの

Route::get('user/login', function () {
    return view('auth.login'); //一旦Breezeのデフォルトログイン画面を仮置き
})->name('login');

Route::middleware('auth')->group(function () {
    Route::get('user/home', function () {
        return view('user.home'); //ログイン後のホーム画面
    })->name('home');
});

// 検索用ルート
Route::get('/user/home', [EventSearchController::class, 'search'])->name('events.search');

// 詳細ページ
Route::get('/event/{id}', [EventSearchController::class, 'show'])->name('event.show');

// 申込内容確認
Route::post('/event/{id}/confirm', [EventSearchController::class, 'confirm'])->name('event.confirm');

// 申込完了
Route::post('/event/{id}/complete', [EventSearchController::class, 'complete'])->name('event.complete');

require __DIR__.'/auth.php';

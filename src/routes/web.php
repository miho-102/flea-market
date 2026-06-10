<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;

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

Route::get('/home', function () {return redirect('/');});


Route::get('/logout-test', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
});

Route::get('/mypage/profile', [ProfileController::class, 'edit'])
    ->middleware('auth');

Route::post('/mypage/profile', [ProfileController::class, 'update'])
    ->middleware('auth');

Route::get('/', [ItemController::class, 'index']);


Route::get('/item/{item_id}', [ItemController::class, 'show']);

Route::post('/item/{item_id}/comments',[CommentController::class, 'store'])
    ->middleware('auth');

Route::post('/item/{item_id}/like',[LikeController::class, 'store'])
    ->middleware('auth');
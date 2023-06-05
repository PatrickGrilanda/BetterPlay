<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BetterPlayController;
use App\Http\Controllers\VideoPlayerController;

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

Route::get('/', function () {
    return view('home');
});

Route::get('/movies', [BetterPlayController::class, 'index'])->name('betterplay.index');

Route::get('/play/{id}', [VideoPlayerController::class, 'player'])->name('video.play');

<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SocialiteController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/auth/redirect',[SocialiteController::class,'redirectGoogle'])->name('redirect.google');
Route::get('/google/redirect',[SocialiteController::class,'googleCallback'])->name('google.callback');
Route::post('login/action',[LoginController::class, 'actionlogin'])->name('loginAction');
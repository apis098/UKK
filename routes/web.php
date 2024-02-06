<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\HomeController;
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
Route::get('/',[HomeController::class,'welcome'])->name('welcome');

Auth::routes();


Route::get('/auth/redirect',[SocialiteController::class,'redirectGoogle'])->name('redirect.google');
Route::get('/google/redirect',[SocialiteController::class,'googleCallback'])->name('google.callback');
Route::post('login/action',[LoginController::class, 'actionlogin'])->name('loginAction');

Route::middleware('auth')->group(function(){
     Route::get('/home', [HomeController::class, 'index'])->name('home');
     Route::get('/completeness',[HomeController::class,'completeness'])->name('completeness.index');
     // Kelas
     Route::resource('classes',ClassesController::class);
 });
<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\CollectionController;
use App\Http\Controllers\CompletenessController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\SocialiteController;
use App\Http\Controllers\TaskController;
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
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');

Auth::routes();


Route::get('/auth/redirect', [SocialiteController::class, 'redirectGoogle'])->name('redirect.google');
Route::get('/google/redirect', [SocialiteController::class, 'googleCallback'])->name('google.callback');
Route::post('login/action', [LoginController::class, 'actionlogin'])->name('loginAction');
Route::post('register/action', [RegisterController::class, 'store'])->name('register.store');
Route::put('update-password', [LoginController::class,'updatePassword'])->name('update.password');
Route::middleware('auth')->group(function () {
   Route::get('/home', [HomeController::class, 'index'])->name('home');
   // classes
   Route::resource('classes', ClassesController::class);
   Route::post('join-class', [ClassesController::class, 'joinClass'])->name('join.class');
   Route::delete('outClass', [ClassesController::class, 'outClass'])->name('out.class');
   //  Completeness
   Route::resource('completeness', CompletenessController::class);
   // Materials
   Route::resource('materials',MaterialsController::class);
   Route::get('form/materials/{class_id}',[MaterialsController::class,'materialsCreate'])->name('materials.form');
   Route::post('add/materials/{class_id}',[MaterialsController::class,'addMaterials'])->name('materials.add');
   // Task
   Route::resource('task',TaskController::class);
   Route::get('task/create/{class_id}',[TaskController::class,'taskCreate'])->name('task.form');
   Route::post('task/store/{class_id}',[TaskController::class,'taskStore'])->name('task.add');
   Route::delete('delete-atachment/{id}',[TaskController::class,'deleteAtachment'])->name('task.atachment.delete');
   // collections
   Route::resource('collection',CollectionController::class);
   Route::post('task/collect/{task_id}',[CollectionController::class,'collect'])->name('collect.store');
   Route::post('mark/collection/{id}',[CollectionController::class,'markCollection'])->name('mark.collection');
   // notifications
   Route::resource('notification', NotificationController::class);
   Route::patch('read-all-notification',[NotificationController::class,'readAllNotifications'])->name('read.all.notification');
   Route::delete('delete-all-notification',[NotificationController::class,'deleteAllNotifications'])->name('delete.all.notification');
});
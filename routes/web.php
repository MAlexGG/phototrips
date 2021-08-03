<?php

use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

Route::get('/photos', [PhotoController::class, 'index'])->name('photos');
Route::get('/photos/create', [PhotoController::class, 'create'])->name('create')->middleware('auth');
Route::post('/photos/store', [PhotoController::class, 'store'])->name('store')->middleware('auth');
Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('show');
Route::get('/photos/edit/{photo}', [PhotoController::class, 'edit'])->name('edit')->middleware('auth');
Route::put('/photos/{photo}', [PhotoController::class, 'update'])->name('update')->middleware('auth');
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('delete')->middleware('auth');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

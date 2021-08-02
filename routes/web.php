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
Route::get('/photos/create', [PhotoController::class, 'create'])->name('create');
Route::post('/photos/store', [PhotoController::class, 'store'])->name('store');
Route::get('/photos/{photo}', [PhotoController::class, 'show'])->name('show');

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

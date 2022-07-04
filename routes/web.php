<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImageUploadController;
use App\Http\Controllers\UpdateUserInfoController;
use App\Http\Controllers\PostController;
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

Route::get('/', function () {
    return view('home');
})->middleware(['guest']);

Route::get('/about', function () {
    return view('about');
})->middleware(['guest'])->name('about');
Route::get('/profile',[DashboardController::class, 'show_profile'])->middleware(['auth'])->name('profile');
Route::get('/dashboard',[DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard', [ ImageUploadController::class, 'imageUploadPost' ])->middleware(['auth'])->name('image-upload-post');
Route::post('/d', [UpdateUserInfoController::class, 'updatename'])->middleware(['auth'])->name('updatename');
route::post('/a', [UpdateUserInfoController::class, 'updateemail'])->middleware(['auth'])->name('updateemail');
route::post('/s', [UpdateUserInfoController::class, 'updatepassword'])->middleware(['auth'])->name('updatepassword');

require __DIR__.'/auth.php';

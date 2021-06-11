<?php

use Illuminate\Support\Facades\Route;
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
Route::group(['middleware' => 'auth'], function() {
    Route::post('/classes/comment/{id}', [PostController::class, 'ajaxrequestpost'])->name('ajaxRequest.post');
    Route::post('/classes/reply/{id}', [PostController::class, 'ajaxrequestpost1'])->name('ajaxRequest.post1');
    Route::post('classes/post/{id}', [PostController::class, 'store'])->name('post.store');
    Route::post('classes/post/edit/{id}', [PostController::class, 'edit'])->name('edit.post');
    Route::delete('classes/post/delete/{id}', [PostController::class, 'delete'])->name('delete.post');
    Route::post('classes/comment', [PostController::class, 'store_comment'])->name('comment.store');
});
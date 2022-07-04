<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\ChatController;
use App\Models\Classroom;
use App\Http\Controllers\PostController;
Route::group(['middleware' => ['auth','role:teacher']], function() {
    Route::get('/create_classroom', [ClassroomController::class, 'index'])->name('create_classroom');
    Route::post('/create_classroom', [ClassroomController::class, 'store']);
    Route::delete('/classes/delete/{id}',[ClassroomController::class, 'destroy'])->name('destroy');
    Route::delete('/classes/delete1/{id}',[ClassroomController::class, 'destroy1'])->name('destroy1');
    Route::post('/classes/courses/{id}', [ClassroomController::class, 'courseUploadPost'])->name('course.upload.post');
    Route::delete('/classes/courses/delete/{id1}',[ClassroomController::class, 'destroy_file'])->name('destroy_file');
    Route::post('/classes/members/remove/{id1}/{id}',[ClassroomController::class, 'remove_member'])->name('remove_member');
    Route::post('/classes/accept/{id1}/{id}',[ClassroomController::class, 'accept'])->name('accept');
    Route::post('/classes/deny/{id1}/{id}',[ClassroomController::class, 'deny'])->name('deny');
    Route::get('/classes/validation/{id}', [ClassroomController::class, 'valid_show']);
    Route::post('/classes/update/name/{id}',[ClassroomController::class, 'update_class_name'])->name('update.class.name');
    Route::post('/classes/update/code/{id}',[ClassroomController::class, 'update_class_code'])->name('update.class.code');
    Route::post('/classes/update/desc/{id}',[ClassroomController::class, 'update_class_desc'])->name('update.class.desc');
    Route::get('/classes/settings/{id}', [ClassroomController::class, 'settings'])->name('settings');  
    Route::get('/classes/reported_msgs/{id}', [ChatController::class, 'report_show'])->name('report_show');
    Route::POST('/classes/prevent/{id1}/{id}/{id2}', [ChatController::class, 'prevent_chat'])->name('prevent_chat');
    Route::post('/classes/members/remove/{id1}/{id}/{id2}',[ClassroomController::class, 'remove_member1'])->name('remove_member1');
    Route::POST('/classes/ignore/{id}', [ChatController::class, 'ignore'])->name('its_ok');
});
Route::group(['middleware' => ['auth','role:student']], function() {
    Route::post('/classes/rate/{id}',[ClassroomController::class, 'rate'])->name('rate');
    Route::get('/join_classroom', [ClassroomController::class, 'index'])->name('join_classroom');
    route::post('/join_classroom', [ClassroomController::class, 'join']);
    route::post('/join_classroom/{id}', [ClassroomController::class, 'join_public'])->name('join_public');
    Route::post('/classes/withdraw/{id}',[ClassroomController::class, 'withdraw'])->name('withdraw');
    Route::post('/classes/withdraw1/{id}',[ClassroomController::class, 'withdraw1'])->name('withdraw1');
    Route::get('/classes/chatroom/{id}', [ChatController::class, 'chat_show'])->name('chat_show');
Route::POST('/classes/report/{id}', [ChatController::class, 'report'])->name('report');
Route::post('/classes/send_msg/{id}',[ChatController::class, 'send'])->name('send');
Route::POST('/classes/data/{id}/{id1}', [ChatController::class, 'get_messages'])->name('get_messages');
});
Route::get('/search_classroom', [ClassroomController::class, 'search'])->name('search_classroom');
Route::POST('/classes/data/{id}', [ChatController::class, 'change_status'])->name('change_status');
Route::get('/courses/download/{name}',[ClassroomController::class, 'download'])->name('download')->middleware('auth');
Route::get('/classes/{id}',[ClassroomController::class, 'index1'])->name('class_view')->middleware('auth');
Route::get('/classes/courses/{id}', [ClassroomController::class, 'courseUpload'])->middleware('auth')->name('Course.upload');
Route::get('/classes/members/{id}', [ClassroomController::class, 'members'])->name('members')->middleware('auth');


Route::get('/desc/{id}',[ClassroomController::class, 'desc']) ->name('desc')->middleware('auth');
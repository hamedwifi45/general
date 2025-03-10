<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [PostController::class,'index']);
Route::get('/post/view/{post:slug}', [PostController::class, 'show'])->name('post.show');

Route::resource('/post',PostController::class)->except('show');
Route::resource('/comment',CommentController::class);
Route::post('/replay/store' , [CommentController::class ,'replayStore'])->name('replay.add');
Route::get('/category/{id}/{slug}' , [PostController::class , 'getcategory'])->name('category');
Route::post('/search' , [PostController::class , 'search'])->name('search');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});














require_once __DIR__ . '/fortify.php';
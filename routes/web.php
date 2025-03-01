<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [PostController::class,'index']);
Route::resource('/post',PostController::class);
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
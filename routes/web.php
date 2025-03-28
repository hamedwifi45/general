<?php

use App\Http\Controllers\admin\Dashbord;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\admin\posts;
use App\Http\Controllers\PermisstionController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/' , [PostController::class,'index']);
Route::get('/post/view/{post:slug}', [PostController::class, 'show'])->name('post.show');
Route::post('/post/view/{post:slug}/edit', [PostController::class, 'edit'])->name('post.edit');

Route::resource('/post',PostController::class)->except('show' , 'edit');

Route::resource('/comment',CommentController::class);
Route::post('/replay/store' , [CommentController::class ,'replayStore'])->name('replay.add');
Route::get('/category/{id}/{slug}' , [PostController::class , 'getcategory'])->name('category');
Route::post('/search' , [PostController::class , 'search'])->name('search');
Route::post('/notifi' , [NotificationController::class , 'index'])->name('notifi');
Route::get('/notifiction' , [NotificationController::class , 'allNotification'])->name('all.Notification');


Route::get('admin/dashboard', [Dashbord::class , 'index'])->name('admin.dashbord');
Route::resource('admin/category', CategoryController::class);
Route::resource('admin/posts',posts::class);
Route::resource('admin/roles',RoleController::class);
Route::resource('admin/user',UserController::class);
Route::get('admin/permission',[PermisstionController::class , 'index'])->name('permission');
Route::post('admin/permission',[PermisstionController::class , 'store'])->name('permissions');

Route::get('/heloworld/{id}' , [UserController::class , 'getPostsByUser'])->name('profile');
Route::get('/heloworld/{id}/comment' , [UserController::class , 'getCommentsByUser'])->name('Comments');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});








Route::get('permission',[RoleController::class , 'getByRole'])->name('permission.get');






require_once __DIR__ . '/fortify.php';
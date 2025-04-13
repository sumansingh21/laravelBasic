<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\PostControllerWithModel;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/posts',[PostControllerWithModel::class,'index']);

// Route::get('/posts/create',[PostControllerWithModel::class,'create']);

// Route::post('/posts', [PostControllerWithModel::class, 'store']);

// Route::get('/posts/{id}', [PostControllerWithModel::class, 'show']);

// Route::get('/posts/{id}/edit', [PostControllerWithModel::class, 'edit']);

// Route::put('/posts/{id}',[PostControllerWithModel::class, 'update']);

// Route::delete('/posts/{id}',[PostControllerWithModel::class, 'destroy']);

Route::view('/', 'welcome');

Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostControllerWithModel::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostControllerWithModel::class, 'store'])->name('posts.store');
    Route::get('/posts/{post}/edit', [PostControllerWithModel::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{post}', [PostControllerWithModel::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostcontrollerWithModel::class, 'destroy'])->name('posts.destroy');
    Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
});

// Route::resource('/posts', PostControllerWithModel::class);

Route::get('/posts', [PostControllerWithModel::class, 'index'])->name('posts.index');
Route::get('/posts/{post}', [PostControllerWithModel::class, 'show'])->middleware('can-view-post')->name('posts.show');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterUserController::class, 'register'])->name('register');
    Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');
    Route::get('/login', [LoginUserController::class, 'login'])->name('login');
    Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');
});

Route::get('/test', function () {
    return "<h1> Test </h1>";
});

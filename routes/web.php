<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
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

Route::get('/', [App\Http\Controllers\PostController::class, 'BlogPage'])->name('blogs');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'valid_user'], function () {

    Route::get('user/posts', [App\Http\Controllers\PostController::class, 'index'])->name('user.posts');

    Route::get('user/post/create', [App\Http\Controllers\PostController::class, 'create'])->name('user.posts.create');

    Route::post('user/post/create', [App\Http\Controllers\PostController::class, 'store'])->name('user.posts.store');

    Route::get('user/post/edit/{id}', [App\Http\Controllers\PostController::class, 'edit'])->name('user.posts.edit');

    Route::post('user/post/update/{id}', [App\Http\Controllers\PostController::class, 'update'])->name('user.posts.update');

    Route::get('user/post/delete/{id}', [App\Http\Controllers\PostController::class, 'destroy'])->name('user.posts.delete');
});

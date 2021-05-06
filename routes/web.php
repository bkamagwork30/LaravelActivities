<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CommentController;
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
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', function () {
    return redirect('/posts');
});

Route::resource('/posts',PostController::class);
Route::resource('/comments', CommentController::class);

// Route::middleware(['auth'])->group(function () {
//     Route::resource('posts',PostController::class)->only([
//         'create', 'edit', 'destroy', 'store', 'update'
//     ]);
// }); 

// Route::get('/posts',[PostController::class,'index'])->name('index');
// Route::get('/posts/{id}',[PostController::class,'show'])->name('show');

// My Account: 
//  email: dennis.paralejas10@gmail.com
//  password: admin123
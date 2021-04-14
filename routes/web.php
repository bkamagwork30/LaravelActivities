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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('/posts',PostController::class);

// Route::middleware(['auth'])->group(function () {
//     Route::resource('posts',PostController::class)->only([
//         'create', 'edit', 'destroy', 'store', 'update'
//     ]);
// }); 

// Route::get('/posts',[PostController::class,'index'])->name('index');
// Route::get('/posts/{id}',[PostController::class,'show'])->name('show');

// My Account: 
//  email: dennis.paralejas10@gmail.com
//  password: august092019
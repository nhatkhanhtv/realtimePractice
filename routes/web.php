<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('post',[PostController::class,'index']);
Route::get('post/create',[PostController::class,'create']);
Route::get('post/{post}/edit',[PostController::class,'edit']);
Route::post('post',[PostController::class,'store'])->name('post.store');

Route::put('post/{post}/update',[PostController::class,'update'])->name('post.update');
Route::delete('post/{post}/delete',[PostController::class,'destroy'])->name('post.delete');

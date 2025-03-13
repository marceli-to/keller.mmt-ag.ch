<?php
use Illuminate\Support\Facades\Route;

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

Route::view('/', 'posts')->name('posts');
Route::view('/projektteam', 'team')->name('team');
Route::view('/zeitplan', 'schedule')->name('schedule');
Route::view('/webcam', 'webcam')->name('webcam');

Route::middleware(['auth', 'verified'])->group(function () {
  Route::view('post/create', 'posts')->name('post.create');
  Route::view('post/update/{post}', 'posts')->name('post.update');
});

require __DIR__.'/auth.php';

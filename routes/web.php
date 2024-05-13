<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;


Route::get('/',[HomeController::class,'index'])->name('main.index');


Route::get('/main',[MyPlaceController::class,'index'])->name('main.index');
Route::get('/auth',[AuthController::class,'AuthStatus'])->name('authcheck.index');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');
Route::get('/posts',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::patch('/posts/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.delete');

//Route::post('/logout',[LoginController::class,'logout'])->name('logout');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('authcheck.index');  // Перенаправление на главную страницу после выхода
})->name('logout');



Route::get('/admin',[AdminController::class,'index'])->name('admin.index')->middleware('auth');


Route::get('/posts/delete',[PostController::class,'Delete']);
Route::get('/posts/firstorcreate',[PostController::class,'firstOrCreate']);
Route::get('/posts/updateorcreate',[PostController::class,'updateOrCreate']);
Route::get('/contacts',[ContactController::class,'ShowContacts'])->name('contacts.index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

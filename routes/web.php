<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyPlaceController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
  

Route::get('/', function () {
    return 'welcomewfewfwfw';
});


Route::get('/hello',[MyPlaceController::class,'hello'])->name('hello.index');
Route::get('/auth',[AuthController::class,'AuthStatus'])->name('authcheck.index');
Route::get('/profile',[ProfileController::class,'index'])->name('profile.index');  
Route::get('/posts',[PostController::class,'index'])->name('posts.index'); 
Route::get('/posts/create',[PostController::class,'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');  
Route::patch('/posts/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.delete');  

 
Route::get('/posts/delete',[PostController::class,'Delete']);  
Route::get('/posts/firstorcreate',[PostController::class,'firstOrCreate']);  
Route::get('/posts/updateorcreate',[PostController::class,'updateOrCreate']); 
Route::get('/contacts',[ContactController::class,'ShowContacts'])->name('contacts.index');  

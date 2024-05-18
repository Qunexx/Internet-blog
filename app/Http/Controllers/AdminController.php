<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
public function index(){
    $postCount = Post::count();
    $likesCount = Post::sum('likes');
    $usersCount = User::count();
return view("layout.admin",compact('postCount','likesCount','usersCount'));
}}



<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function AuthStatus(){
        if(Auth::check()){
            $status = 'Authentificated';
        }
        else{
            $status = 'Not authentificated';
        }
        return view("authcheck",compact('status'));
    }
}

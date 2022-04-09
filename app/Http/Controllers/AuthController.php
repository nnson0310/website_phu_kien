<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Models\User;
use Socialite;
use Session;
use URL;
use Auth;
use Exception;

class AuthController extends Controller
{   
    //
    public function googleLogin(){
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        return $user->token;
    }
}

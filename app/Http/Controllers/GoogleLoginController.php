<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Str;

class GoogleLoginController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver("google")->redirect();
    }

    public function handleGoogle(Request $request){
        $googleUser = Socialite::driver("google")->user();
        $user = User::where("email", $googleUser->email)->first();
        if(!$user){
            $user = new User();
            $user->name = $googleUser->name;
            $user->email = $googleUser->email;
            $user->password = Hash::make(Str::random(9));
            $user->save();
        }
        Auth::login($user);
        return redirect()->route('home');
    }
}

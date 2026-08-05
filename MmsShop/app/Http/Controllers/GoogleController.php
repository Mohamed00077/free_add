<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class GoogleController extends Controller
{


public function callback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();

    $user = User::where('email', $googleUser->email)->first();

    if (!$user) {
        $user = User::create([
            'login' => $googleUser->name,
            'email' => $googleUser->email,
            'password' => null,
        ]);
    }
   
    auth()->login($user);
    if(auth()->user()->role ==='admin'){
        return redirect('/admin');
    }
    return redirect('/dashboard');
}




public function redirect()
{
    return Socialite::driver('google')->stateless()->redirect();
}


}

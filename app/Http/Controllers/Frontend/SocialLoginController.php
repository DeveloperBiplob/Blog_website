<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SocialNewUserMail;
use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SocialLoginController extends Controller
{
    public function login($provider)
    {
        // return Socialite::driver('github')->redirect();

        // Dynamicly Provider pass. jeta ke route e pass kore dichi.
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {

        $userSocial = Socialite::driver($provider)->user();

        // dd($userSocial);
        // dd($userSocial->getEmail);
        // $user->token

        $user = User::whereEmail($userSocial->getEmail())->first();
        if(!$user){
            $user = User::create([
                'name' => $userSocial->getName(),
                'email' => $userSocial->getEmail(),
                'image' => $userSocial->getAvatar(),
                'password' => bcrypt('password'),
            ]);
            
            // SocialNewUserMail() constructor e newUser er instance ta pass kore dibo.
            Mail::to($user->email)->send(new SocialNewUserMail($user));
        }
        Auth::guard('user')->login($user);
        return redirect()->route('user-dashboard');
    }
}

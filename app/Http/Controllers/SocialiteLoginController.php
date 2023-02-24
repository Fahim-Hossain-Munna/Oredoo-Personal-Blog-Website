<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Auth;

class SocialiteLoginController extends Controller
{
    public function github_redirect(){
        return Socialite::driver('github')->redirect();
    }
    public function github_callback(){
        $user = Socialite::driver('github')->user();
        if (Auth::attempt(['email' => $user->getEmail(), 'password' => 'github_login'])) {
            return redirect()->route('home');
        }else{
            $newUser =User::updateOrCreate([
                'name' =>$user->getName(),
                'email' =>$user->getEmail(),
                'password' => bcrypt('github_login'),
                'role' =>'blogger',
                'email_verified_at' => now(),
                'created_at' => now(),
            ]);

            Auth::login($newUser);
        }
    }
}

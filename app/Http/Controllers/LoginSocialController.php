<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        $this->loginOrRegister($user);
    }

    private function loginOrRegister($data){
        //dd($data);

        $user = User::where('email','=',$data->email)->first();
        dd($user);

        if(!$user){
            //dd($user);
            $user = User::create([
                'name' => $data->nickname,
                'avatar' => $data->avatar,
                'email' => $data->email,
                'password' => ''
            ]);
        }

        Auth::login($user);

        return redirect()->route('dashboard');
    }

}

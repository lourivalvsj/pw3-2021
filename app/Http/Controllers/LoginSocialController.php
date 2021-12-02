<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginSocialController extends Controller
{
    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback(){
        $user = Socialite::driver('google')->stateless()->user();
        //dd($user);
        if ($this->loginOrRegister($user)){
            return redirect()->route('dashboard');
        };

    }

    public function redirectToGithub(){
        return Socialite::driver('github')->redirect();
    }

    public function handleGithubCallback(){
        $user = Socialite::driver('github')->stateless()->user();
        if ($this->loginOrRegister($user)){
            return redirect()->route('dashboard');
        };

    }

    private function loginOrRegister($data){
        //dd($data);
        $user =User::where('email', '=',$data->email)->first();
        //dd($user);

        if(!$user){
            //dd($user);
            if($data->nickname != null){
                $user = User::create([
                    'name' => $data->nickname,
                    'avatar' => $data->avatar,
                    'email' => $data->email,
                    'password' => ''
                ]);

            }else{
                $user = User::create([
                    'name' => $data->name,
                    'avatar' => $data->avatar,
                    'email' => $data->email,
                    'password' => ''
                ]);
            }
        }

        Auth::login($user,true);

        return true;
    }

}

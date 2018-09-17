<?php

namespace App\Http\Controllers\auth;
use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SocialAuthController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback () {
        $google_user = Socialite::driver('google')->stateless()->user();

        if ($user = User::where('email', $google_user->email)->first() ) {
            return $this->authAndRedirect($user);
        } else {
            $user  = User::create([
                'name' => $google_user->name,
                'email' => $google_user->email,
                'avatar' => $google_user->avatar
            ]);
            return $this->authAndRedirect($user);
        }
    }

    public function authAndRedirect ($user) 
    {
        Auth::login($user);

        return redirect()->to('/home');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginWithGooglecontroller extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {

        $google_user = Socialite::driver('google')->stateless()->user();

        $finduser = User::where('google_id', $google_user->id)->first();

        if ($finduser) {

            Auth::login($finduser);

            return redirect('/');
        } else {
            $newUser = User::create([
                'name' =>  explode(" ", $google_user->name)[0],
                'surname' => explode(" ", $google_user->name)[1],
                'email' => $google_user->email,
                'google_id' => $google_user->id,
                'password' => encrypt('123456dummy')
            ]);

            Auth::login($newUser);

            return redirect('/');
        }
    }
}

<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;;

use Exception;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GithubController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGithub()
    {

        return Socialite::driver('github')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {

        $user = Socialite::driver('github')->user();

        $finduser = User::where('git_id', $user->id)->first();

        if ($finduser) {
          
            Auth::guard('web')->login($finduser);
            return redirect()->route('index');
        } else {
          
            $newUser = User::create([
                'name' => $user->name,
                'email' => $user->email,
                'git_id' => $user->id,
                'social_type' => 'github',
                'password' => encrypt('github123456')
            ]);
            Auth::guard('web')->login($newUser);
            return redirect()->route('index');
        }
    }
}

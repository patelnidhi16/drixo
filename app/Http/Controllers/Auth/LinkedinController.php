<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

use Exception;


use Illuminate\Support\Facades\Auth;

class LinkedinController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToLinkedin()
    {
      
        return Socialite::driver('linkedin')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleCallback()
    {
        try {
     
            $user = Socialite::driver('linkedin')->user();
      
            $finduser = User::where('linkedin_id', $user->id)->first();
      
            if($finduser){
      
                Auth::guard('web')->login($finduser);
                return redirect()->route('index');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'linkedin_id'=> $user->id,
                    'social_type'=> 'linkedin',
                    'password' => encrypt('my-linkedin')
                ]);
     
                Auth::guard('web')->login($newUser);
            return redirect()->route('index');
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    
}

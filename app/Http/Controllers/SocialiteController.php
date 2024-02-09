<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
Use Str;
class SocialiteController extends Controller
{
    public function redirectGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function googleCallback(){
        $googleUser = Socialite::driver('google')->user();
        // $picture = $googleUser->user['picture'];
        $data = User::Where('email', $googleUser->email)->first();
        if($data){
            Auth::login($data);
            if($data->role != 'student' || $data->role != 'theacer'){
                return redirect()->route('completeness.index');
            }else{
                return redirect()->route('home');
            }
        }else{
            $data = new User();
            $data->name = $googleUser->name;
            $data->email = $googleUser->email;
            $data->foto = "";
            $data->password = 'default_password';
            $data->google_id = 1;
            $data->role = 'user';
            $data->user_code = Str::random(10);
            $data->save();
            Auth::login($data);
            if($data->role != 'student' || $data->role != 'theacer'){
                return redirect()->route('completeness.index');
            }else{
                return redirect()->route('home');
            }
        }
    }
}

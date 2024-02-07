<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\PivotClass;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->role == 'student'){
            $user_id = auth()->user()->id;
            // cara 1
            $class = Classes::whereHas('member', function ($query) use ($user_id) {
                $query->where('user_id', $user_id);
            })->get();
            // cara 2
            $classes = User::find($user_id)->classes;
            return view('student.home',compact('classes'));
        }elseif(auth()->user()->role == 'theacer'){
            $classes = Classes::where('user_id',auth()->user()->id)->paginate(6);
            return view('theacer.home',compact('classes'));
        }else{
            return redirect()->route('completeness.index');
        }
    }
    public function welcome(){
        if(Auth::check()){
            $data = Auth::User();
            if($data->role != 'student' || $data->role != 'theacer'){
                return redirect()->route('completeness.index');
            }else{
                return redirect()->route('home');
            }
       }else{
            return view('auth.login');
       }
    }
}

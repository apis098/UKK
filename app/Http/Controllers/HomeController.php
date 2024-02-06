<?php

namespace App\Http\Controllers;

use App\Models\Classes;
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
            return view('student.home');
        }elseif(auth()->user()->role == 'theacer'){
            $classes = Classes::where('user_id',auth()->user()->id)->paginate(6);
            // dd($classes);
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

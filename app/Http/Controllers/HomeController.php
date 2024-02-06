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
        }else{
            $classes = Classes::where('user_id',auth()->user()->id)->paginate(6);
            // dd($classes);
            return view('theacer.home',compact('classes'));
        }
    }
    public function welcome(){
        if(Auth::check()){
            return redirect('/home');
       }else{
            return view('auth.login');
       }
    }
    public function completeness(){
        return view('complete');
    }
}

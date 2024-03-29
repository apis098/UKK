<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function actionLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email', 
            'password' => 'required', 
        ], [
            'email.required' => 'Email tidak boleh kosong.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password tidak boleh kosong.',
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($data)) {
            $user = Auth::user();
            if($user->role != 'student' || $user->role != 'theacer'){
                return redirect()->route('completeness.index');
            }else{
                return redirect()->route('home');
            }
        } else {
            return redirect()->back()->with('error', 'Email atau Password Salah')->withInput();
        }
    }
    public function updatePassword(Request $request){
        $request->validate(
            [
                'password' => 'required',
                'password_confirmation' => 'same:password|required'
            ],
            [
                'password.required' => 'Inputan password harus di isi',
                'password_confirmation.same' => 'Inputan password tidak sama', 
            ]);
        $user = User::where('email',$request->email)->first();
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/login')->with('success','Berhasil memperbarui sandi, silahkan login di halaman ini');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }
}

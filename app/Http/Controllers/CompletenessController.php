<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompletenessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $user = Auth::user();
        if($user->role!='student' && $user->role!='theacer'){
            return view('complete');
        }else{
            return redirect('/home');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $imageinpu = $request->file('gambar');
        // $namaFile = time() . '.' . $gambar->getClientOriginalExtension();
        // $gambar->storeAs('public/gambar', $namaFile);
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->dateofbirth = $request->dateofbirth;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->save();
        return redirect('home')->with('success','Selamat! data diri anda sudah terkirim. Silahkan nikmati fitur yang kami sediakan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class CompletenessController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        if ($user->role != 'student' && $user->role != 'theacer') {
            return view('complete');
        } else {
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
        $request->validate(
            [
                'dateofbirth' => 'required|date|before_or_equal:today',
                'name' => 'required',
                'gender' => 'required',
                'role' => 'required',
                'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ],
            [
                'dateofbirth.required' => 'Inputan tanggal lahir belum terisi',
                'dateofbirth.date' => 'Inputan tanggal lahir harus berupa tanggal',
                'dateofbirth.before_or_equal' => 'Inputan tanggal lahir tidak diperbolehkan lebih dari hari ini',
                'name.required' => 'Inputan nama harus di isi',
                'gender.required' => 'Inputan gender harus di isi',
                'foto.image' => 'Inputan profile harus berupa gambar',
                'foto.mimes' => 'Format gambar tidak valid. Gunakan format JPEG, PNG, JPG, atau GIF.',
                'role.required' => 'Anda belum memilih status pengguna.',
            ]
        );
        $user = User::findOrFail(auth()->user()->id);
        $user->name = $request->name;
        $user->dateofbirth = $request->dateofbirth;
        $user->gender = $request->gender;
        $user->role = $request->role;
        $user->institute = $request->institute;
        $user->save();
        if ($request->hasFile('foto')) {
            $profilePicturePath = $request->file('foto')->store('profile_pictures', 'public');
            $user->google_id = 0;
            $user->foto = $profilePicturePath;
            $user->save();
        }
        return redirect('home')->with('success', 'Selamat! data diri anda sudah terkirim. Silahkan nikmati fitur yang kami sediakan');
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

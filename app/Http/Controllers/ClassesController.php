<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $backgrounds = ['class1.jpg', 'class2.jpg', 'class3.jpg', 'class4.jpg', 'class5.jpg', 'class5.jpg','class6.jpg'];
 
        $usedBackgrounds = Classes::pluck('image')->toArray();
        $availableBackgrounds = array_diff($backgrounds, $usedBackgrounds);
        if (empty($availableBackgrounds)) 
        {
            $background = $backgrounds[0];
        } else {
            $background = reset($availableBackgrounds);
        }
        // dd($background);
        $data = new Classes();
        $data->name = $request->name;
        $data->part = $request->part;
        $data->lesson = $request->lesson;
        $data->room = $request->room;
        $data->user_id = auth()->user()->id;
        $data->image = $background;
        $data->save();
        
        return redirect()->back()->with('success','Kelas berhasil dibuat');
    }
    private function generateRandomImage()
    {
        $imagesInFolder = Storage::files('public/background');
        $usedImageNames = Classes::pluck('image')->toArray();
    
        // Pastikan $usedImageNames adalah array
        if (!is_array($usedImageNames)) {
            $usedImageNames = [];
        }
    
        $availableImages = array_diff($imagesInFolder, $usedImageNames);
    
        if (!empty($availableImages)) {
            return basename($availableImages[0]);
        }
    
        return basename($imagesInFolder[0]);
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

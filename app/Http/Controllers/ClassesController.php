<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\PivotClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Str;

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
    public function outClass(Request $request){
        $user_id = $request->user_id;
        $class_id = $request->class_id;
        $pivotClass = PivotClass::where('user_id',$user_id)->where('class_id',$class_id)->first();
        $pivotClass->delete();
        $class = $pivotClass->classes;
        $member = $pivotClass->user;
        if($user_id != auth()->user()->id){
            return redirect()->back()->with('info',$member->name.' telah dikeluarkan');
        }else{
            return redirect()->back()->with('info','Anda telah meninggalkan kelas ' .$class->name);
        }
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
        $data->code = Str::random(10);
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
    public function joinClass(Request $request){
        $code = $request->code;
        $getClass = Classes::where('code',$code)->first();
        if($getClass == null){
            return redirect()->back()->with('error','Kelas tidak ditemukan');
        }elseif($getClass && !PivotClass::where('user_id',auth()->user()->id)->where('class_id',$getClass->id)->exists()){
            $join = new PivotClass();
            $join->user_id = auth()->user()->id;
            $join->class_id = $getClass->id;
            $join->save();
            return redirect('/home')->with('success','Berhasil bergabung ke kelas '.$getClass->name);
        }else{
            return redirect()->back()->with('error','Anda telah bergabung ke kelas '.$getClass->name. ' sebelumnya'); 
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classes::findOrFail($id);
        $member = $class->member;
        $materials = $class->materials;
        $tasks = $class->tasks;
        return view('detailclass',compact('class','member','materials','tasks'));
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
        $data = Classes::findOrFail($id);
        $data->name = $request->name;
        $data->part = $request->part;
        $data->lesson = $request->lesson;
        $data->room = $request->room;
        $data->user_id = auth()->user()->id;
        $data->save();

        return redirect()->back()->with('success','Kelas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Classes::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success','Data berhasil dihapus');
    }
}

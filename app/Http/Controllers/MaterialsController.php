<?php

namespace App\Http\Controllers;

use App\Models\atachment;
use App\Models\Classes;
use App\Models\materials;
use App\Models\Notifications;
use Illuminate\Http\Request;

class MaterialsController extends Controller
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
        // 
    }
    public function materialsCreate(string $class_id)
    {
        $class = Classes::findOrFail($class_id);
        return view('materials.create', compact('class'));
    }
    public function addMaterials(Request $request, string $class_id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'nullable',
            'files.*' => 'file|mimes:jpg,jpeg,png,gif,pdf,mp4,docx,xlsx,pptx|max:100000',
        ],
        [
            'name.required' => 'inputan judul harus diisi',
            'files.file' => 'Tipe file tidak didukung, masukan file yang bertipe JPG, JPEG, PNG, GIF, PDF, MP4, DOCX, XLSX, PPTX',
            'files.max' => 'Ukuran file maksimal adalah 100 MB'
        ]);
        $data = new materials();
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->user_id = auth()->user()->id;
        $data->class_id = $class_id;
        $data->save();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $original_name = $file->getClientOriginalName();
                $filename = $file->store('atachment', 'public');
                $atachment = new atachment();
                $atachment->file = $filename;
                $atachment->original_name = $original_name;
                $atachment->material_id = $data->id;
                $atachment->save();
            }
        }
        $class = Classes::findOrFail($class_id);
        $member = $class->member;
        foreach($member as $m){
             // notifikasi
             $notification = new Notifications;
             $notification->recipient_id = $m->id;
             $notification->sender_id = auth()->user()->id;
             $notification->class_id = $class_id;
             $notification->material_id = $data->id;
             $notification->message ='Menambahkan materi baru di kelas ' . $class->name;
             $notification->route = 'materials/'.$data->id;
             $notification->save();
        }
        return redirect('/classes/'.$class_id)->with('success', 'Sukses menambahkan materi baru!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $materials = materials::findOrFail($id);
        $atachments = $materials->atachment;
        return view('materials.detail',compact('materials','atachments'));
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


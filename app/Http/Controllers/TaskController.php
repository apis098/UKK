<?php

namespace App\Http\Controllers;

use App\Models\atachment;
use App\Models\Classes;
use App\Models\Collection;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
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
        return view('task.create');
    }
    public function taskCreate($class_id){
        $class = Classes::findOrFail($class_id);
        return view('task.create',compact('class'));
    }
    public function taskStore(Request $request, string $class_id){
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
        $data = new Task();
        $data->name = $request->name;
        $data->description = $request->description;
        $data->default_point = $request->point;
        $data->user_id = auth()->user()->id;
        $data->class_id = $class_id;
        $data->save();
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $original_name = $file->getClientOriginalName();
                $fileName = $file->store('atachment','public');
                $atachment = new atachment();
                $atachment->file = $fileName;
                $atachment->task_id = $data->id;
                $atachment->original_name = $original_name;
                $atachment->save();
            }
        }
        return redirect('/classes/'.$class_id)->with('success', 'Sukses menambahkan tugas baru!');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::findOrFail($id);
        $atachments = $task->atachments;
        $status = 'Ditugaskan';
        if(Collection::where('user_id',auth()->user()->id)->where('task_id',$id)->exists()){
            $status = "Diserahkan";
        }
        $collection = [];
        $files = [];
        if($status == 'Diserahkan'){
            $collection = Collection::where('user_id',auth()->user()->id)->where('task_id',$id)->first();
            $files = $collection->atachments;
        }
        return view('task.detail',compact('task','atachments','status','collection','files'));
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

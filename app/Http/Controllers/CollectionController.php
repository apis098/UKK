<?php

namespace App\Http\Controllers;

use App\Models\atachment;
use App\Models\Collection;
use App\Models\Task;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function collect(Request $request, string $task_id){
        $task = Task::findOrFail($task_id);
        $data = new Collection();
        $data->user_id = auth()->user()->id;
        $data->task_id = $task_id;
        $data->status = 'mark';
        $data->class_id = $task->classes->id;
        $data->save();
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $original_name = $file->getClientOriginalName();
                $fileName = $file->store('atachment','public');
                $atachment = new atachment();
                $atachment->collection_id = $data->id;
                $atachment->file = $fileName;
                $atachment->original_name = $original_name;
                $atachment->save();
                $collect = Collection::findOrFail($data->id);
                $collect->status = 'collect';
                $collect->save();
            }
        }
        return redirect()->back()->with('success','Berhasil mengumpulkan tugas '. $task->name);
    }
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
    public function destroy(string $task_id)
    {
        $collection = Collection::where('user_id',auth()->user()->id)->where('task_id',$task_id)->get();
        foreach($collection as $data){
            $data->delete();
        }
        return redirect()->back()->with('info', 'Pengumpulan dibatalkan');
    }
}

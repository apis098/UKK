<?php

namespace App\Http\Controllers;

use App\Models\atachment;
use App\Models\Collection;
use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;
use PHPUnit\TestRunner\TestResult\Collector;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function collect(Request $request, string $task_id){
        $now = Carbon::now();
        $task = Task::findOrFail($task_id);
        $data = Collection::where('user_id',auth()->user()->id)->where('task_id',$task_id)->first();
        $data->status = 'collect';
        $data->collect_at = $now;
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
            }
        }
        return redirect()->back()->with('success','Berhasil mengumpulkan tugas '. $task->name);
    }
    public function markCollection(Request $request, string $id){
        $request->validate(
            [
                'point'=> 'required'
            ],
            [
                'point,required' => 'Inputan nilai harus diisi!' 
            ]
        );
        $collection = Collection::findOrFail($id);
        if($collection->task->default_point != null && $request->input('point') > $collection->task->default_point || $request->input('point') > 100){
            return redirect()->back()->with('error','Nilai yang anda berikan lebih dari yang sudah ditetapkan');
        }elseif($request->input('point') <= 0){
            return redirect()->back()->with('error','Nilai yang anda berikan tidak boleh kurang dari 0');
        }else{
            $collection->point = $request->input('point');
            $collection->save();
            return redirect()->back()->with('success','Berhasil memberikan nilai kepada ' . $collection->user->name);
        }
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
            $data->status = 'not_collect';
            $data->save();
        }
        return redirect()->back()->with('info', 'Pengumpulan dibatalkan');
    }
}

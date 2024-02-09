<?php

namespace App\Http\Controllers;

use App\Models\atachment;
use App\Models\Classes;
use App\Models\materials;
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
            'files.*' => 'file|mimes:jpg,jpeg,png,gif|max:2048', // Sesuaikan dengan kebutuhan Anda
        ]);
        $data = new materials();
        $data->name = $request->input('name');
        $data->description = $request->input('description');
        $data->user_id = auth()->user()->id;
        $data->class_id = $class_id;
        $data->save();
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = $file->store('atachment', 'public');
                $atachment = new atachment();
                $atachment->file = $filename;
                $atachment->material_id = $data->id;
                $atachment->save();
            }
            return redirect()->back()->with('success', 'Sukses menambahkan materi baru!');
        }
        return redirect()->back()->with('success', 'Sukses menambahkan materi baru!');
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


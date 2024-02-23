<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\Collection;
use App\Models\Notifications;
use App\Models\PivotClass;
use App\Models\Task;
use App\Models\User;
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
    public function outClass(Request $request)
    {
        $user_id = $request->user_id;
        $class_id = $request->class_id;
        $class = Classes::findOrFail($class_id);
        $pivotClass = PivotClass::where('user_id', $user_id)->where('class_id', $class_id)->first();
        $pivotClass->delete();
        $classes = $pivotClass->classes;
        $member = $pivotClass->user;
        $tasks  = $classes->tasks;
        foreach($tasks as $task){
            $collection = Collection::where('user_id',$user_id)->where('task_id',$task->id)->delete();
        }
        if ($user_id != auth()->user()->id) {
            $notification = new Notifications;
            $notification->recipient_id = $user_id;
            $notification->sender_id = auth()->user()->id;
            $notification->message ='Mengeluarkan anda dari kelas ' . $class->name;
            $notification->route = '/';
            $notification->save();
            return redirect()->back()->with('info', $member->name . ' telah dikeluarkan');
        } else {
            $notification = new Notifications;
            $notification->recipient_id = $class->user->id;
            $notification->sender_id = $user_id;
            $notification->message ='Telah meninggalkan kelas ' . $class->name;
            $notification->route = '/';
            $notification->save();
            return redirect()->back()->with('info', 'Anda telah meninggalkan kelas ' . $class->name);
        }
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $backgrounds = ['class1.jpg', 'class2.jpg', 'class3.jpg', 'class4.jpg', 'class5.jpg', 'class5.jpg', 'class6.jpg'];

        $usedBackgrounds = Classes::pluck('image')->toArray();
        $availableBackgrounds = array_diff($backgrounds, $usedBackgrounds);
        if (empty($availableBackgrounds)) {
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

        return redirect()->back()->with('success', 'Kelas berhasil dibuat');
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
    public function joinClass(Request $request)
    {
        $code = $request->code;
        $getClass = Classes::where('code', $code)->first();
        if ($getClass == null) {
            return redirect()->back()->with('error', 'Kelas tidak ditemukan');
        } elseif ($getClass && !PivotClass::where('user_id', auth()->user()->id)->where('class_id', $getClass->id)->exists()) {
            $tasks = $getClass->tasks;
            foreach($tasks as $task){
                $collection =  new Collection();
                $collection->class_id = $getClass->id;
                $collection->task_id = $task->id;
                $collection->user_id = auth()->user()->id;
                $collection->save();
            }
            $join = new PivotClass();
            $join->user_id = auth()->user()->id;
            $join->class_id = $getClass->id;
            $join->save();
            // notifications
            $notification = new Notifications;
            $notification->recipient_id = $getClass->user_id;
            $notification->sender_id = auth()->user()->id;
            $notification->class_id = $getClass->id;
            $notification->message ='bergabung ke kalas '.$getClass->name;
            $notification->route = 'classes/'.$getClass->id;
            $notification->save();
            return redirect('/home')->with('success', 'Berhasil bergabung ke kelas ' . $getClass->name);
        } else {
            return redirect()->back()->with('error', 'Anda telah bergabung ke kelas ' . $getClass->name . ' sebelumnya');
        }
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $class = Classes::findOrFail($id);
        $member = $class->member;
        $memberIds = $member->pluck('id')->toArray();
        $materials = $class->materials;
        $tasks = $class->tasks;
        $collections = [];
        if (auth()->user()->role == "theacer") {
            $collections = Collection::where('class_id', $id)
                ->where('status','collect')
                ->where('point', 0)
                ->orderBy('created_at', 'desc')
                ->get();
            // Mendapatkan ID tugas yang sudah dikumpulkan oleh anggota kelas
            $submittedMemberIds = Collection::where('class_id', $class->id)
                ->whereIn('user_id', $memberIds)
                ->whereNotNull('task_id')
                ->pluck('user_id')
                ->toArray();

            // Mendapatkan anggota kelas yang belum mengumpulkan tugas
            $pendingMembers = $member->reject(function ($member) use ($submittedMemberIds) {
                return in_array($member->id, $submittedMemberIds);
            });
            // Mendapatkan ID anggota kelas yang belum mengumpulkan tugas
            $pendingMemberIds = $pendingMembers->pluck('id')->toArray();

            // Mendapatkan tugas yang belum dikumpulkan oleh anggota kelas
            $pendingTasks = Collection::where('class_id', $class->id)
                ->whereNotIn('user_id', $pendingMemberIds)
                ->get();    
        } elseif (auth()->user()->role == 'student') {
            $collections = Collection::where('class_id', $id)
                ->where('status','not_collect')
                ->where('user_id', auth()->user()->id)
                ->where('point', 0)
                ->orderBy('created_at', 'desc')
                ->get();
        }
        return view('detailclass', compact('class', 'member', 'materials', 'tasks', 'collections'));
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

        return redirect()->back()->with('success', 'Kelas berhasil di edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Classes::findOrFail($id);
        $data->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}

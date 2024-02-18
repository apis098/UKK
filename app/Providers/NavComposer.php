<?php
namespace App\Providers;

use App\Models\Classes;
use App\Models\Collection;
use App\Models\materials;
use App\Models\Task;
use App\Models\User;
use Illuminate\View\View;
use App\Models\YourModel;
use Illuminate\Support\Facades\Auth;

class NavComposer
{
    public function compose(View $view)
    {
        $classes = [];
        $materials = [];
        $tasks = [];
        $notCollect = [];
        $notRated = [];
        if (Auth::user()->role == 'theacer') {
            $classes = Classes::where('user_id', auth()->user()->id)->get();
            $classIds = $classes->pluck('id')->toArray();
            $materials = materials::where('user_id', auth()->user()->id)->get();
            $tasks = Task::where('user_id', auth()->user()->id)->get();
            $taskIds = $tasks->pluck('id')->toArray();
            $notRated = Collection::wherein('class_id', $classIds)->where('point', 0)->where('status','collect')->get();
        } else {
            $classes = User::findOrFail(auth()->user()->id)->classes;
            $classIds = $classes->pluck('id')->toArray();
            $materials = materials::whereIn('class_id', $classIds)->get();
            $tasks = Task::whereIn('class_id', $classIds)->get();
            $taskIds = $tasks->pluck('id')->toArray();
            $user = auth()->user();
            $notCollect = Collection::where('user_id',auth()->user()->id)->where('status','not_collet')->get();
            // dd($notCollect);
        }

        $view->with([
            'classes' => $classes,
            'materials' => $materials,
            'tasks' => $tasks,
            'notRated' => $notRated,
            'notCollect' => $notCollect,
        ]);
    }
}
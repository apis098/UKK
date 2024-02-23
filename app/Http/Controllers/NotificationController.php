<?php

namespace App\Http\Controllers;

use App\Models\Notifications;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function readAllNotifications(){
        $notification = Notifications::where('status','belum')->where('recipient_id',auth()->user()->id)->get();
        foreach($notification as $data){
            $data->status = 'sudah';
            $data->save();
        }
        return response()->json([
            'success' => true,
        ]);
    }
    public function deleteAllNotifications(){
        $notification = Notifications::where('recipient_id',auth()->user()->id)->get();
        foreach($notification as $data){
            $data->delete();
        }
        return response()->json([
            'success' => true,
        ]);
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
        $notification = Notifications::findOrFail($id);
        $notification->status = 'sudah';
        $notification->save();
        return redirect($notification->route);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}

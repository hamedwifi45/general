<?php

namespace App\Http\Controllers;

use App\Models\Alert;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $not = Notification::where([
            ['user_id', '!=', auth()->user()->id],
            ['post_userId', '=', auth()->user()->id]
        ])->orderByDesc('created_at')->limit(5)->get();
        $data = [];
        $alert = Alert::where('user_id' , Auth::user()->id)->first();
        $alert->alert = 0;
        $alert->save();
        foreach($not as $item){
            $data[] = [
                'user_name' => User::find($item->user_id)->name,
                'user_image' => User::find($item->user_id)->profile_photo_url,
                'post_title' => Post::find($item->post_id)->title,
                'post_slug' => Post::find($item->post_id)->slug,
                'date' => $item->created_at->diffForHumans() 
            ];
        }


        return response()->json(['not' => $data]);
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
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Notification $notification)
    {
        //
    }
    public function allNotification(){
        $nots = Notification::where([
            ['user_id', '!=', auth()->user()->id],
            ['post_userId', '=', auth()->user()->id]
        ])->orderByDesc('created_at')->with('user')->paginate(10);
        $title = "جميع الاشعارات"; 
        return view('nots.show' , compact('nots' , 'title'));
    }
}

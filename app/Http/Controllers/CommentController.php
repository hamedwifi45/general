<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\CommentNotifiction;
use App\Models\Alert;
use App\Models\Notification;

class CommentController extends Controller
{
    public $comment;
    public function __construct(Comment $comments){
        $this->comment = $comments;
    }
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
        $request->validate(['body'=>'required']);
        $comment = $this->comment;
        $comment->body = $request->get('body');
        $comment->user()->associate($request->user());
        $comment->post_id = $request->get('post_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($comment);

        $data = [
            'post_title' => $post->title,
            'post' => $post,
            'user_name' => $request->user()->name,
            'user_image' => $request->user()->profile_photo_path ? : $request->user()->profile_photo_url ,

        ];
        // Notifiction
        if($request->user()->id != $post->user_id){
            $not = new Notification;
            $not->user_id = $request->user()->id;
            $not->post_id = $post->id;
            $not->post_userId = $post->user_id;
            $not->save();
        }
        event(new CommentNotifiction($data) );
        if($request->user()->id != $post->user_id){
            $alert = Alert::where('user_id' , $post->user_id)->first();
            $alert->alert++;
            $alert->save();
        }

        return back()->with('success' , "تم اضافة التعليق بنجاح");

    }
    public function replayStore(Request $request){
        $request->validate(['comment_body'=>'required']);

        $replay = new Comment();
        $replay->body = $request->get('comment_body');
        $replay->user()->associate($request->user());
        $replay->post_id = $request->get('post_id');
        $replay->parent_id = $request->get('comment_id');
        $post = Post::find($request->get('post_id'));
        $post->comments()->save($replay);

        return back()->with('success' , "تم اضافة الرد بنجاح");


    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();

        return back()->with('success' , 'تم حذف التعليق بنجاح');
    }
}

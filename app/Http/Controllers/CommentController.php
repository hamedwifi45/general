<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Events\CommentNotifiction;


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
        event(new CommentNotifiction($data) );

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
        //
    }
}

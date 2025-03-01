<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public $post;
    public function __construct(Post $post){
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = $this->post::with('user:id,name,profile_photo_path')->approved()->paginate(10);
        $title = 'قائمة المنشورات';
        return view('index',compact('posts' , "title"));
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
    public function show(Post $post)
    {
        
        return view('posts.show' , compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        //
    }
    public function search(Request $request){
        $posts = $this->post->where('title','LIKE',"%".$request->keyword."%")->with('user')->approved()->paginate(10);
        dd($posts,$request->keyword);
        $title = "نتائج البحث عن" . $request->keyword ; 
        return view('index',compact('posts' , "title"));

    }
}

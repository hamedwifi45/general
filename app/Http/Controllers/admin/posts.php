<?php

namespace App\Http\Controllers\admin;

use App\Helpers\Slug;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class posts extends Controller
{
    public $post;
    public function __construct(Post $post)
    {
        $this->post = $post;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts =  $this->post::with('user' , 'category')->get();

        return view('admin.posts.all', compact('posts'));
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
        $post = Post::find($id);

        return view('admin.posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::find($id);
    $data = $request->validate( [
        'title' => 'required',
        'body' => 'required',
    ]);

    $data['slug'] = Slug::unquiSlug($request->title,'posts');
    $data['category_id'] = $request->category_id;

    if($request->hasFile('image')) {
        if ($post->image_path && $post->image_path !== 'defult.jpg') {
            Storage::delete('images/' . $post->image_path);
        }
        $file = $request->file('image');
        $filename = time() . $file->getClientOriginalName();
        $file->storeAs('images/', $filename);
    }

    $request->user()->posts()->where('slug', $post->slug)->update($data + ['image_path'=> $filename ?? 'default.jpg']);

    return redirect(route('posts.index'))->with('success', 'تم تعديل المنشور بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = Post::find($id);
        if ($post->image_path && $post->image_path !== 'defult.jpg') {
            Storage::delete('images/' . $post->image_path);
        }
        $post->delete();
        return back()->with('success' , "تم حذف المنشور بنجاح");

    }
}

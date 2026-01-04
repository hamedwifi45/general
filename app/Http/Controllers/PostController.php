<?php

namespace App\Http\Controllers;

use App\Helpers\Slug;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        $request->validate(["title" => 'required','category_id'=> 'required','body' => 'required']);
        if($request->hasFile('image')){
            $file = $request->file('image');
            $filename = time() . $file->getClientOriginalName();
            $file->move('storage/images/',$filename);
        }
        $request->user()->posts()->create($request->all() + ['image_path' => $filename ?? 'defult.jpg'] );
        return back()->with('success' , "تم اضافة المنشور بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        $comments = $post->comments()->get()->sortByDesc('created_at');
        return view('posts.show' , compact('post' , 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        abort_unless(auth()->user()->can('edit-post', $post), 403);

        return view('posts.edit' , compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate( [
            'title' => 'required',
            'body' => 'required',
        ]);
        abort_unless(auth()->user()->can('edit-post', $post), 403);

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
    
        return redirect(route('post.show', $data['slug']))->with('success', 'تم تعديل المنشور بنجاح');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if ($post->image_path && $post->image_path !== 'defult.jpg') {
            Storage::delete('images/' . $post->image_path);
        }
        $post->delete();
        return back()->with('success' , "تم حذف المنشور بنجاح");
    }
    public function getcategory($id , $slug){
        $posts = $this->post::with('user')->approved()->whereCategory_id($id)->paginate(10);
        $title = "المنشورات العائدة لتصنيف: ".Category::find($id)->title;
        // dd($id , $slug ,$posts );
        return view('index',compact('posts', 'title'));
    }
    public function search(Request $request){
        $posts = $this->post->approved()->where('body','LIKE',"%".$request->keyword."%")->with('user')->paginate(10);
        $title = "نتائج البحث عن" . $request->keyword ; 
        return view('index',compact('posts' , "title"));

    }
}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public $user;
    public function __construct(User $user){
        $this->user = $user;
    }


    public function getPostsByUser($id){
        $content = $this->user::with('posts')->find($id);
        return view('user.profile' , compact('content'));
    }
    public function getCommentsByUser($id){
        $content = $this->user::with('comments')->find($id);

        return view('user.profile' , compact('content'));
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::with('role')->get();
        return view('admin.user.index' , compact('users'));
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
        $data = $request->validate(['name' => 'required' , 'email' => ['required' , 'unique:users,email'] , 'password' => 'required']);
        $password = Hash::make($request->password);
        
        $role = $request->role_id;
        $user = new User ; 
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $password;
        $user->role_id = $role;
        $user->save();
        return back()->with('success' , 'تم انشاء المستخدم الجديد بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.user.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        
        $data = $request->validate( [
            'name' => 'required',
            'email' => 'required',
        ]);

        

        $user->name = $request->name;
        $user->email = $request->email;
        $user->role_id = $request->role_id;

        $user->save();

        return redirect(route('user.index'))->with('success', 'تم تعديل معلومات المستخدم بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', "تم حذف المستخدم بنجاح");
    }
}

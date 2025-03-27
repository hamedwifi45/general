<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
use Livewire\Attributes\Validate;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('admin.roles.all' , compact('roles'));
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
        $data = [];
        $request->validate(['name' => 'required']);
        $data['name'] = $request->name;

        $role = new Role ; 
        $role->role = $data['name'];
        $role->save();
        return back()->with('success' , 'تم اضافة الدور بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(Role $role)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return back()->with('success' , 'تم حذف الدور بنجاح');

    }
    public function getByRole(Request $data)
    {
        $permissions = Role::find($data->id)->permisstion()->pluck('permisstion_id');
        // dd($permissions);

        return $permissions;
    }
}

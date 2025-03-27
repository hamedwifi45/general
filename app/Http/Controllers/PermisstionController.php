<?php

namespace App\Http\Controllers;

use App\Models\Permisstion;
use App\Models\Role;
use Illuminate\Http\Request;

class PermisstionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $per = Permisstion::all();
        return view('admin.per.index' , compact('per'));
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
        Role::find($request->role_id)->permisstion()->sync($request->permission);
        return back()->with('success' , 'تم تعيين الصلاحيات الجديدة');
    }

    /**
     * Display the specified resource.
     */
    public function show(Permisstion $permisstion)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permisstion $permisstion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permisstion $permisstion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permisstion $permisstion)
    {
        //
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pages = Page::all();
        return view('admin.page.index' , compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.page.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();
        return redirect(route('page.index'))->with('success', "تم اضافة الصفحة بنجاح");
    }

    /**
     * Display the specified resource.
     */
    public function show(Page $page)
    {
        return view('admin.page.show', compact('page'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Page $page)
    {
        return view('admin.page.edit' , compact('page'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Page $page)
    {
        $page->slug = $request->slug;
        $page->title = $request->title;
        $page->content = $request->content;
        $page->save();
        return redirect(route('page.index'))->with('success', "تم تعديل الصفحة بنجاح");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Page $page)
    {
        $page->delete();
        return redirect(route('page.index'))->with('success', "تم حذف الصفحة بنجاح");

    }
}

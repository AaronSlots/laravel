<?php

namespace ASSoftware\LaravelApp\Http\Controllers;

use App\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages=Page::all();
        return view('as-software/laravel::cms.pages.index',['pages'=>$pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('as-software/laravel::cms.pages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:pages|regex:/^[a-z]+$/',
            'view' => 'required|regex:/^[a-z.]+$/'
        ]);

        $page=new Page();
        $page->name = $request->name;
        $page->view = $request->name;
        $page->save();

        return redirect()->route('cms.pages.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function show(string $name)
    {
        $page=Page::find($name);
        return view($page->view,['components'=>$page->components]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function edit(string $name)
    {
        $page = Page::find($name);
        return view('as-software/laravel::cms.pages.edit',['page'=>$page]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, string $name)
    {
        $request->validate([
            'view' => 'required|regex:/^[a-z.]+$/'
        ]);

        $page=Page::find($name);
        $page->view = $request->name;
        $page->save();

        return redirect()->route('cms.pages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function destroy(string $name)
    {
        $page=Page::find($name);
        $page->components()->detach();
        $page->delete();

        return redirect()->route('cms.pages.index');
    }
}

<?php

namespace ASSoftware\Laravel\App\Http\Controllers;

use ASSoftware\Laravel\App\Page;
use ASSoftware\Laravel\App\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $name)
    {
        $page=Page::find($name);
        return view('as-software/laravel::cms.pages.components',['page'=>$page]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $name
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, string $name)
    {
        $page=Page::find($name);
        $page->components()->attach($request->id);
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $name
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $page=Page::find($name);
        $page->components()->detach($request->id);
        return redirect()->back();
    }
}

<?php

namespace ASSoftware\Laravel\App\Http\Controllers;

use ASSoftware\Laravel\App\Component;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $components=Component::all();
        return view('as-software/laravel::cms.components.index',['components'=>$components]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('as-software/laravel::cms.components.create');
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
            'data_id' => 'required',
            'type' => 'required'
        ]);

        $component=new Component();
        $component->data_id = $request->data_id;
        $component->type = $request->type;
        $page->save();

        return redirect()->route('cms.components.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $component=Component::find($id);
        return view('as-software/laravel::cms.components.edit',['component'=>$component]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $request->validate([
            'data_id' => 'required',
            'type' => 'required'
        ]);

        $component=Component::find($id);
        $component->data_id = $request->data_id;
        $component->type = $request->type;
        $page->save();

        return redirect()->route('cms.components.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $component=Component::find($id);
        $component->pages()->detach();
        $component->delete();

        return redirect()->route('cms.components.index');
    }
}

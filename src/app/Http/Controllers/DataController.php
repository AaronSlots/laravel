<?php

namespace ASSoftware\Laravel\App\Http\Controllers;

use ASSoftware\Laravel\App\Data;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Data::all();
        return view('as-software/laravel::cms.data.index',['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('as-software/laravel::cms.data.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content=[];
        foreach ($request->columns as $column){
            $data[$column]=[];
        }
        $content=json_encode($content);

        $data=new Data();
        $data->content=$content;
        $data->save();

        return redirect()->route('cms.data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $data = Data::find($id);
        $data->delete();

        return redirect()->route('cms.data.index');
    }
}

<?php

namespace ASSoftware\Laravel\App\Http\Controllers;

use Illuminate\Http\Request;
use ASSoftware\Laravel\App\Data;
use App\Http\Controllers\Controller;

class DataRowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index(int $id)
    {
        $data=json_decode(Data::find($id)->content);
        return view('ASSoftware/Laravel::cms.data.rows.index',['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(int $id)
    {
        $columns=array_keys(json_decode(Data::find($id)->content));
        return view('ASSoftware/Laravel::cms.data.rows.create',['columns'=>$columns]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, int $id)
    {
        $data=Data::find($id);

        $content=json_decode($data->content);
        foreach ($request->input() as $key=>$value){
            $content[$key][] = $value;
        }

        $data->content=json_encode($content);
        $data->save();

        return redirect()->route('cms.data.rows.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param  int  $row
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id, int $row)
    {
        $data=json_decode(Data::find($id)->content);
        $values=[];

        foreach ($data as $key => $column){
            $values[$key]=$column[$row];
        }

        return view('ASSoftware/Laravel::cms.data.rows.edit',['values'=>$values]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @param  int  $row
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id, int $row)
    {
        $data=Data::find($id);

        $content=json_decode($data->content);
        foreach ($request->input() as $key=>$value){
            $content[$key][$row] = $value;
        }

        $data->content=json_encode($content);
        $data->save();

        return redirect()->route('cms.data.rows.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @param  int  $row
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id, int $row)
    {
        $data=json_decode(Data::find($id)->content);

        foreach ($data as $key => $column){
            unset($column[$row]);
        }

        $data->content=json_encode($content);
        $data->save();

        return redirect()->route('cms.data.rows.index');
    }
}

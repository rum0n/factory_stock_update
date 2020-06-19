<?php

namespace App\Http\Controllers;

use App\Road;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class RoadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roads = Road::all();
        return view('admin.road.index', compact('roads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $road = new Road();

        $road->road_name = $request->road_name;
        $road->save();

        Toastr::success('Successfully Added', 'Road!!!');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function show(Road $road)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function edit(Road $road)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Road $road)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Road  $road
     * @return \Illuminate\Http\Response
     */
    public function destroy(Road $road)
    {
//        dd($road);
        $road->delete();

        Toastr::success('Successfully Deleted', 'Road!!!');
        return back();
    }
}

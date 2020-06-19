<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Product;
use App\Road;
use App\Sr;
use App\SrRoad;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $srs = Sr::latest()->get();
        return view('admin.sr.index', compact('srs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roads = Road::all();
        $products = Product::all();

        $employees = Employee::all();
        return view('admin.sr.create',compact('employees','roads', 'products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd($request->all());

//        foreach($services as $service){
//        }

        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'employee_id'=>'required',
            'target'=>'required|numeric',
            'product_id'=>'required',
            'roads'=>'required',
            'achieved'=>'required|numeric|lte:target',
            'target_date'=>'required|after:'.$todayDate,
        ]);

        $roads = $request->input('roads');

        $sr = new Sr();

        $sr->employee_id = $request->employee_id;
        $sr->target = $request->target;
        $sr->product_id = $request->product_id;
        $sr->achieved = $request->achieved;
        $sr->target_date = $request->target_date;
        $sr->save();

        foreach($roads as $road){
            $sr_roads = new SrRoad();
            $sr_roads->sr_id = $sr->id;
            $sr_roads->road_id = $road;
            $sr_roads->save();
        }


        Toastr::success('Sr Successfully Created', 'Success!!!');
        return redirect()->route('admin.sr.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Sr  $sr
     * @return \Illuminate\Http\Response
     */
    public function show(Sr $sr)
    {
        return view('admin.sr.show', compact('sr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Sr  $sr
     * @return \Illuminate\Http\Response
     */
    public function edit(Sr $sr)
    {
        $roads = Road::all();
        $products = Product::all();
        $employees = Employee::all();

        return view('admin.sr.edit',compact('employees','roads', 'products', 'sr'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Sr  $sr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sr $sr)
    {
//        dd($request->all());
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'employee_id'=>'required',
            'target'=>'required|numeric',
            'product_id'=>'required',
            'roads'=>'required',
            'achieved'=>'required|numeric|lte:target',
            'target_date'=>'required|after:'.$todayDate,
        ]);

        $sr->employee_id = $request->employee_id;
        $sr->target = $request->target;
        $sr->achieved = $request->achieved;
        $sr->target_date = $request->target_date;
        $sr->save();

        $all_roads = SrRoad::where('sr_id',$sr->id)->get();
        foreach($all_roads as $road){
            $road->delete();
        }

        $roads = $request->input('roads');

        foreach($roads as $roadd){
            $sr_roads = new SrRoad();
            $sr_roads->sr_id = $sr->id;
            $sr_roads->road_id = $roadd;
            $sr_roads->save();
        }

        Toastr::success('Sr Successfully Updated', 'Success!!!');
        return redirect()->route('admin.sr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Sr  $sr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sr $sr)
    {
        $sr->delete();
        Toastr::success('Sr Successfully Deleted', 'Success!!!');
        return redirect()->back();
    }
}

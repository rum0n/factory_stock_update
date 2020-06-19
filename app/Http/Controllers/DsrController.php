<?php

namespace App\Http\Controllers;

use App\Dsr;
use App\Employee;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DsrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dsrs = Dsr::latest()->get();
        return view('admin.dsr.index', compact('dsrs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $employees = Employee::all();
        return view('admin.dsr.create',compact('employees',$employees));
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
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'employee_id'=>'required',
            'target'=>'required|numeric',
            'achieved'=>'required|numeric|lte:target',
            
        ]);

        $dsr = new Dsr();

        $dsr->employee_id = $request->employee_id;
        $dsr->target = $request->target;
        $dsr->achieved = $request->achieved;
       
        $dsr->save();

        Toastr::success('Dsr Successfully Created', 'Success!!!');
        return redirect()->route('admin.dsr.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dsr  $dsr
     * @return \Illuminate\Http\Response
     */
    public function show(Dsr $dsr)
    {
        return view('admin.dsr.show', compact('dsr'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dsr  $dsr
     * @return \Illuminate\Http\Response
     */
    public function edit(Dsr $dsr)
    {
        $employees = Employee::all();
        return view('admin.dsr.edit', compact('dsr','employees'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dsr  $dsr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dsr $dsr)
    {
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'employee_id'=>'required',
            'target'=>'required|numeric',
            'achieved'=>'required|numeric|lte:target',
            // 'target_date'=>'required|after:'.$todayDate,
        ]);

        $dsr->employee_id = $request->employee_id;
        $dsr->target = $request->target;
        $dsr->achieved = $request->achieved;
        
        $dsr->save();

        Toastr::success('Dsr Successfully Updated', 'Success!!!');
        return redirect()->route('admin.dsr.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dsr  $dsr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dsr $dsr)
    {
        $dsr->delete();
        Toastr::success('Dsr Successfully Deleted', 'Success!!!');
        return redirect()->back();
    }
}

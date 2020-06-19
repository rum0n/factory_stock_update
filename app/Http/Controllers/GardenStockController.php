<?php

namespace App\Http\Controllers;

use App\GardenStock;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class GardenStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $garden_stocks = GardenStock::all();
        return view('admin.garden_stock.index', compact('garden_stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.garden_stock.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'expiry_date'=>'required|date|after:'.$todayDate,
        ]);

        $garden_stock = new GardenStock();

        $garden_stock->name = $request->name;
        $garden_stock->qty = $request->qty;
        $garden_stock->price = $request->price;
        $garden_stock->expiry_date = $request->expiry_date;
        $garden_stock->save();

        Toastr::success('Successfully Added to Garden Stock', 'Success!!!');
        return redirect()->route('admin.garden_stock.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\GardenStock  $gardenStock
     * @return \Illuminate\Http\Response
     */
    public function show(GardenStock $gardenStock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\GardenStock  $gardenStock
     * @return \Illuminate\Http\Response
     */
    public function edit(GardenStock $gardenStock)
    {
        return view('admin.garden_stock.edit', compact('gardenStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\GardenStock  $gardenStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GardenStock $gardenStock)
    {
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'name'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'expiry_date'=>'required|date|after:'.$todayDate,
        ]);

        $gardenStock->name = $request->name;
        $gardenStock->qty = $request->qty;
        $gardenStock->price = $request->price;
        $gardenStock->expiry_date = $request->expiry_date;
        $gardenStock->save();

        Toastr::success('Garden Stock Successfully Updated', 'Success!!!');
        return redirect()->route('admin.garden_stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\GardenStock  $gardenStock
     * @return \Illuminate\Http\Response
     */
    public function destroy(GardenStock $gardenStock)
    {
        $gardenStock->delete();

        Toastr::success('Garden Stock Successfully Deleted', 'Success!!!');
        return redirect()->back();
    }

    public function used_g_stock()
    {
        $gardenStocks = GardenStock::all();

        return view('admin.garden_stock.used', compact('gardenStocks'));
    }

    public function reduced_g_stock(Request $request)
    {
        $id = $request->garden_id;
        $gardenStock = GardenStock::find($id);

        $stock = $gardenStock->qty;
        $used = $gardenStock->used;

        $decrease_able = $request->qty;

//        if($stock == $used){
//            Toastr::error('Insufficient Garden Stock', 'Sorry!!!');
//            return redirect()->back();
//        }

        if($stock < $used + $decrease_able){
            Toastr::error('Insufficient Garden Stock to reduced', 'Sorry!!!');
            return redirect()->back();
        }

//        dd($stock,$used + $decrease_able);
        $gardenStock->used = $used + $decrease_able;
        $gardenStock->save();

        Toastr::success('Garden Stock Successfully Reduced', 'Success!!!');
        return redirect()->route('admin.garden_stock.index');
    }


}

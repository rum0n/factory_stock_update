<?php

namespace App\Http\Controllers;

use App\Product;
use App\Stock;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
        return view('admin.stock.index', compact('stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('admin.stock.create', compact('products'));
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
            'product_id'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'expiry_date'=>'required|date|after:'.$todayDate,
        ]);

        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->qty = $request->qty;
        $stock->price = $request->price;
        $stock->price = $request->price;
        $stock->expiry_date = $request->expiry_date;
        $stock->save();

        Toastr::success('Successfully Added to Stock', 'Success!!!');
        return redirect()->route('admin.stock.index');
//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $products = Product::all();
        return view('admin.stock.edit', compact('products','stock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        $todayDate = date('m/d/Y');

        $this->validate($request,[
            'product_id'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric',
            'expiry_date'=>'required|date|after:'.$todayDate,
        ]);

        $stock->product_id = $request->product_id;
        $stock->qty = $request->qty;
        $stock->price = $request->price;
        $stock->price = $request->price;
        $stock->expiry_date = $request->expiry_date;
        $stock->save();

        Toastr::success('Stock Successfully Updated', 'Success!!!');
        return redirect()->route('admin.stock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
//        $f_stock = FactoryStock::find($id);

        $stock->delete();

        Toastr::success('Sr Successfully Deleted', 'Success!!!');
        return redirect()->back();
    }
}

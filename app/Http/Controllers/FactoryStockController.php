<?php

namespace App\Http\Controllers;

use App\Category;
use App\FactoryStock;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class FactoryStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $factory_stocks = FactoryStock::all();
        return view('admin.factory_stock.index', compact('factory_stocks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('admin.factory_stock.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric'
        ]);

        $factoryStock = new FactoryStock();

        $factoryStock->category_id = $request->category_id;
        $factoryStock->qty = $request->qty;
        $factoryStock->price = $request->price;
        $factoryStock->save();

        Toastr::success('Materials Successfully Added to Factory', 'Success!!!');
        return redirect()->route('admin.fstock.index');
//        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\FactoryStock  $factoryStock
     * @return \Illuminate\Http\Response
     */
    public function show(FactoryStock $factoryStock)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FactoryStock  $factoryStock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $factoryStock = FactoryStock::findOrFail($id);
        $categories = Category::all();
        return view('admin.factory_stock.edit', compact('categories','factoryStock'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\FactoryStock  $factoryStock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'category_id'=>'required',
            'qty'=>'required|numeric',
            'price'=>'required|numeric'
        ]);

        $factoryStock = FactoryStock::findOrFail($id);

        $factoryStock->category_id = $request->category_id;
        $factoryStock->qty = $request->qty;
        $factoryStock->price = $request->price;
        $factoryStock->save();

        Toastr::success('Materials Successfully Updated to Factory', 'Success!!!');
        return redirect()->route('admin.fstock.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FactoryStock  $factoryStock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $f_stock = FactoryStock::find($id);

        $f_stock->delete();

        Toastr::success('Sr Successfully Deleted', 'Success!!!');
        return redirect()->back();
    }
}

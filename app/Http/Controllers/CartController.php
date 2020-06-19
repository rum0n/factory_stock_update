<?php

namespace App\Http\Controllers;

use App\Product;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $inputs = $request->except('_token');
        $rules = [
          'id' => 'required | integer',
          'name' => 'required',
          'qty' => 'required',
          'price' => 'required',
        ];
        $validator = Validator::make($inputs, $rules);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $id = $request->input('id');
        $name = $request->input('name');
        $qty = $request->input('qty');
        $price = $request->input('price');

        $product = Product::find($id);
        $stock_qty=$product->qty;
        if($stock_qty < $qty)
        {
            return redirect()->back()->withErrors('Sorry Required Quantity is not available in Stock ! ');
        }

        $product->qty = $stock_qty - $qty;
        $product->save();

        $add = Cart::add(['id' => $id, 'name' => $name, 'qty' => $qty, 'price' => $price, 'weight' => 1 ]);
        if ($add)
        {
            Toastr::success('Product successfully added to cart', 'Success');
            return redirect()->back();

        } else {

            Toastr::error('Product not added to cart', 'Error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        $cart_product = Cart::get($rowId);
        $old_qty = $cart_product->qty;
        $id = $cart_product->id;

        $product = Product::find($id);
        $product_stock_qty = $product->qty;

        $qty = $request->input('qty');

        $increase_qty = $qty - $old_qty;
        $product->qty = $product_stock_qty - $increase_qty;
        $product->save();

        if($product_stock_qty < $qty)
        {
            return redirect()->back()->withErrors('Sorry Insufficient Stock Quantity! ');
        }
        Cart::update($rowId, $qty);

        Toastr::success('Cart Updated Successfully', 'Success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowId)
    {
        $cart_product = Cart::get($rowId);
        $qty = $cart_product->qty;
        $id = $cart_product->id;

        $product = Product::find($id);
        $product_stock_qty = $product->qty;
        $product->qty = $product_stock_qty + $qty;
        $product->save();

        Cart::remove($rowId);
        Toastr::success('Product Successfully Canceled', 'Success');
        return redirect()->back();
    }
}

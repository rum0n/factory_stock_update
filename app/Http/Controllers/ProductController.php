<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Supplier;
use Brian2694\Toastr\Facades\Toastr;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->with('category', 'supplier')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.product.create', compact('categories', 'suppliers'));
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
            'name' => 'required | min:3',
            'category_id' => 'required| integer',
            'supplier_id' => 'required | integer',
            'code' => 'required',
            'garage' => 'required',
            'qty' => 'required',
            'buying_date' => 'required | date',
            'expire_date' => 'date',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $product = new Product();
        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = $request->input('supplier_id');
        $product->code = $request->input('code');
        $product->garage = $request->input('garage');
        $product->qty = $request->input('qty');
        $product->buying_date = $request->input('buying_date');
        $product->expire_date = $request->input('expire_date');
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');
        $product->save();

        Toastr::success('Product Successfully Created', 'Success!!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $suppliers = Supplier::all();
        return view('admin.product.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $inputs = $request->except('_token');
        $rules = [
            'name' => 'required | min:3',
            'category_id' => 'required| integer',
            'supplier_id' => 'required | integer',
            'code' => 'required',
            'garage' => 'required',
            'qty' => 'required',
            'buying_date' => 'nullable | date',
            'expire_date' => 'nullable | date',
            'buying_price' => 'required',
            'selling_price' => 'required',
        ];

        $validation = Validator::make($inputs, $rules);
        if ($validation->fails())
        {
            return redirect()->back()->withErrors($validation)->withInput();
        }

        $buying_date = $request->input('buying_date');
        if (!isset($buying_date))
        {
            $buying_date = $product->buying_date;
        }

        $expire_date = $request->input('expire_date');
        if (!isset($expire_date))
        {
            $expire_date = $product->expire_date;
        }

        $product->name = $request->input('name');
        $product->category_id = $request->input('category_id');
        $product->supplier_id = $request->input('supplier_id');
        $product->code = $request->input('code');
        $product->garage = $request->input('garage');
        $product->qty = $request->input('qty');
        $product->buying_date = $buying_date;
        $product->expire_date = $expire_date;
        $product->buying_price = $request->input('buying_price');
        $product->selling_price = $request->input('selling_price');
        $product->save();

        Toastr::success('Product Successfully Updated', 'Success!!!');
        return redirect()->route('admin.product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        $product->delete();
        Toastr::success('Product Successfully Deleted', 'Success!!!');
        return redirect()->route('admin.product.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Income;
use App\Order;
use App\OrderDetail;
use App\Product;
use App\Setting;
use Brian2694\Toastr\Facades\Toastr;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InvoiceController extends Controller
{
    public function create(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'customer_id' => 'required | integer',
        ];
        $customMessages = [
            'customer_id.required' => 'Select a Customer first!.',
            'customer_id.integer' => 'Invalid Customer!.'
        ];
        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $customer_id = $request->input('customer_id');

        $discount = $request->input('discount');

        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
//        dd($contents);
        $company = Setting::latest()->first();
        return view('admin.invoice', compact('customer', 'contents', 'company', 'discount'));
    }

    public function print($customer_id)
    {
        $customer = Customer::findOrFail($customer_id);
        $contents = Cart::content();
        $company = Setting::latest()->first();
        return view('admin.print', compact('customer', 'contents', 'company'));
    }

    public function order_print($order_id)
    {
        $order = Order::with('customer')->where('id', $order_id)->first();
        //return $order;
        $order_details = OrderDetail::with('product')->where('order_id', $order_id)->get();
        //return $order_details;
        $company = Setting::latest()->first();
        return view('admin.order.print', compact('order_details', 'order', 'company'));
    }


    public function final_invoice(Request $request)
    {
        $inputs = $request->except('_token');
        $rules = [
          'payment_status' => 'required',
          'customer_id' => 'required | integer',
        ];
        $customMessages = [
            'payment_status.required' => 'Select a Payment method first!.',
        ];

        $validator = Validator::make($inputs, $rules, $customMessages);
        if ($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $sub_total = str_replace(',', '', Cart::subtotal());
        $tax = str_replace(',', '', Cart::tax());
        $total = str_replace(',', '', Cart::total());

        $pay = $request->input('pay');
        $discount=$request->input('discount');

        $discount_total=($sub_total*$discount)/100;
        $due = $total - $pay - $discount_total;

        $order = new Order();
        $order->customer_id = $request->input('customer_id');
        $order->payment_status = $request->input('payment_status');
        $order->pay = $pay;
        $order->due = $due;
        $order->order_date = date('Y-m-d');
        $order->order_status = 'pending';
        $order->total_products = Cart::count();
        $order->discount = $discount;
        $order->discount_total = $discount_total;
        $order->sub_total = $sub_total;
        $order->vat = $tax;
        $order->total = $total- $discount_total;
        $order->save();

        $income = new Income();
        $income->income = $pay;
        $income->save();

        $order_id = $order->id;
        $contents = Cart::content();

        foreach ($contents as $content)
        {
            $order_detail = new OrderDetail();
            $order_detail->order_id = $order_id;
            $order_detail->product_id = $content->id;
            $order_detail->quantity = $content->qty;
            $order_detail->unit_cost = $content->price;

            $product = Product::find($content->id);
            $buying_price = $product->buying_price*$content->qty;

            $item_discount = (($content->total)*$discount)/100;
//            dd($item_discount);
            $total_price = ($content->total)-$item_discount;

            $order_detail->total = $total_price;
            $order_detail->profit = $total_price-$buying_price;

            $order_detail->save();
        }

        Cart::destroy();

        Toastr::success('Invoice created successfully', 'Success');
        return redirect()->route('admin.order.pending');


    }



}

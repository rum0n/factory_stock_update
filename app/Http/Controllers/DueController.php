<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Income;
use App\Order;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class DueController extends Controller
{
    public function due()
    {
//        $products = Stock::where('qty', '>', 0)->get();
        $orders = Order::where('due', '>', 0)->get();
        return view('admin.due.all_due', compact('orders'));
    }

    public function pay_due( $id)
    {
        $order = Order::find($id);
        $paid = $order->pay;
        $due = $order->due;

        $income = new Income();
        $income->income = $due;
        $income->save();

        $order->pay = $paid + $due;
        $order->due = 0;
        $order->save();

        Toastr::success('Due paid successfully', 'Success');
        return redirect()->back();
    }
    public function customer_due()
    {
        $customers = Customer::latest()->get();
//        dd($customers);
        return view('admin.due.customer_due', compact('customers'));
    }

    
}

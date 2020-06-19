<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Income;
use App\Order;
use App\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $today_date = date('Y-m-d');
        $today = Order::whereDate('created_at', $today_date)->get();
        $yesterday = Order::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $month_date = date('m');
        $month = Order::whereMonth('created_at', $month_date)->get();
        $previous_month = Order::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_date = date('Y');
        $year = Order::whereYear('created_at', $year_date)->get();
        $previous_year = Order::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $sales = Order::all();

        $today_expenses = Expense::whereDate('created_at', $today_date)->get();
        $yesterday_expenses = Expense::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->get();

        $month_expenses = Expense::whereMonth('created_at', $month_date)->get();
        $previous_month_expenses = Expense::whereMonth('created_at', date('m', strtotime('-1 month')))->get();

        $year_expenses = Expense::whereYear('created_at', $year_date)->get();
        $previous_year_expenses = Expense::whereYear('created_at', date('Y', strtotime('-1 year')))->get();

        $expenses = Expense::all();

        // for charts
        $current_sales = Order::select(
            DB::raw('sum(total) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%m') as months"),
            DB::raw("DATE_FORMAT(created_at,'%Y') as year"))
            ->whereYear('created_at',  date('Y'))
            ->groupBy('months')->get();

        $current_expenses = Expense::select(
            DB::raw('sum(amount) as sums'),
            DB::raw("DATE_FORMAT(created_at,'%m') as months"),
            DB::raw("DATE_FORMAT(created_at,'%Y') as year"))
            ->whereYear('created_at',  date('Y'))
            ->groupBy('months')->get();



        $today_income = Income::whereDate('created_at', $today_date)->sum('income');
        $yesterday_income = Income::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->sum('income');

        $this_month_income = Income::whereMonth('created_at', $month_date)->sum('income');
        $previous_month_income = Income::whereMonth('created_at', date('m', strtotime('-1 month')))->sum('income');

        $this_year_income = Income::whereYear('created_at', $year_date)->sum('income');
        $previous_year_income = Income::whereYear('created_at', date('Y', strtotime('-1 year')))->sum('income');

        $total_income = Income::sum('income');


        $today_profit = OrderDetail::whereDate('created_at', $today_date)->sum('profit');
        $yesterday_profit = OrderDetail::whereDate('created_at', date('Y-m-d', strtotime('-1 day')))->sum('profit');

        $this_month_profit = OrderDetail::whereMonth('created_at', $month_date)->sum('profit');
        $previous_month_profit = OrderDetail::whereMonth('created_at', date('m', strtotime('-1 month')))->sum('profit');

        $this_year_profit = OrderDetail::whereYear('created_at', $year_date)->sum('profit');
        $previous_year_profit = OrderDetail::whereYear('created_at', date('Y', strtotime('-1 year')))->sum('profit');

        $total_profit = OrderDetail::sum('profit');



        return view('admin.dashboard', compact('today','yesterday' ,'month','previous_month', 'year', 'previous_year', 'sales', 'today_expenses',
            'yesterday_expenses', 'month_expenses', 'previous_month_expenses', 'year_expenses', 'previous_year_expenses', 'expenses', 'current_sales',
            'current_expenses', 'today_income', 'yesterday_income', 'this_month_income', 'previous_month_income', 'this_year_income', 'previous_year_income', 'total_income',
            'today_profit',
            'yesterday_profit',
            'this_month_profit',
            'previous_month_profit',
            'this_year_profit',
            'previous_year_profit',
            'total_profit'
        ));

    }

    public function profit()
    {
        $total_income = Income::sum('income');
        $total_expense = Expense::sum('amount');
        $total_profit = OrderDetail::sum('profit');
        $order_details = OrderDetail::all();
        return view('admin.profit', compact('order_details', 'total_income', 'total_expense', 'total_profit'));
    }


}
<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    // Reports By Date
    public function adminReports(){
        $users = User::where('role', 'user')->latest()->get();
        return view('admin.reports.reportsDate', compact('users'));
    }

    // Get Reports By Date Month Year User
    public function adminReportByDate(Request $request){
        $month = $request->month;
        $year = $request->year;
        $user_id = $request->user_id;
        if($request->date != null) {
            $date = new DateTime($request->date);
            $dateFormat = $date->format('d F Y');
            $orders = Order::where('order_date', $dateFormat)->latest()->get();
            return view('admin.reports.reportsOrders', compact('orders', 'dateFormat'));
        }elseif($month != null){
            $date = new DateTime($month);
            $dateFormat = $date->format('F');
            $yearName = $date->format('Y');
            $orders = Order::where('order_month', $dateFormat)->where('order_year', $yearName)->latest()->get();
            return view('admin.reports.reportsOrders', compact('orders', 'dateFormat'));
        }elseif($year != null){
            $dateFormat = $year;
            $orders = Order::where('order_year', $dateFormat)->latest()->get();
            return view('admin.reports.reportsOrders', compact('orders', 'dateFormat'));
        }elseif($user_id != null){
            $user = User::find($user_id);
            $dateFormat = $user->name;
            $orders = Order::where('user_id', $user_id)->latest()->get();
            return view('admin.reports.reportsOrders', compact('orders', 'dateFormat'));
        }
    }

    // Report order details
    public function adminReportOrderDetails($orderID) {
        $order = Order::where('id', $orderID)->first();
        $orderItems = OrderItem::where('order_id', $orderID)->latest()->get();
        return view('admin.reports.adminReportOrderDetails', compact('order', 'orderItems'));
    }
}
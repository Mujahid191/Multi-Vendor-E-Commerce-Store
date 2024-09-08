<?php

namespace App\Http\Controllers\backend\vendor;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VendorOrderController extends Controller
{
    // Vendor Orders All
    public function vendorOrdersAll(){
        $orders = OrderItem::where('user_id', Auth::id())->latest()->get();
        return view('vendor.vendorOrders.vendorOrdersAll', compact('orders'));
    }

    // Vendor Order Details
    public function vendorOrdersDetails($orderID) {
        $order = Order::where('id', $orderID)->first();
        $orderItems = OrderItem::where('order_id', $orderID)->where('user_id', Auth::id())->latest()->get();
        return view('vendor.vendorOrders.vendorOrderDetails', compact('order', 'orderItems'));
    }

    // Vendor all return orders
    public function vendorOrdersReturn(){
        $returnOrders = OrderItem::where('user_id', Auth::id())->latest()->get();
        return view('vendor.vendorOrders.vendorReturnOrder', compact('returnOrders'));
    }
}
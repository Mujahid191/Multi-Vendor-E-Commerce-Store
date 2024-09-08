<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // Admin Orders All
    public function adminOrdersPending(){
        $orders = Order::where('status', 'pending')->latest()->get();
        return view('admin.orders.ordersPending', compact('orders'));
    }

    // Admin Confirm Orders
    public function adminOrdersConfirm(){
        $orders = Order::where('status', 'confirm')->latest()->get();
        return view('admin.orders.ordersConfirm', compact('orders'));
    }
    
    // Admin Processing Orders
    public function adminOrdersProcessing(){
        $orders = Order::where('status', 'processing')->latest()->get();
        return view('admin.orders.ordersProcessing', compact('orders'));
    }

    // Admin Delivered Orders
    public function adminOrdersDelivered(){
        $orders = Order::where('status', 'delivered')->latest()->get();

        return view('admin.orders.ordersDelivered', compact('orders'));
    }

    // Admin Order Details
    public function adminOrderDetails($orderId) {
        $order = Order::where('id', $orderId)->first();
        $orderItems = OrderItem::where('order_id', $orderId)->latest()->get();
        return view('admin.orders.adminOrderDetails', compact('order', 'orderItems'));
    }

    // Admin order Status Update
    public function adminOrderStatus($orderID,$status) {
        $order = Order::find($orderID)->update([
            'status' => $status,
        ]);
        if( $order && $status == 'confirm') {
            $notification = array(
                'message' => 'Order confirmed successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminOrdersConfirm')->with($notification);
        }elseif( $order && $status == 'processing') {
            $notification = array(
                'message' => 'Order processed successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminOrdersProcessing')->with($notification);
        }elseif( $order && $status == 'delivered') {
            $orderItems = OrderItem::where('order_id', $orderID)->get();
            foreach ($orderItems as $item) {
                $product_id = $item->product_id;
                $product_qty = $item->qty;
                $product = Product::find($product_id);
                $productNewQty = $product->product_quantity - $product_qty;
                $productQuantityUpdate = $product->update([
                    'product_quantity' => $productNewQty,
                ]);
            }
            if($productQuantityUpdate){
                $notification = array(
                    'message' => 'Order delivered successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->route('adminOrdersDelivered')->with($notification);
            }
        }
    }

    // Admin all Return Orders
    public function adminOrdersReturn(){
        $returnOrders = Order::where('return_reason', '!=', Null )->latest()->get();
        return view('admin.orders.adminReturnOrder', compact('returnOrders'));
    }

    // Admin order approval
    public function adminOrderReturnApproval($orderID, $status) {
        if($status == 'rejected'){
            $approval = 3;
        }else{
            $approval = 2;
        };
        $returnOrder = Order::find($orderID)->update([
            'return_order' => $approval,
        ]);
        if($returnOrder){
            $notification = array(
                'message' => 'Order Approval updated successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}
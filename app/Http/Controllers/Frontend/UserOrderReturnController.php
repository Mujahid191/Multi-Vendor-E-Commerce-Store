<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserOrderReturnController extends Controller
{
    // User Order Return Reason
    public function userOrderReturnReason(Request $request, $orderID) {
        $order = Order::find($orderID)->update([
            'return_reason' => now()->format('d F Y'),
            'return_reason' => $request->return_reason,
            'return_order' => 1,
        ]);
        if($order){
            return redirect()->route('userDashboard');
        }
    }
}

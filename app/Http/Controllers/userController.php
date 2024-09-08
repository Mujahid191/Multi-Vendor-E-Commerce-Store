<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Image;

class userController extends Controller
{
    // user Dashboard
    public function userDashboard() {
        $user = User::find(Auth::user()->id);
        $orders = Order::where('user_id', Auth::user()->id)->latest()->get();
        $returnOrders = Order::where('user_id', Auth::user()->id)->where('return_reason', '!=', Null)->latest()->get();
        return view('dashboard', compact('user', 'orders', 'returnOrders'));
    }
    // User Update
    public function userUpdate(Request $request){
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/users/' . $imageName);
            // Resize Image
            Image::Make($image)->resize(92, 92)->save($path);
            if( !empty($request->old_image)){
                $previousImage = public_path('images/users/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $user = User::find(Auth::user()->id);
        $user->name = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->image = $imageName;
        if($user->save()){
            return redirect()->route('userDashboard')->with('status', 'profile-updated');
        }
    }
    // User Order Details
    public function userOrderDetails($orderID) {
        $order = Order::where('id', $orderID)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::where('order_id', $orderID)->latest()->get();
        return view('userOrders.userOrderDetails', compact('order', 'orderItems'));
    }

    // Invoice Download
    public function userInvoiceDownload($invoiceId) {
        $order = Order::where('id', $invoiceId)->where('user_id', Auth::id())->first();
        $orderItems = OrderItem::where('order_id', $invoiceId)->latest()->get();
        // return view('userOrders.invoice', compact('order', 'orderItems'));
        $pdf = Pdf::loadView('userOrders.invoice', compact('order', 'orderItems'))->setPaper('a4')->setOption([
            'tempDir' => public_path(),
            'chroot' => public_path(),
        ]);
        return $pdf->download('invoice.pdf');
    }

    // User Order Track Method
    public function userOrderTrack(Request $request)
    {
        $order = Order::where('invoice_number', $request->invoice_number)->where('user_id', Auth::id())->first();
        if($order) {
            return view('frontend.orderTrack', compact('order'));
        }else{
            return redirect()->back()->with('status', 'invoice-invalid');
        }
    }
}

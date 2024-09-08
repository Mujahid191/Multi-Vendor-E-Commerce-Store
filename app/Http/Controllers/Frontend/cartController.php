<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use App\Models\Coupon;
use App\Models\District;
use App\Models\Division;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\State;
use App\Models\User;
use App\Models\Wishlist;
use App\Notifications\OrderNotification;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
// use Dotenv\Repository\RepositoryInterface;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class cartController extends Controller
{
    public function cartProducts() {
        return view('frontend.cart');
    }

    // Add To Cart Product Detail
    function productAddCart(Request $request) {
        $productID = $request->productID;
        $product = Product::find($productID);
        $name = $product->product_name;
        $qty = $request->quantity;
        $color = $request->color;
        $size = $request->size;
        $weight = 1;
        $thumbnail = $product->thumbnail;
        $vendor_id = $product->user_id;
        if ($product->discount_price == null) {
            $price = $product->selling_price;
        } else {
            $price = $product->selling_price - $product->discount_price;
        }
    
        // Define options as an array
        $options = [
            'color' => $color,
            'size' => $size,
            'thumbnail' => $thumbnail,
            'vendor' => $vendor_id,
            // Add other options as needed
        ];
        // Add the item to the cart
        Cart::add($productID, $name, $qty, $price, $weight, $options);
    
        // Optionally, you can return a response or redirect to a specific page
        return response()->json(['message' => 'Product added to cart successfully']);
    }

    // Mini Cart Data load 
    public function miniCartData() {
        $data = [];
        $data['products'] = Cart::content();
        $data['totalProducts'] = Cart::count();
        $data['totalPrice'] = Cart::priceTotal();
        $data['discount'] = round(Cart::discount());
        $data['subtotal'] = round(Cart::subtotal());
        $data['wishlist'] = Wishlist::count();
        $data['compare'] = Compare::count();
        return response()->json($data);
    }
    // Remove items from cart
    public function productRemoveCart($id) {
        Cart::remove($id);
        return response()->json(['message' => 'Product remove successfully']);
    }
    // product Quantity Control
    public function productQuantity($rowId,$qty) {
        $product = Cart::get($rowId);
        $quantity = $product->qty + $qty;
        Cart::update($rowId, $quantity);
        return response()->json(['message' => 'Quantity Updated']);
    }

    // Coupon Apply Method
    public function couponApply($coupon){
        $coupon = Coupon::where('coupon_name', $coupon)->where('coupon_validity', '>=', Carbon::now()->format('Y-m-d'))->first();
        if($coupon){
            Cart::setGlobalDiscount($coupon->coupon_discount);
            // Redirect back to the cart page with a success message
            return response()->json(['success' => 'Coupon applied successfully.']);
        }else{
            return response()->json(['error' => 'Invalid Coupon']);
        }
    }

    // Check out Page
    public function checkout() {
        $totalPrice =  Cart::priceTotal();
        if($totalPrice > 0){
            $divisions = Division::has('district')->latest()->get();
            return view('frontend.checkout', compact('divisions'));
        }else{
            return redirect()->back();
        }
    }

    // District load by division
    public function districtLoad($division){
        $district = District::where('division_id', $division)->get();
        return response()->json($district);
    }
    // state load District
    public function stateLoad($district){
        $states = State::where('district_id', $district)->get();
        return response()->json($states);
    }

    // Checkout Details Received
    public function checkoutDetails(Request $request) {
        $data = array();
        $data['shipping_name'] = $request->shipping_name;
        $data['shipping_email'] = $request->shipping_email;
        $data['division'] = $request->division;
        $data['shipping_phone'] = $request->shipping_phone;
        $data['district'] = $request->district;
        $data['postCode'] = $request->postCode;
        $data['state'] = $request->state;
        $data['shipping_address'] = $request->shipping_address;
        $data['info'] = $request->info;
        $data['totalPrice'] = Cart::priceTotal();
        $data['discount'] = round(Cart::discount());
        $data['subtotal'] = round(Cart::subtotal());
        if( $request->payment_option == 'stripe') {
            return view('frontend.stripe', compact('data'));
        }elseif($request->payment_option == 'cashOnDelivery'){
            return view('frontend.cash', compact('data'));
        }
    }

    // Order Details Save
    public function orderDetailSave(Request $request) {
        $admin = User::where('role', 'admin')->get();
        $orderID = Order::insertGetId([
            'name' => $request->shipping_name,
            'email' => $request->shipping_email,
            'phone' => $request->shipping_phone,
            'post_code' => $request->postCode,
            'address' => $request->shipping_address,
            'info' => $request->info,
            'payment_type' => 'cash on delivery',
            'payment_method' => 'cash',
            'currency' => 'usd',
            'amount' => round(Cart::subtotal()),
            'invoice_number' => 'EOS' .mt_rand(10000000,99999999),
            'order_date' => Carbon::now()->format('d F Y'),
            'order_month' => Carbon::now()->format('F'),
            'order_year' => Carbon::now()->format('Y'),
            'status' => 'pending',
            'user_id' => Auth::id(),
            'division_id' => $request->division,
            'district_id' => $request->district,
            'state_id' => $request->state,
            'created_at' => Carbon::now(),
        ]);
        $products = Cart::content();
        foreach ($products as $key => $product) {
            $orderItems = OrderItem::insert([
                'order_id' => $orderID,
                'product_id' => $product->id,
                'user_id' => $product->options->vendor,
                'color' => $product->options->color,
                'size' => $product->options->size,
                'qty' => $product->qty,
                'price' => $product->price,
                'created_at' => Carbon::now(),
            ]);
        }
        if($orderItems){
            Cart::destroy();
            Notification::send($admin, new OrderNotification($request->shipping_name));
            return redirect()->route('userDashboard');
        }
    }
}

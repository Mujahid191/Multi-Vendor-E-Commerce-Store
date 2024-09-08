<?php

namespace App\Http\Controllers\backend\admin\coupon;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    // Admin All Coupons
    public function adminCouponsAll() {
        $coupons = Coupon::latest()->get();
        return view('admin.coupons.couponsAll', compact('coupons'));
    }

    // Coupon Save
    public function adminCouponSave(Request $request) {
        $coupon = Coupon::create([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon inserted successfully',
            'alert-type' => 'success',
        );
        if($coupon){
            return redirect()->route('adminCouponsAll')->with($notification);
        }
    }

    // Coupon Edit Data load
    public function adminCouponEdit($id) {
        $coupon = Coupon::find($id);
        return view('admin.coupons.couponEdit', compact('coupon'));
    }

    // Coupon Update
    public function adminCouponUpdate(Request $request) {
        $coupon = Coupon::find($request->id)->update([
            'coupon_name' => $request->coupon_name,
            'coupon_discount' => $request->coupon_discount,
            'coupon_validity' => $request->coupon_validity,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Coupon Updated successfully',
            'alert-type' => 'success',
        );
        if($coupon){
            return redirect()->route('adminCouponsAll')->with($notification);
        }
    }
    // Delete Coupon
    public function adminCouponDelete($id) {
        $coupon = Coupon::find($id)->delete();
        if($coupon) {
            $notification = array(
                'message' => 'Coupon Deleted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminCouponsAll')->with($notification);
        }
    }
}

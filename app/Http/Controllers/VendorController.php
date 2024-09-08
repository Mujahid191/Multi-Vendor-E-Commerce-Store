<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\VendorNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Image;

class VendorController extends Controller
{
    // Vendor Dashboard 
    public function vendorDashboard() {
        return view('vendor.dashboard');
    }
    // Vendor Logout
    public function vendorLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vendorLogin');
    }

    // Admin Profile 
    public function vendorProfile() {
        $user = User::find( Auth()->user()->id );
        return view('vendor.profile', compact('user'));
    }

    // Vendor Profile Update
    public function vendorProfileUpdate(Request $request){
        // Image Setup
        if( empty($request->file('new_image')) ) {
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            // Resize Image With Image Intervention Package
            $path = public_path('images/users/'. $imageName);
            Image::Make($image)->resize(92, 92)->save($path);

            // Delete Previous Image;
            if( !empty($request->old_image) ){
                $path = public_path('images/users/' . $request->old_image);
                file_exists($path) ? unlink($path) : '';
            }
        };
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->shop_info = $request->shop_info;
        $user->image = $imageName;

        $notification = array(
            'message' => 'Profile Update Successfully.',
            'alert-type' => 'success',
        );
        if($user->save()){
            return redirect()->back()->with($notification);
        }
    }

    // password Change
    public function vendorPasswordChange() {
        return view('vendor.passwordChange');
    }

    // Become vendor Register
    public function vendorRegister(Request $request) {
        $admin = User::where('role', 'admin')->get();
        $request->validate([
            'shop_name' => 'required',
            'user_name' => 'required',
            'email' => 'required|unique:users,email',
            'phone' => 'required',
            'password' => 'required|confirmed',
        ]);
        $becomeVendor = User::create([
            'name' => $request->shop_name,
            'username' => $request->user_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'status' => 'inactive',
            'role' => 'vendor',
        ]);
        $notification = array(
            'message' => 'Vendor registered Successfully.',
            'alert-type' => 'success',
        );
        if($becomeVendor){
            Notification::send($admin, new VendorNotification($request->shop_name));
            return redirect()->route('vendorLogin')->with($notification);
        }
    }
}

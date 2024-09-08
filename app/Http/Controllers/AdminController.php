<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Image;

class AdminController extends Controller
{
    // Admin Dashboard 
    public function adminDashboard() {
        return view('admin.dashboard');
    }
    // Admin Logout
    public function adminLogout(Request $request)
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('adminLogin');
    }

    // Admin Profile 
    public function adminProfile() {
        $user = User::find( Auth()->user()->id );
        return view('admin.profile', compact('user'));
    }

    // Admin Profile Update
    public function profileUpdate(Request $request){
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
                $previousImage = public_path('images/users/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        };
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
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
    public function passwordChange() {
        return view('admin.passwordChange');
    }

    // Active Vendors
    public function activeVendors() {
        $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        return view('admin.vendors.activeVendors', compact('vendors'));
    }

    // inActive Vendors
    public function inactiveVendors() {
        $vendors = User::where('role', 'vendor')->where('status', 'inactive')->get();
        return view('admin.vendors.inactiveVendors', compact('vendors'));
    }

    // Vendor Details
    public function adminVendorDetails($id) {
        $vendor = User::find($id);
        return view('admin.vendors.vendorDetails', compact('vendor'));
    }

    // Vendor Status Update
    public function vendorStatus(Request $request) {
        $vendor = User::find($request->id)->update([
            'status' => $request->vendor_status,
        ]);
        if($vendor) {
            $notification = array(
                'message' => 'Vendor Status Updated Successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('activeVendors')->with($notification);
        }
    }

    // All Vendors
    public function adminAllVendors() {
        $vendors = User::where('role', 'vendor')->get();
        return view('admin.usersManager.vendors', compact('vendors'));
    }

    // All customers
    public function adminAllCustomers() {
        $customers = User::where('role', 'user')->get();
        return view('admin.usersManager.customers', compact('customers'));
    }

    // Customer Details
    public function adminCustomerDetails($id) {
        $customer = User::find($id);
        return view('admin.usersManager.userDetails', compact('customer'));
    }

    // All Admins
    public function adminAllAdmins() {
        $admins = User::where('role', 'admin')->get();
        return view('admin.admins.admins', compact('admins'));
    }

    // Add New Admin
    public function adminNewAdminAdd()
    {
        $roles = Role::has('permissions')->get();
        return view('admin.admins.adminAdd', compact('roles'));
    }

    public function adminNewAdminSave(Request $request)
    {
    
        // Create a new User instance
        $admin = new User();
    
        // Set the user attributes
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->role = 'admin';
        $admin->status = 'active';
        $admin->password = Hash::make($request->password); // Hash the password
        if($request->role) {
            $admin->assignRole($request->role); // Assign the selected role
        }

        if($admin->save()){
            $notification = [
            'message' => 'New admin created successfully.',
            'alert-type' => 'success',
        ];
    
        // Redirect back or to a specific route
        return redirect()->route('adminAllAdmins')->with($notification);
        }
    }

    // Admin Edit data load
    public function adminNewAdminEdit($id)
    {
        $admin = User::find($id);
        $roles = Role::has('permissions')->get();
        return view('admin.admins.adminEdit', compact('admin' , 'roles'));
    }

    public function adminNewAdminUpdate(Request $request)
    {
        $admin = User::findOrFail($request->id);
        // Set the user attributes
        $admin->name = $request->name;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->address = $request->address;
        $admin->role = 'admin';
        $admin->status = 'active';
        if($request->role) {
            $admin->syncRoles([$request->role]);
        }

        if($admin->save()){
            $notification = [
            'message' => 'Admin Updated successfully.',
            'alert-type' => 'success',
        ];
    
        // Redirect back or to a specific route
        return redirect()->route('adminAllAdmins')->with($notification);
        }
    }

    // Admin Delete
    public function adminNewAdminDelete($id)
    {
        // Find the admin by ID
        $admin = User::findOrFail($id);
        $admin->delete();

        $notification = [
            'message' => 'Admin deleted successfully.',
            'alert-type' => 'success',
        ];
        // Redirect back or to a specific route
        return redirect()->route('adminAllAdmins')->with($notification);
    }
}
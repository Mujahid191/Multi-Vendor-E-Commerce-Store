<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    // Get all Roles
    public function adminRoles()
    {
        $roles = Role::all();
        return view('admin.rolePermissions.roles.roleAll', compact('roles'));
    }

    // New Role Save
    public function adminRoleSave(Request $request)
    {
        $role = Role::create([
            'name' => $request->role_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Role inserted successfully.',
            'alert-type' => 'success',
        );
        if($role) {
            return redirect()->route('adminRoles')->with($notification);
        }
    }

    // Role Edit name load
    public function adminRoleEdit($id)
    {
        $role = Role::findById($id);
        return view('admin.rolePermissions.roles. roleEdit', compact('role'));
    }

    // Role Update
    public function adminRoleUpdate(Request $request)
    {
        $role = Role::findById($request->id)->update([
            'name' => $request->role_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Role updated successfully.',
            'alert-type' => 'success',
        );
        if($role) {
            return redirect()->route('adminRoles')->with($notification);
        }
    }

    // Role Delete
    public function adminRoleDelete($id)
    {
        $role = Role::findById($id)->delete();
        $notification = array(
            'message' => 'Role Delete successfully.',
            'alert-type' => 'success',
        );
        if($role) {
            return redirect()->route('adminRoles')->with($notification);
        }
    }


    // Get all Permissions
    public function adminPermissions()
    {
        $permissions = Permission::all();
        return view('admin.rolePermissions.permissions.permissionAll', compact('permissions'));
    }

    // New Role Save
    public function adminPermissionSave(Request $request)
    {
        $permission = Permission::create([
            'name' => $request->permission_name,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Permission inserted successfully.',
            'alert-type' => 'success',
        );
        if($permission) {
            return redirect()->route('adminPermissions')->with($notification);
        }
    }

    // Permission Edit name load
    public function adminPermissionEdit($id)
    {
        $permission = Permission::findById($id);
        return view('admin.rolePermissions.permissions. permissionEdit', compact('permission'));
    }

    // Permission Update
    public function adminPermissionUpdate(Request $request)
    {
        $permission = Permission::findById($request->id)->update([
            'name' => $request->permission_name,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Permission updated successfully.',
            'alert-type' => 'success',
        );
        if($permission) {
            return redirect()->route('adminPermissions')->with($notification);
        }
    }

    // permission Delete
    public function adminPermissionDelete($id)
    {
        $permission = Permission::findById($id)->delete();
        $notification = array(
            'message' => 'Permission Delete successfully.',
            'alert-type' => 'success',
        );
        if($permission) {
            return redirect()->route('adminPermissions')->with($notification);
        }
    }

    public function adminRolesPermissions()
    {
        $roles = Role::has('permissions')->get();
        return view('admin.rolePermissions.allRolePermissions', compact('roles'));
    }
    // Role and Permission load for permission assign to user
    public function adminRolePermissionAdd()
    {
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.rolePermissions.rolePermissionAdd', compact('roles', 'permissions'));
    }

    public function adminRolePermissionAssign(Request $request)
    {
        // Validate the form data
        $request->validate([
            'role' => 'required|exists:roles,id',
            'permission_ids' => 'array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($request->input('role'));
        $permissions = Permission::find($request->input('permission_ids'));

        // Sync permissions to the role
        $role->syncPermissions($permissions);

        $notification = array(
            'message' => 'Role assigned successfully.',
            'alert-type' => 'success',
        );
        // Redirect back or to a specific route
        return redirect()->route('adminRolesPermissions')->with($notification);
    }

    // Edit role and Permissions
    public function adminRolePermissionEdit($id)
    {
        $rolePermission = Role::findById($id);
        $roles = Role::all();
        $permissions = Permission::all();
        return view('admin.rolePermissions.rolePermissionEdit', compact('rolePermission','roles', 'permissions'));
    }

    // Update Role and Permission
    public function adminRolePermissionUpdate(Request $request)
    {
        // Validate the form data
        $request->validate([
            'role' => 'required|exists:roles,id',
            'permission_ids' => 'array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);

        $role = Role::findOrFail($request->input('role'));
        $permissions = Permission::find($request->input('permission_ids'));

        // Sync permissions to the role
        $role->syncPermissions($permissions);

        $notification = array(
            'message' => 'Role Permissions Update successfully.',
            'alert-type' => 'success',
        );
        // Redirect back or to a specific route
        return redirect()->route('adminRolesPermissions')->with($notification);
    }

    // Delete Role Permission
    public function adminRolePermissionDelete(Request $request, $roleId)
    {
        // Validate the form data
        $request->validate([
            'permission_ids' => 'array',
            'permission_ids.*' => 'exists:permissions,id',
        ]);
    
        $role = Role::findOrFail($roleId);
        $permissions = DB::table('role_has_permissions')->where('role_id', $role->id)->get();
        foreach ($permissions as $permission) {
            $role->revokePermissionTo($permission);
        }
    
        $notification = [
            'message' => 'Role permissions deleted successfully.',
            'alert-type' => 'success',
        ];
    
        // Redirect back or to a specific route
        return redirect()->route('adminRolesPermissions')->with($notification);
    }
}
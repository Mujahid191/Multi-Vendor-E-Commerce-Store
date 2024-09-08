<?php

namespace App\Http\Controllers\backend\admin\ship;

use App\Http\Controllers\Controller;
use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class DivisionController extends Controller
{
    // Admin All Divisions
    public function adminDivisionsAll() {
        $divisions = Division::latest()->get();
        return view('admin.ship.divisions.divisionsAll', compact('divisions'));
    }

    // New Division Save
    public function adminDivisionSave(Request $request) {
        try {
            $division = Division::insert([
                'name' => $request->name,
                'created_at' => Carbon::now(),
            ]);
            if($division) {
                $notification = array(
                    'message' => 'Division added successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->route('adminDivisionsAll')->with($notification);
            }
        }catch(QueryException $error) {
            {
                $errorCode = $error->errorInfo[1];
                $notification = array(
                    'message' => 'Division already exist.',
                    'alert-type' => 'warning',
                );
                return redirect()->back()->with($notification);
            }
        };
    }

    // Edit Division page load
    public function adminDivisionEdit($id) {
        $division = Division::find($id);
        return view('admin.ship.divisions.divisionEdit', compact('division'));
    }

    // Division Update
    public function adminDivisionUpdate(Request $request) {
        $division = Division::find($request->id)->update([
            'name' => $request->name,
            'updated_at' => Carbon::now(),
        ]);
        if($division) {
            $notification = array(
                'message' => 'Division updated successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminDivisionsAll')->with($notification);
        }
    }

    // Delete Division
    public function adminDivisionDelete($id) {
        $division = Division::find($id)->delete();
        if($division) {
            $notification = array(
                'message' => 'Division Deleted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminDivisionsAll')->with($notification);
        }
    }
}

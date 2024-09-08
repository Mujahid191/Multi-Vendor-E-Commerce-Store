<?php

namespace App\Http\Controllers\backend\admin\ship;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use Carbon\Carbon;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    // Districts 
    public  function adminDistrictsAll() {
        $districts = District::latest()->get();
        return view('admin.ship.districts.districtsAll', compact('districts'));
    }

    // District Add page and load Division
    public function districtAdd(){
        $divisions = Division::all();
        return view('admin.ship.districts.districtAdd', compact('divisions'));
    }

    // New District save
    public function adminDistrictSave(Request $request) {
        try {
            $district = District::insert([
                'district_name' => $request->district_name,
                'division_id' => $request->division,
                'created_at' => Carbon::now(),
            ]);
            if($district) {
                $notification = array(
                    'message' => 'District added successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->route('adminDistrictsAll')->with($notification);
            }
        }catch(QueryException $error) {
            {
                $errorCode = $error->errorInfo[1];
                $notification = array(
                    'message' => $errorCode,
                    'alert-type' => 'error',
                );
                return redirect()->back()->with($notification);
            }
        };
    }

    // District Edit data load
    public function adminDistrictEdit($id) {
        $district = District::find($id);
        $divisions = Division::all();
        return view('admin.ship.districts.districtEdit', compact('district', 'divisions'));
    }

    // District Update
    public function adminDistrictUpdate(Request $request) {
        $district = District::find($request->id)->update([
            'district_name' => $request->district_name,
            'division_id' => $request->division,
            'updated_at' => Carbon::now(),
        ]);
        if($district) {
            $notification = array(
                'message' => 'District Updated successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminDistrictsAll')->with($notification);
        }
    }

    // District Delete
    public function adminDistrictDelete($id) {
        $district = District::find($id)->delete();
        if($district) {
            $notification = array(
                'message' => 'District Deleted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }
}

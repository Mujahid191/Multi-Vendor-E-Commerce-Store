<?php

namespace App\Http\Controllers\backend\admin\ship;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Division;
use App\Models\State;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //State load
    public function adminStatesAll() {
        $states = State::latest()->get();
        return view('admin.ship.states.statesAll', compact('states'));
    }
    // District Add page and load Division
    public function stateAdd(){
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.ship.states.stateAdd', compact('divisions', 'districts'));
    }

    // District By Division
    public function getDistrict($id) {
        $districts = District::where('division_id', $id)->get();
        return response()->json($districts);
    }

    // State Save
    public function adminStateSave(Request $request) {
        $state = State::create([
            'state_name' => $request->state_name,
            'division_id' => $request->division,
            'district_id' => $request->district,
            'created_at' => Carbon::now(),
        ]);
        if($state) {
            $notification = array(
                'message' => 'State inserted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminStatesAll')->with($notification);
        }
    }

    // State Edit page and data load
    public function adminStateEdit($id) {
        $state = State::find($id);
        $divisions = Division::all();
        $districts = District::all();
        return view('admin.ship.states.stateEdit', compact('state','divisions', 'districts'));
    }

    // State Update
    public function adminStateUpdate(Request $request) {
        $state = State::find($request->id)->update([
            'state_name' => $request->state_name,
            'division_id' => $request->division,
            'district_id' => $request->district,
            'updated_at' => Carbon::now(),
        ]);
        if($state) {
            $notification = array(
                'message' => 'State Updated successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminStatesAll')->with($notification);
        }
    }

    // Delete State
    public function adminStateDelete($id) {
        $state = State::find($id)->delete();
        if($state) {
            $notification = array(
                'message' => 'State Deleted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->route('adminStatesAll')->with($notification);
        }
    }
}

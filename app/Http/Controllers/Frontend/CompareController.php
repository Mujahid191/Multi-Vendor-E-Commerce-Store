<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompareController extends Controller
{
    //compare products page
    public function compareProducts() {
        return view('frontend.compare');
    }
    // product save in compare
    public function productAddCompare($id) {
        if(Auth::check()){
            $exist = Compare::where('user_id', Auth::id())->where('product_id', $id)->first();
            if(!$exist){
                $compare = Compare::insert([
                    'product_id' => $id,
                    'user_id' => Auth::id(),
                    'created_at' => Carbon::now(),
                ]);
                if($compare){
                    return response()->json(['success' => 'Product add to compare successfully.']);
                }
            }else{
                return response()->json(['success' => 'Product already Exists.']);
            }
        }
    }
    // compare Product load
    public function compareAllProducts() {
        $compare = Compare::with('products.Review')->where('user_id', Auth::id())->latest()->get();
        return response()->json($compare);
    }

    // Delete product
    public function productRemoveCompare($id) {
        $compare = Compare::find($id)->delete();
        return response()->json(['success' => 'Deleted successfully.']);
    }
}

<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Dotenv\Repository\RepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    // Wishlist Page
    public function wishlistProducts() {
        return view('frontend.wishlist');
    }
    // Save Data in wishlist table
    public function productAddWishlist($id) {
        if(Auth::check()){
            $exist = Wishlist::where('user_id', Auth::id())->where('product_id', $id)->first();
            if(!$exist){
                $wishlist = Wishlist::insert([
                    'product_id' => $id,
                    'user_id' => Auth::id(),
                    'created_at' => Carbon::now(),
                ]);
                if($wishlist){
                    return response()->json(['success' => 'Product add to wishlist successfully.']);
                }
            }else{
                return response()->json(['success' => 'Product already Exists.']);
            }
        }else{
            return response()->json(['redirect' => route('login')]);
        }
    }

    // Wishlist Product load
    public function wishlistAllProducts() {
        $wishlist = Wishlist::with('Products.Review')->where('user_id', Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    // Product Delete
    public function productRemoveWishlist($id) {
        $wishlist = Wishlist::find($id)->delete();
        return response()->json(['success' => 'Deleted successfully.']);
    }
}

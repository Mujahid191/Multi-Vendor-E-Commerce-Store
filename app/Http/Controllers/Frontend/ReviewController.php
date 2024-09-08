<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Review Save
    public function userReviewSave(Request $request)
    {
        $review = Review::insert([
            'user_id' => $request->user_id,
            'product_id' => $request->product_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
            'created_at' => Carbon::now(),
        ]);

        if($review){
            return redirect()->back();
        }
    }

    // Admin Pending Reviews
    public function adminReviewsPending(){
        $reviews = Review::where('status', 0)->latest()->get();
        return view('admin.reviews.pending', compact('reviews'));
    }

    // Admin Pending Reviews
    public function adminReviewsPublished(){
        $reviews = Review::where('status', 1)->latest()->get();
        return view('admin.reviews.published', compact('reviews'));
    }

    // Admin review approved
    public function adminReviewApproved($id)
    {
        $review = Review::find($id)->update([
            'status' => 1,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Review approved Successfully.',
            'alert-type' => 'success',
        );
        if($review){
            return redirect()->route('adminReviewsPublished')->with($notification);
        }
    }

    // Admin review approved
    public function adminReviewDeleted($id)
    {
        $review = Review::find($id)->delete();
        $notification = array(
            'message' => 'Review Deleted Successfully.',
            'alert-type' => 'success',
        );
        if($review){
            return redirect()->route('adminReviewsPublished')->with($notification);
        }
    }
}

<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider;
use Illuminate\Http\Request;
use Image;

class HomeSliderController extends Controller
{
    // All Slides
    public function adminSlidesAll() {
        $slides = HomeSlider::latest()->get();
        return view('admin.homeSlider.slidesAll', compact('slides'));
    }

    // Slide Save
    public function adminSlideSave(Request $request) {
        $request->validate([
            'title' => 'required',
        ]);
        if( empty($request->file('image')) ){
            $imageName = '';
        }else{
            $image = $request->file('image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/homeSlider/' . $imageName);
            // Image Resize
            Image::make($image)->resize(2376, 807)->save($path);
        }
        $slide = HomeSlider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Slide inserted successfully.',
            'alert-type' => 'success',
        );
        if($slide){
            return redirect()->route('adminSlidesAll')->with($notification);
        }
    }

    // Edit Slide
    public function adminSlideEdit($id) {
        $slide = HomeSlider::find($id);
        return view('admin.homeSlider.slideEdit', compact('slide'));
    }

    // Update Slide
    public function adminSlideUpdate(Request $request) {
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/homeSlider/' . $imageName);
            // Image Resize
            Image::make($image)->resize(2376, 807)->save($path);

            if( !empty($request->old_image) ){
                $previousImage = public_path('images/homeSlider/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $slide = HomeSlider::find($request->id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Slide Updated successfully.',
            'alert-type' => 'success',
        );
        if($slide){
            return redirect()->route('adminSlidesAll')->with($notification);
        }
    }

    // Delete Slide
    public function adminSlideDelete($id) {
        $slide = HomeSlider::find($id);
        if( !empty($slide->image)){
            $image = public_path('images/homeSlider/' . $slide->image);
            if( file_exists($image)){
                unlink($image);
            }
        }
        $notification = array(
            'message' => 'Slide Deleted successfully.',
            'alert-type' => 'success',
        );
        $slide->delete();
        return redirect()->back()->with($notification);
    }
}

<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Image;

class BannerController extends Controller
{
    // All Categories
    public function adminBannersAll() {
        $banners = Banner::latest()->get();
        return view('admin.homeBanner.bannersAll', compact('banners'));
    }

    // Banner Save
    public function adminBannerSave(Request $request) {
        $request->validate([
            'title' => 'required',
        ]);
        if( empty($request->file('image')) ){
            $imageName = '';
        }else{
            $image = $request->file('image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/homeBanner/' . $imageName);
            // Image Resize
            Image::make($image)->resize(768, 450)->save($path);
        }
        $banner = Banner::create([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Banner inserted successfully.',
            'alert-type' => 'success',
        );
        if($banner){
            return redirect()->route('adminBannersAll')->with($notification);
        }
    }

    // Edit Banner
    public function adminBannerEdit($id) {
        $banner = Banner::find($id);
        return view('admin.homeBanner.bannerEdit', compact('banner'));
    }

    // Update Category
    public function adminBannerUpdate(Request $request) {
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/homeBanner/' . $imageName);
            // Image Resize
            Image::make($image)->resize(768, 450)->save($path);

            if( !empty($request->old_image) ){
                $previousImage = public_path('images/homeBanner/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $Banner = Banner::find($request->id)->update([
            'title' => $request->title,
            'url' => $request->url,
            'image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Banner Updated successfully.',
            'alert-type' => 'success',
        );
        if($Banner){
            return redirect()->route('adminBannersAll')->with($notification);
        }
    }
}

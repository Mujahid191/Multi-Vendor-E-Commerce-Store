<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Image;

class BrandController extends Controller
{
    // Admin All Brands
    public function adminBrandsAll() {
        $brands = Brand::latest()->get();
        return view('admin.brands.brandsAll', compact('brands'));
    }

    // Add New Brand
    public function adminBrandSave(Request $request) {
        $request->validate([
            'brand_name' => 'required',
        ]);
        if( !empty($request->file('brand_image')) ){
            $image = $request->file('brand_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/brands/' . $imageName);
            // Image Resize
            Image::make($image)->resize(80, 80)->save($path);
            $brand = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
                'brand_image' => $imageName,
            ]);
        }else{
            $brand = Brand::create([
                'brand_name' => $request->brand_name,
                'brand_slug' => strtolower(str_replace(' ', '-', $request->brand_name)),
            ]);
        }
        $notification = array(
            'message' => 'New Brand inserted successfully',
            'alert-type' => 'success',
        );
        if($brand){
            return redirect()->route('adminBrandsAll')->with($notification);
        }
    }
    // Edit Brand Method
    public function adminBrandEdit($id) {
        $brand = Brand::find($id);
        return view('admin.brands.brandEdit', compact('brand'));
    }
    // Brand Update Method
    public function adminBrandUpdate(Request $request){
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/brands/' . $imageName);
            // Resize Image
            Image::make($image)->resize(80, 80)->save($path);

            if( !empty($request->old_image) ){
                $previousImage = public_path('images/brands/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $brand = Brand::find($request->id);
        $brand->brand_name = $request->brand_name;
        $brand->brand_slug = strtolower(str_replace(' ', '-', $request->brand_name));
        $brand->brand_image = $imageName;

        $notification = array(
            'message' => 'Brand Update successfully.',
            'alert-type' => 'success',
        );
        if($brand->save()) {
            return redirect()->route('adminBrandsAll')->with($notification);
        }
    }

    // Brand Delete Method
    public function adminBrandDelete($id) {
        $brand = Brand::find($id);
        if( !empty($brand->brand_image) ){
            $path = public_path('images/brands/' . $brand->brand_image);
            unlink($path);
        }
        $brandDelete = Brand::find($id)->delete();
        $notification = array(
            'message' => 'Brand Delete successfully.',
            'alert-type' => 'success',
        );
        if($brandDelete){
            return redirect()->route('adminBrandsAll')->with($notification);
        }
    }
}

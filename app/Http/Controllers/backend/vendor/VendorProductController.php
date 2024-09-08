<?php

namespace App\Http\Controllers\backend\vendor;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Image;
use PhpParser\Parser\Multiple;

class VendorProductController extends Controller
{
    // Vendor All Products
    public function vendorProductsAll() {
        $products = Product::where('user_id', Auth::user()->id)->latest()->get();
        return view('vendor.products.productAll', compact('products'));
    }

    // Product Add Page
    public function vendorProductAdd() {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        return view('vendor.products.productAdd', compact('brands','categories'));
    }
    // Product sub Category load with JavaScript
    public function vendorProductSubcategory($id){
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }

    // Vendor Product Save
    public function vendorProductSave(Request $request) {
        $image = $request->file('thumbnail');
        $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('images/products/thumbnails/' . $imageName);
        // Resize Image
        Image::make($image)->resize(800, 800)->save($imagePath);
        $product_id = Product::insertGetId([
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'tags' => $request->tags,
            'product_code' => $request->code,
            'product_quantity' => $request->quantity,
            'product_color' => $request->color,
            'product_size' => $request->size,
            'selling_price' => $request->price,
            'discount_price' => $request->discount,
            'featured' => $request->featured_id,
            'hot_deals' => $request->hot_deals,
            'special_deals' => $request->special_deals,
            'special_offer' => $request->special_offer,
            'status' => 1,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'thumbnail' => $imageName,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'user_id' => $request->vendor,
            'created_at' => Carbon::now(),
        ]);
        // Save MultiImage
        $multiImages = $request->file('multiImage');
        foreach ($multiImages as $image) {
            $multiImageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/products/multiImages/' . $multiImageName);
            // Resize Image
            Image::make($image)->resize(800, 800)->save($imagePath);

            MultiImage::create([
                'image_name' => $multiImageName,
                'product_id' => $product_id,
                'created_at' => Carbon::now(),
            ]);
        }
        $notification = array(
            'message' => 'Product inserted successfully.',
            'alert-type' => 'success',
        );
        if($product_id){
            return redirect()->route('vendorProductsAll')->with($notification);
        }
    }

    // Edit Product
    public function vendorProductEdit($id) {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $product = Product::find($id);
        $vendor = User::find($product->user_id);
        $subcategory = SubCategory::latest()->get();
        $multiImages = MultiImage::where('product_id', $id)->get();
        return view('vendor.products.productEdit', compact('brands','categories', 'vendor', 'subcategory', 'product', 'multiImages'));
    }

    // Vendor Product Update
    public function vendorProductUpdate(Request $request) {
        if( empty($request->file('new_thumbnail')) ) {
            $imageName = $request->old_thumbnail;
        }else{
            $image = $request->file('new_thumbnail');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/products/thumbnails/' . $imageName);
            // Image Resize
            Image::make($image)->resize(800, 800)->save($imagePath);
            // Delete Previous
            if( !empty($request->old_thumbnail) ){
                $previousImage = public_path('images/products/thumbnails/' . $request->old_thumbnail);
                if(file_exists($previousImage)) {
                    unlink($previousImage);
                }
            }
        }
        $product = Product::find($request->id)->update([
            'product_name' => $request->product_name,
            'product_slug' => strtolower(str_replace(' ', '-', $request->product_name)),
            'tags' => $request->tags,
            'product_code' => $request->code,
            'product_quantity' => $request->quantity,
            'product_color' => $request->color,
            'product_size' => $request->size,
            'selling_price' => $request->price,
            'discount_price' => $request->discount,
            'featured' => $request->featured_id,
            'hot_deals' => $request->hot_deals,
            'special_deals' => $request->special_deals,
            'special_offer' => $request->special_offer,
            'status' => 1,
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'thumbnail' => $imageName,
            'brand_id' => $request->brand,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'user_id' => $request->vendor,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Product Updated successfully.',
            'alert-type' => 'success',
        );
        if($product){
            return redirect()->route('vendorProductsAll')->with($notification);
        }
    }

    // MultiImage Update
    public function vendorProductUpdateMultiImage(Request $request) {
        if( !empty($request->file('multi_image'))){
            $images = $request->file('multi_image');
            foreach ($images as $id => $image) {
                $delImage = MultiImage::find($id);
                    if( !empty($delImage)){
                        $path = public_path('images/products/multiImage/' . $delImage->image_name);
                    if(file_exists($path)){
                        unlink($path);
                    }
                }
                $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('images/products/multiImages/' . $imageName);
                // Image Resize
                Image::make($image)->resize(800, 800)->save($imagePath);

                MultiImage::where('id', $id)->update([
                    'image_name' => $imageName,
                    'updated_at' => Carbon::now(),
                ]);
                $notification = array(
                    'message' => 'Image Updated successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        }else{
            $notification = array(
                'message' => 'Please choose any image.',
                'alert-type' => 'warning',
            );
            return redirect()->back()->with($notification);
        }
    }

    // Vendor Multi Image Delete
    public function vendorProductDeleteMultiImage($id) {
        $multiImage = MultiImage::find($id);
        if(!empty($multiImage)) {
            $imagePath = public_path('images/products/multiImages/' . $multiImage->image_name);
            if( file_exists($imagePath)) {
                unlink($imagePath);
                $multiImage->delete();
                $notification = array(
                    'message' => 'Image Deleted successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    // Product Status Update
    public function vendorProductStatusUpdate($id) {
        $product = Product::find($id);
        if( $product->status == 1){
            $product->status = 0;
            $product->save();
            $notification = array(
                'message' => 'Product Inactive successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }else{
            $product->status = 1;
            $product->save();
            $notification = array(
                'message' => 'Product Active successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

    // Vendor Product Delete
    public function vendorProductDelete($id) {
        $multiImages = MultiImage::where('product_id', $id)->get();
        foreach ($multiImages as $image) {
            $imagePath = public_path('images/products/multiImages/' . $image->image_name);
            if( file_exists($imagePath)){
                unlink($imagePath);
                $image->delete();
            }
        }
        $product = Product::find($id);
        if( !empty($product->thumbnail) ) {
            $imagePath = public_path('images/products/thumbnails/' . $product->thumbnail);
            unlink($imagePath);
            $product->delete();
        }
        $notification = array(
            'message' => 'Product Deleted successfully.',
            'alert-type' => 'success',
        );
        return redirect()->back()->with($notification);

    }
}

<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

class ProductController extends Controller
{
    // All Products
    public function adminProductsAll() {
        $products = Product::latest()->get();
        return view('admin.products.productAll', compact('products'));
    }

    // Product Add Page
    public function adminProductAdd() {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        return view('admin.products.productAdd', compact('brands','categories', 'vendors'));
    }
    // Product sub Category load with JavaScript
    public function adminProductSubcategory($id){
        $subcategory = SubCategory::where('category_id', $id)->get();
        return response()->json($subcategory);
    }

    // New Product save method
    public function adminProductSave(Request $request) {
        $image = $request->file('thumbnail');
        $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
        $imagePath = public_path('images/products/thumbnails/' . $imageName);
        // Image Resize
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

        // Save Multi Image
        $multiImages = $request->file('multiImage');
        foreach ($multiImages as $image) {
            $multiImageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/products/multiImages/' . $multiImageName);
            // Image Resize
            Image::make($image)->resize(800, 800)->save($imagePath);

            $multiImage = MultiImage::create([
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
            return redirect()->route('adminProductsAll')->with($notification);
        }
    }

    // Edit Product
    public function adminProductEdit($id) {
        $brands = Brand::latest()->get();
        $categories = Category::latest()->get();
        $vendors = User::where('role', 'vendor')->where('status', 'active')->get();
        $product = Product::find($id);
        $subcategory = SubCategory::latest()->get();
        $multiImages = MultiImage::where('product_id', $id)->get();
        return view('admin.products.productEdit', compact('brands','categories', 'vendors', 'subcategory', 'product', 'multiImages'));
    }

    // Update Product
    public function adminProductUpdate(Request $request) {
        if( empty($request->file('new_thumbnail')) ){
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
            return redirect()->route('adminProductsAll')->with($notification);
        }
    }
    // Product MultiImage Update
    public function adminProductUpdateMultiImage(Request $request) {
        if( !empty($request->file('multi_image')) ){
            $images = $request->file('multi_image');
            foreach ($images as $id => $image) {
                $delImage = MultiImage::find($id);
                if( !empty($delImage) ) {
                    $imagePath = public_path('images/products/multiImages/' . $delImage->image_name);
                    if(file_exists($imagePath)){
                        unlink($imagePath);
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

    // Delete Single image from MultiImage
    public function adminProductDeleteMultiImage($id) {
        $singleImage = MultiImage::find($id);
        if( !empty($singleImage)) {
            $Image = public_path('images/products/multiImages/' . $singleImage->image_name);
            if( file_exists($Image)){
                unlink($Image);
                $singleImage->delete();
                $notification = array(
                    'message' => 'Image Deleted successfully.',
                    'alert-type' => 'success',
                );
                return redirect()->back()->with($notification);
            }
        }
    }
    // Product Status Update
    public function adminProductStatusUpdate($id) {
        $product = Product::find($id);
        if($product->status == 1){
            $product->status = 0;
            $notification = array(
                'message' => 'Product Inactive successfully.',
                'alert-type' => 'success',
            );
            if($product->save()){
                return redirect()->back()->with($notification);
            }
        }else{
            $product->status = 1;
            $notification = array(
                'message' => 'Product active successfully.',
                'alert-type' => 'success',
            );
            if($product->save()){
                return redirect()->back()->with($notification);
            }
        }
    }

    // Product Delete
    public function adminProductDelete($id) {
        $multiImage = MultiImage::where('product_id', $id)->get();
        foreach ($multiImage as $image) {
            $path = public_path('images/products/multiImages/' . $image->image_name);
            if(file_exists($path)){
                unlink($path);
            }
            $image->delete();
        }
        $product = Product::find($id);
        $path = public_path('images/products/thumbnails/' . $product->thumbnail);
            if(file_exists($path)) {
                unlink($path);
            }
        $productDel = Product::find($id)->delete();
        if($productDel) {
            $notification = array(
                'message' => 'Product Deleted successfully.',
                'alert-type' => 'success',
            );
            return redirect()->back()->with($notification);
        }
    }

}

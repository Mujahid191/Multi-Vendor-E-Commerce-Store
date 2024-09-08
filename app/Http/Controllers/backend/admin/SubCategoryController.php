<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Image;

class SubCategoryController extends Controller
{
    // All Sub Categories
    public function adminSubCategoriesAll() {
        $subCategories = SubCategory::latest()->get();
        return view('admin.subCategories.subCategoryAll', compact('subCategories'));
    }

    // Show Categories for new sub categories
    public function adminSubCategoryAdd() {
        $categories = Category::all();
        return view('admin.subCategories.subCategoryAdd', compact('categories'));
    }

    // New Sub Category added
    public function adminSubCategorySave(Request $request){
        if( empty($request->file('sub_category_image')) ){
            $imageName = '';
        }else{
            $image = $request->file('sub_category_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/subCategories/' . $imageName);
            // Image Resize
            Image::make($image)->resize(80, 80)->save($path);
        }
        $subCategory = SubCategory::create([
            'subCategory_name' => $request->sub_category_name,
            'subCategory_slug' => strtolower(str_replace(' ', '-', $request->sub_category_name)),
            'subCategory_image' => $imageName,
            'category_id' => $request->main_category,
        ]);
        $notification = array(
            'message' => 'Sub Category inserted successfully.',
            'alert-type' => 'success',
        );
        if($subCategory){
            return redirect()->route('adminSubCategoriesAll')->with($notification);
        }
    }

    // Edit Sub Category 
    public function adminSubCategoryEdit($id) {
        $subCategory = SubCategory::find($id);
        $categories = Category::all();
        return view('admin.subCategories.subCategoryEdit', compact('subCategory', 'categories'));
    }

    // Update Category
    public function adminSubCategoryUpdate(Request $request) {
        if( empty($request->file('new_image')) ){
            if(empty($request->old_image)){
                $imageName = '';
            }else{
                $imageName = $request->old_image;
            }
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $path = public_path('images/subCategories/' . $imageName);
            // Image Resize
            Image::make($image)->resize(80, 80)->save($path);

            if( !empty($request->old_image) ){
                $previousImage = public_path('images/subCategories/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $subCategory = SubCategory::find($request->id)->update([
            'subCategory_name' => $request->sub_category_name,
            'subCategory_slug' => strtolower(str_replace(' ', '-', $request->sub_category_name)),
            'subCategory_image' => $imageName,
            'category_id' => $request->main_category,
        ]);
        $notification = array(
            'message' => 'Sub Category Updated successfully.',
            'alert-type' => 'success',
        );
        if($subCategory){
            return redirect()->route('adminSubCategoriesAll')->with($notification);
        }
    }
     // Delete Category
     public function adminSubCategoryDelete($id) {
        $subCategory = SubCategory::find($id);
        if( !empty($subCategory->subCategory_image)){
            $image = public_path('images/subCategories/' . $subCategory->subCategory_image);
            unlink($image);
        }
        
        $subCategoryDelete = SubCategory::find($id)->delete();
        $notification = array(
            'message' => 'Sub Category Deleted successfully.',
            'alert-type' => 'success',
        );
        if($subCategoryDelete){
            return redirect()->route('adminSubCategoriesAll')->with($notification);
        }
    }
}

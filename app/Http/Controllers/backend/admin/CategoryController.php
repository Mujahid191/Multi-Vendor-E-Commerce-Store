<?php

namespace App\Http\Controllers\backend\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Image;

class CategoryController extends Controller
{
    // All Categories
    public function adminCategoriesAll() {
        $categories = Category::latest()->get();
        return view('admin.categories.categoryAll', compact('categories'));
    }

    // Add New Category
    public function adminCategorySave(Request $request) {
        $request->validate([
            'category_name' => 'required',
        ]);
        if( empty($request->file('category_image')) ){
            $imageName = '';
        }else{
            $image = $request->file('category_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            if($image->extension() == 'svg') {
                $image->move(public_path('images/categories/'), $imageName);
            }else{
                $path = public_path('images/categories/' . $imageName);
                // Image Resize
                Image::make($image)->resize(80, 80)->save($path);
            }
        }
        $category = Category::create([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Category inserted successfully.',
            'alert-type' => 'success',
        );
        if($category){
            return redirect()->route('adminCategoriesAll')->with($notification);
        }
    }

    // Edit Category
    public function adminCategoryEdit($id) {
        $category = Category::find($id);
        return view('admin.categories.categoryEdit', compact('category'));
    }

    // Update Category
    public function adminCategoryUpdate(Request $request) {
        if( empty($request->file('new_image')) ){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            if($image->extension() == 'svg') {
                $image->move(public_path('images/categories/'), $imageName);
            }else{
                $path = public_path('images/categories/' . $imageName);
                // Image Resize
                Image::make($image)->resize(80, 80)->save($path);
            }

            if( !empty($request->old_image) ){
                $previousImage = public_path('images/categories/' . $request->old_image);
                file_exists($previousImage) ? unlink($previousImage) : '';
            }
        }
        $category = Category::find($request->id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'category_image' => $imageName,
        ]);
        $notification = array(
            'message' => 'Category Updated successfully.',
            'alert-type' => 'success',
        );
        if($category){
            return redirect()->route('adminCategoriesAll')->with($notification);
        }
    }

    // Delete Category
    public function adminCategoryDelete($id) {
        $category = Category::find($id);
        if( !empty($category->category_image)){
            $image = public_path('images/categories/' . $category->category_image);
            if( file_exists($image)){
                unlink($image);
            }
        }
        $categoryDelete = Category::find($id)->delete();
        $notification = array(
            'message' => 'Category Deleted successfully.',
            'alert-type' => 'success',
        );
        if($categoryDelete){
            return redirect()->route('adminCategoriesAll')->with($notification);
        }
    }
    
}

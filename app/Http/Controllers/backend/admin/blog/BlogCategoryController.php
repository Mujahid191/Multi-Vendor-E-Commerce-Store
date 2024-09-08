<?php

namespace App\Http\Controllers\backend\admin\blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BlogCategoryController extends Controller
{
    // All Blog Categories
    public function adminBlogCategoriesAll() 
    {
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blogCategories.categoryAll', compact('blogCategories'));
    }

    // Admin Blog category save
    public function adminBlogCategorySave(Request $request)
    {
        $BlogCategory = BlogCategory::insert([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Category inserted successfully.',
            'alert-type' => 'success',
        );
        if($BlogCategory){
            return redirect()->route('adminBlogCategoriesAll')->with($notification);
        }
    }

    // Edit Blog Category
    public function adminBlogCategoryEdit($id) {
        $blogCategory = BlogCategory::find($id);
        return view('admin.blogCategories.categoryEdit', compact('blogCategory'));
    }

    // Admin Blog category Update
    public function adminBlogCategoryUpdate(Request $request)
    {
        $BlogCategory = BlogCategory::find($request->id)->update([
            'category_name' => $request->category_name,
            'category_slug' => strtolower(str_replace(' ', '-', $request->category_name)),
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Blog Category Updated successfully.',
            'alert-type' => 'success',
        );
        if($BlogCategory){
            return redirect()->route('adminBlogCategoriesAll')->with($notification);
        }
    }

    // Admin Blog category Deleted
    public function adminBlogCategoryDelete($id)
    {
        $BlogCategory = BlogCategory::find($id)->delete();
        $notification = array(
            'message' => 'Blog Category Deleted successfully.',
            'alert-type' => 'success',
        );
        if($BlogCategory){
            return redirect()->back()->with($notification);
        }
    }

}
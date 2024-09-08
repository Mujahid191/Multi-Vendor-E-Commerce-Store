<?php

namespace App\Http\Controllers\backend\admin\blog;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Image;

use function Pest\Laravel\post;

class BlogPostController extends Controller
{
    // All Blog Posts
    public function adminBlogPostsAll() 
    {
        $blogPosts = BlogPost::latest()->get();
        return view('admin.blogPosts.postsAll', compact('blogPosts'));
    }

    // Load category for new Blog post
    public function adminBlogPostAdd()
    {
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blogPosts.postAdd', compact('blogCategories'));
    }

    // save New Post
    public function adminBlogPostSave(Request $request)
    {
        if( $request->file('post_image') == ''){
            $imageName = '';
        }else{
            $image = $request->file('post_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/blogs/' . $imageName);
            // Image Resize
            Image::make($image)->resize(1103, 906)->save($imagePath);
        }

        $post = BlogPost::insert([
            'title' => $request->title,
            'slug' => strtolower(str_replace(' ', '-' , $request->title)),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imageName,
            'BlogCategory_id' => $request->blog_category,
            'created_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'New Post Insert successfully.',
            'alert-type' => 'success',
        );
        if($post){
            return redirect()->route('adminBlogPostsAll')->with($notification);
        }
    }

    // Post Data load for Edit post
    public function adminBlogPostEdit($id)
    {
        $post = BlogPost::find($id);
        $blogCategories = BlogCategory::latest()->get();
        return view('admin.blogPosts.postEdit', compact('post', 'blogCategories'));
    }

    // Blog post data save
    public function adminBlogPostUpdate(Request $request)
    {
        if( $request->file('new_image') == ''){
            $imageName = $request->old_image;
        }else{
            $image = $request->file('new_image');
            $imageName = uniqid('', true) . '.' . $image->getClientOriginalExtension();
            $imagePath = public_path('images/blogs/' . $imageName);
            // Image Resize
            Image::make($image)->resize(1103, 906)->save($imagePath);
            
            if( !empty($request->old_image) ){
                $previousImage = public_path('images/blogs/' . $request->old_image);
                if(file_exists($previousImage)){
                    unlink($previousImage);
                }
            }
        }

        $post = BlogPost::find($request->id)->update([
            'title' => $request->title,
            'slug' => strtolower(str_replace(' ', '-' , $request->title)),
            'short_description' => $request->short_description,
            'long_description' => $request->long_description,
            'image' => $imageName,
            'BlogCategory_id' => $request->blog_category,
            'updated_at' => Carbon::now(),
        ]);
        $notification = array(
            'message' => 'Post Update successfully.',
            'alert-type' => 'success',
        );
        if($post){
            return redirect()->route('adminBlogPostsAll')->with($notification);
        }
    }

    // Post delete
    public function adminBlogPostDelete($id)
    {
        $post = BlogPost::find($id);
        if( !empty($post->image)) {
            $previousImage = public_path('images/blogs/' . $post->image);
            if(file_exists($previousImage)){
                unlink($previousImage);
            }
        }
        $notification = array(
            'message' => 'Post Delete successfully.',
            'alert-type' => 'success',
        );
        if($post->delete()) {
            return redirect()->back()->with($notification);
        }
    }
}

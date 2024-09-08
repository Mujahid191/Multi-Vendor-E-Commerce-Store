<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImage;
use App\Models\Product;
use App\Models\SubCategory;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontendProductController extends Controller
{

    // Home Page All Data
    public function homeData() {
        $categories = Category::has('products')->latest()->limit(3)->get();
        $products = Product::where('status', 1)->latest()->get();
        $vendors = User::has('products')->where('status', 'active')->where('role', 'vendor')->orderBy('id', 'DESC')->limit(4)->get();
        return view('frontend.home', compact('categories', 'products', 'vendors'));
    }
    // Product Details
    public function productDetails($id, $slug) {
        $product = Product::find($id);
        $sizes = explode(',', $product->product_size);
        $colors = explode(',', $product->product_color);
        $tags = explode(',', $product->tags);
        $multiImages = MultiImage::where('product_id', $id)->latest()->get();
        $relatedProduct = Product::where('category_id', $product->category_id)->where('id', '!=', $id)->where('status', 1)->latest()->limit(4)->get();
        return view('frontend.productDetail', compact('product', 'sizes', 'colors', 'tags', 'multiImages', 'relatedProduct'));
    }

    // vendor Detail Page
    public function vendorDetails($id) {
        $vendor = User::find($id);
        return view('frontend.vendorDetails', compact('vendor'));
    }

    // All Vendors
    public function vendors() {
        $vendors = User::has('products')->where('status', 'active')->where('role', 'vendor')->orderBy('id', 'DESC')->get();
        return view('frontend.vendorsAll', compact('vendors'));
    }

    // Category Wise products
    public function categoryProducts($id, $slug) {
        $category = Category::find($id);
        $CategoryProducts = $category->products()->where('status', 1)->paginate(15);
        $categories = Category::has('products')->where('id', '!=', $id)->latest()->get();
        $products = Product::where('status', 1)->where('category_id', '!=', $id)->latest()->get();
        return view('frontend.categoryProducts', compact('CategoryProducts', 'categories', 'products', 'category'));
    }

    // SubCategory Wise products
    public function subcategoryProducts($id, $slug) {
        $subcategory = SubCategory::find($id);
        $categories = Category::has('products')->where('id', '!=', $id)->latest()->get();
        $products = Product::where('status', 1)->where('category_id', '!=', $id)->latest()->get();
        return view('frontend.subcategoryProducts', compact('subcategory', 'categories', 'products'));
    }

    // Quick View Products
    public function quickViewProducts($id){
        $product = Product::with('Category', 'Brand', 'subcategory', 'User')->find($id);
        $sizes = explode(',', $product->product_size);
        $colors = explode(',', $product->product_color);
        $data = [];
        $data['product'] = $product;
        $data['sizes'] = $sizes;
        $data['colors'] = $colors;
        return response()->json($data);
    }

    // Blogs
    public function blogs()
    {
        $blogs = BlogPost::latest()->paginate(3);
        $blogCategories = BlogCategory::has('BlogPost')->latest()->get();
        $products = Product::whereNotNull('discount_price')->latest()->get();
        return view('frontend.blogs', compact('blogs', 'blogCategories', 'products'));
    }

    // Blog post load
    public function blogPostDetails($id) 
    {
        $blog = BlogPost::find($id);
        $blogCategories = BlogCategory::has('BlogPost')->latest()->get();
        $products = Product::whereNotNull('discount_price')->latest()->get();
        return view('frontend.blogPost', compact('blog',  'blogCategories', 'products'));
    }

    // Blog post by category
    public function blogPostByCategory($id)
    {
        $blogs = BlogPost::where('blog_category_id', $id)->latest()->get();
        $pageHeading = BlogCategory::find($id); 
        $blogCategories = BlogCategory::has('BlogPost')->latest()->get();
        $products = Product::whereNotNull('discount_price')->latest()->get();
        return view('frontend.blogs', compact('blogs', 'blogCategories', 'products', 'pageHeading'));
    }
    
    // Shop product filters
    public function shopAllProducts(Request $request)
    {
        $categoryIds = $request->input('category_ids');
        $minPrice = $request->input('min_price');
        $maxPrice = $request->input('max_price');

        // Initialize a query builder instance for the Product model
        $query = Product::query();

        // Apply category filter if categories are selected
        if ($categoryIds) {
            $query->whereHas('category', function ($q) use ($categoryIds) {
                $q->whereIn('id', $categoryIds);
            });
        }

        // Sorting logic
        $sort = $request->sort; // Default to 'featured' if not provided
        switch ($sort) {
            case 'low_to_high':
                $query->orderByRaw('CAST(selling_price AS DECIMAL) ASC');
                break;
            case 'high_to_low':
                $query->orderByRaw('CAST(selling_price AS DECIMAL) DESC');
                break;
            default:
                // Default case for 'featured' or any other value
                break;
        }

        // Apply price range filter
        if ($minPrice && $maxPrice) {
            $query->whereBetween('selling_price', [$minPrice, $maxPrice]);
        }

        // Get paginated products
        $products = $query->paginate(15);

        $categories = Category::has('products')->latest()->get();

        // Pass the selected category IDs and other data to the view
        return view('frontend.shopProducts', compact('products', 'categories', 'categoryIds', 'minPrice', 'maxPrice', 'sort'));
    }
    
    // Search product by Name
    public function searchProducts(Request $request)
    {
        $categoryID = $request->category;
        $searchTerm = $request->search;

        $query = Product::query();

        if ($categoryID) {
            $query->where('category_id', $categoryID);
        }

        if ($searchTerm) {
            $query->where('product_name', 'like', '%' . $searchTerm . '%');
        }

        $products = $query->paginate(15);
        $category = Category::find($categoryID);
        $categories = Category::has('products')->latest()->get();

        return view('frontend.searchProducts', compact('products', 'categories', 'category'));
    }
}
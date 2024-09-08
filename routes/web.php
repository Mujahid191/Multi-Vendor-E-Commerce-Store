<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\backend\admin\BannerController;
use App\Http\Controllers\backend\admin\blog\BlogCategoryController;
use App\Http\Controllers\backend\admin\blog\BlogPostController;
use App\Http\Controllers\backend\admin\BrandController;
use App\Http\Controllers\backend\admin\CategoryController;
use App\Http\Controllers\backend\admin\coupon\CouponController;
use App\Http\Controllers\backend\admin\HomeSliderController;
use App\Http\Controllers\backend\admin\OrderController;
use App\Http\Controllers\backend\admin\ProductController;
use App\Http\Controllers\backend\admin\ReportsController;
use App\Http\Controllers\backend\admin\RoleController;
use App\Http\Controllers\backend\admin\SettingController;
use App\Http\Controllers\backend\admin\ship\DistrictController;
use App\Http\Controllers\backend\admin\ship\DivisionController;
use App\Http\Controllers\backend\admin\ship\StateController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\admin\SubCategoryController;
use App\Http\Controllers\backend\vendor\VendorOrderController;
use App\Http\Controllers\backend\vendor\VendorProductController;
use App\Http\Controllers\Frontend\cartController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\FrontendProductController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\UserOrderReturnController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\userController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;


// Frontend User Routes
Route::middleware('auth', 'role:user')->group( function() {
    Route::controller(userController::class)->group( function() {
        Route::get('/dashboard', 'userDashboard')->name('userDashboard');
        Route::put('/user/update', 'userUpdate')->name('userUpdate');
        Route::get('/user/order/details/{orderId}', 'userOrderDetails')->name('userOrderDetails');
        Route::get('/user/invoice/download/{invoiceId}', 'userInvoiceDownload')->name('userInvoiceDownload');
        Route::post('/user/order/track', 'userOrderTrack')->name('userOrderTrack');
    });
    // wishlist Routes
    Route::controller(WishlistController::class)->group( function () {
        Route::get('/wishlist/products', 'wishlistProducts')->name('wishlistProducts');
        Route::get('/wishlist/all/products', 'wishlistAllProducts')->name('wishlistAllProducts');
        Route::get('/product/add/wishlist/{id}', 'productAddWishlist')->name('productAddWishlist');
        Route::get('/product/remove/wishlist/{id}', 'productRemoveWishlist')->name('productRemoveWishlist');
    });
    // Compare Routes
    Route::controller(CompareController::class)->group( function () {
        Route::get('/compare/products', 'compareProducts')->name('compareProducts');
        Route::get('/product/add/compare/{id}', 'productAddCompare')->name('productAddCompare');
        Route::get('/compare/all/products', 'compareAllProducts')->name('compareAllProducts');
        Route::get('/product/remove/compare/{id}', 'productRemoveCompare')->name('productRemoveCompare');
    });
    // Cart Routes
    Route::controller(cartController::class)->group( function () {
        Route::get('/cart/products', 'cartProducts')->name('cartProducts');
        Route::post('/product/add/cart', 'productAddCart')->name('productAddCart');
        Route::get('/mini/cart/data', 'miniCartData')->name('miniCartData');
        Route::get('/product/remove/cart/{id}', 'productRemoveCart')->name('productRemoveCart');
        Route::get('/product/quantity/{rowId}/{qty}', 'productQuantity')->name('productQuantity');
        Route::get('/coupon/apply/{coupon}', 'couponApply')->name('couponApply');
        Route::get('/checkout', 'checkout')->name('checkout');
        Route::get('/load/district/{division}', 'districtLoad')->name('districtLoad');
        Route::get('/load/state/{district}', 'stateLoad')->name('stateLoad');
        Route::post('/checkout/details', 'checkoutDetails')->name('checkoutDetails');
        Route::post('/order/details/save', 'orderDetailSave')->name('orderDetailSave');
    });

    // User Order Return Routes
    Route::controller(UserOrderReturnController::class)->group( function () {
        Route::post('/user/order/return/reason/{orderID}', 'userOrderReturnReason')->name('userOrderReturnReason');
    });
    // Reviews Routes
    Route::controller(ReviewController::class)->group( function () {
        Route::post('/user/review/save', 'userReviewSave')->name('userReviewSave');
    });
});

require __DIR__.'/auth.php';
// frontend Routes Everyone Access and not middleware
Route::controller(FrontendProductController::class)->group( function() {
    Route::get('/', 'homeData')->name('home');
    Route::get('/shop/all/products', 'shopAllProducts')->name('shopAllProducts');
    // Route::post('/shop/product/filter', 'shopProductFilter')->name('shopProductFilter');
    Route::get('/vendors', 'vendors')->name('vendors');
    Route::get('/vendor/details/{id}', 'vendorDetails')->name('vendorDetails');
    Route::get('/product/details/{id}/{slug}', 'productDetails')->name('productDetails');
    Route::get('/category/products/{id}/{slug}', 'categoryProducts')->name('categoryProducts');
    Route::get('/subcategory/products/{id}/{slug}', 'subcategoryProducts')->name('subcategoryProducts');
    Route::get('/quick/view/products/{id}', 'quickViewProducts')->name('quickViewProducts');
    Route::get('/blogs','blogs')->name('blogs');
    Route::get('/blog/post/{id}/{slug}','blogPostDetails')->name('blogPostDetails');
    Route::get('/blog/post/by/category/{id}/{slug}','blogPostByCategory')->name('blogPostByCategory');
    Route::get('/search/products', 'searchProducts')->name('searchProducts');
});

// Guest Route
Route::middleware('guest')->group( function () {
    Route::view('/admin', 'admin.login')->name('adminLogin');
    Route::view('/vendor', 'vendor.login')->name('vendorLogin');
});
Route::middleware('auth')->group(function () {
    // User Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::view('/become/vendor', 'frontend.becomeVendor')->name('becomeVendor');
Route::post('/vendor/register', [VendorController::class, 'vendorRegister'])->name('vendorRegister');



// Admin Routes
Route::middleware('auth', 'role:admin')->group( function() {
    Route::controller(AdminController::class)->group( function() {
        Route::get('/admin/dashboard', 'adminDashboard')->name('adminDashboard');
        Route::get('/admin/profile', 'adminProfile')->name('adminProfile');
        Route::put('/admin/profile/update', 'profileUpdate')->name('profileUpdate');
        Route::get('/admin/password/change', 'passwordChange')->name('passwordChange');
        Route::get('/admin/logout', 'adminLogout')->name('adminLogout');
        // All Admin Routes
        Route::get('/admin/active/admins', 'adminAllAdmins')->name('adminAllAdmins');
        Route::get('/admin/new/admin/add', 'adminNewAdminAdd')->name('adminNewAdminAdd');
        Route::post('/admin/new/admin/save', 'adminNewAdminSave')->name('adminNewAdminSave');
        Route::get('/admin/new/admin/edit/{id}', 'adminNewAdminEdit')->name('adminNewAdminEdit');
        Route::put('/admin/new/admin/update', 'adminNewAdminUpdate')->name('adminNewAdminUpdate');
        Route::get('/admin/new/admin/delete/{id}', 'adminNewAdminDelete')->name('adminNewAdminDelete');
        
        // Vendors Manager Routes
        Route::get('/active/vendors', 'activeVendors')->name('activeVendors');
        Route::get('/inactive/vendors', 'inactiveVendors')->name('inactiveVendors');
        Route::get('/admin/vendor/details/{id}', 'adminVendorDetails')->name('adminVendorDetails');
        Route::put('/vendor/status/update', 'vendorStatus')->name('vendorStatus');
        // All Customers Route
        Route::get('/admin/vendors', 'adminAllVendors')->name('adminAllVendors');
        Route::get('/admin/customers', 'adminAllCustomers')->name('adminAllCustomers');
        Route::get('/admin/customer/details/{id}', 'adminCustomerDetails')->name('adminCustomerDetails');
    });

    // Brands Routes
    Route::view('/admin/brand/add', 'admin.brands.brandAdd')->name('adminBrandAdd');
    Route::controller(BrandController::class)->group( function() {
        Route::get('/admin/brands', 'adminBrandsAll')->name('adminBrandsAll');
        Route::post('/admin/brand/save', 'adminBrandSave')->name('adminBrandSave');
        Route::get('/admin/brand/edit/{id}', 'adminBrandEdit')->name('adminBrandEdit');
        Route::put('/admin/brand/update', 'adminBrandUpdate')->name('adminBrandUpdate');
        Route::get('/admin/brand/delete/{id}', 'adminBrandDelete')->name('adminBrandDelete');
    });

    // Categories Routes
    Route::view('/admin/category/add', 'admin.Categories.CategoryAdd')->name('adminCategoryAdd');
    Route::controller(CategoryController::class)->group( function() {
        Route::get('/admin/categories', 'adminCategoriesAll')->name('adminCategoriesAll');
        Route::post('/admin/category/save', 'adminCategorySave')->name('adminCategorySave');
        Route::get('/admin/category/edit/{id}', 'adminCategoryEdit')->name('adminCategoryEdit');
        Route::put('/admin/category/update', 'adminCategoryUpdate')->name('adminCategoryUpdate');
        Route::get('/admin/category/delete/{id}', 'adminCategoryDelete')->name('adminCategoryDelete');
    });

    // Sub Categories Routes
    Route::controller(SubCategoryController::class)->group( function() {
        Route::get('/admin/subcategories', 'adminSubCategoriesAll')->name('adminSubCategoriesAll');
        Route::get('/admin/subcategory/add', 'adminSubCategoryAdd')->name('adminSubCategoryAdd');
        Route::post('/admin/subcategory/save', 'adminSubCategorySave')->name('adminSubCategorySave');
        Route::get('/admin/subcategory/edit/{id}', 'adminSubCategoryEdit')->name('adminSubCategoryEdit');
        Route::put('/admin/subcategory/update', 'adminSubCategoryUpdate')->name('adminSubCategoryUpdate');
        Route::get('/admin/subcategory/delete/{id}', 'adminSubCategoryDelete')->name('adminSubCategoryDelete');
    });

    // Admin Products Routes
    Route::controller(ProductController::class)->group( function() {
        Route::get('/admin/products', 'adminProductsAll')->name('adminProductsAll');
        Route::get('/admin/product/add', 'adminProductAdd')->name('adminProductAdd');
        Route::get('/admin/product/getSubcategory/{id}', 'adminProductSubcategory')->name('adminProductSubcategory');
        Route::post('/admin/product/save', 'adminProductSave')->name('adminProductSave');
        Route::get('/admin/product/edit/{id}', 'adminProductEdit')->name('adminProductEdit');
        Route::put('/admin/product/update', 'adminProductUpdate')->name('adminProductUpdate');
        Route::put('/admin/product/update/multiImage', 'adminProductUpdateMultiImage')->name('adminProductUpdateMultiImage');
        Route::get('/admin/product/delete/multiImage/{id}', 'adminProductDeleteMultiImage')->name('adminProductDeleteMultiImage');
        Route::get('/admin/product/status/update/{id}', 'adminProductStatusUpdate')->name('adminProductStatusUpdate');
        Route::get('/admin/product/delete/{id}', 'adminProductDelete')->name('adminProductDelete');
    });

    // Home Slider Routes
    Route::view('/admin/slide/add', 'admin.homeSlider.slideAdd')->name('adminSlideAdd');
    Route::controller(HomeSliderController::class)->group( function() {
        Route::get('/admin/slides', 'adminSlidesAll')->name('adminSlidesAll');
        Route::post('/admin/slide/save', 'adminSlideSave')->name('adminSlideSave');
        Route::get('/admin/slide/edit/{id}', 'adminSlideEdit')->name('adminSlideEdit');
        Route::put('/admin/slide/update', 'adminSlideUpdate')->name('adminSlideUpdate');
        Route::get('/admin/slide/delete/{id}', 'adminSlideDelete')->name('adminSlideDelete');
    });

    // Home Banner Routes
    Route::view('/admin/banner/add', 'admin.homeBanner.bannerAdd')->name('adminBannerAdd');
    Route::controller(BannerController::class)->group( function() {
        Route::get('/admin/banners', 'adminBannersAll')->name('adminBannersAll');
        Route::post('/admin/banner/save', 'adminBannerSave')->name('adminBannerSave');
        Route::get('/admin/banner/edit/{id}', 'adminBannerEdit')->name('adminBannerEdit');
        Route::put('/admin/banner/update', 'adminBannerUpdate')->name('adminBannerUpdate');
        Route::get('/admin/slide/delete/{id}', 'adminSlideDelete')->name('adminSlideDelete');
    });

    // Divisions Routes
    Route::view('/admin/division/add', 'admin.ship.divisions.divisionAdd')->name('divisionAdd');
    Route::controller(DivisionController::class)->group( function() {
        Route::get('/admin/divisions', 'adminDivisionsAll')->name('adminDivisionsAll');
        Route::post('/admin/division/save', 'adminDivisionSave')->name('adminDivisionSave');
        Route::get('/admin/division/edit/{id}', 'adminDivisionEdit')->name('adminDivisionEdit');
        Route::put('/admin/division/update', 'adminDivisionUpdate')->name('adminDivisionUpdate');
        Route::get('/admin/division/delete/{id}', 'adminDivisionDelete')->name('adminDivisionDelete');
    });

    // Districts Routes
    Route::controller(DistrictController::class)->group( function() {
        Route::get('/admin/districts', 'adminDistrictsAll')->name('adminDistrictsAll');
        Route::get('/admin/district/add', 'districtAdd')->name('districtAdd');
        Route::post('/admin/district/save', 'adminDistrictSave')->name('adminDistrictSave');
        Route::get('/admin/district/edit/{id}', 'adminDistrictEdit')->name('adminDistrictEdit');
        Route::put('/admin/district/update', 'adminDistrictUpdate')->name('adminDistrictUpdate');
        Route::get('/admin/district/delete/{id}', 'adminDistrictDelete')->name('adminDistrictDelete');
    });

    // States Routes
    Route::controller(StateController::class)->group( function() {
        Route::get('/admin/states', 'adminStatesAll')->name('adminStatesAll');
        Route::get('/admin/state/add', 'stateAdd')->name('stateAdd');
        Route::get('/admin/state/getDistrict/{id}', 'getDistrict')->name('getDistrict');
        Route::post('/admin/state/save', 'adminStateSave')->name('adminStateSave');
        Route::get('/admin/state/edit/{id}', 'adminStateEdit')->name('adminStateEdit');
        Route::put('/admin/state/update', 'adminStateUpdate')->name('adminStateUpdate');
        Route::get('/admin/state/delete/{id}', 'adminStateDelete')->name('adminStateDelete');
    });

    // Coupon Routes
    Route::view('/admin/coupon/add', 'admin.coupons.couponAdd')->name('adminCouponAdd');
    Route::controller(CouponController::class)->group( function() {
        Route::get('/admin/coupons', 'adminCouponsAll')->name('adminCouponsAll');
        Route::post('/admin/coupon/save', 'adminCouponSave')->name('adminCouponSave');
        Route::get('/admin/coupon/edit/{id}', 'adminCouponEdit')->name('adminCouponEdit');
        Route::put('/admin/coupon/update', 'adminCouponUpdate')->name('adminCouponUpdate');
        Route::get('/admin/coupon/delete/{id}', 'adminCouponDelete')->name('adminCouponDelete');
    });

    // Orders Manager
    Route::controller(OrderController::class)->group( function() {
        Route::get('/admin/orders/pending', 'adminOrdersPending')->name('adminOrdersPending');
        Route::get('/admin/orders/confirm,', 'adminOrdersConfirm')->name('adminOrdersConfirm');
        Route::get('/admin/orders/processing,', 'adminOrdersProcessing')->name('adminOrdersProcessing');
        Route::get('/admin/orders/delivered,', 'adminOrdersDelivered')->name('adminOrdersDelivered');
        Route::get('/admin/order/Details/{orderId}', 'adminOrderDetails')->name('adminOrderDetails');
        Route::get('/admin/order/status/update/{orderID}/{status}', 'adminOrderStatus')->name('adminOrderStatus');
        // Return Orders Routes
        Route::get('/admin/orders/return', 'adminOrdersReturn')->name('adminOrdersReturn');
        Route::get('/admin/orders/return/{orderID}/{status}', 'adminOrderReturnApproval')->name('adminOrderReturnApproval');
    });
    // Orders Reports Manager
    Route::controller(ReportsController::class)->group( function() {
        Route::get('/admin/reports', 'adminReports')->name('adminReports');
        Route::get('/admin/report/order/details/{orderID}', 'adminReportOrderDetails')->name('adminReportOrderDetails');
        Route::post('/admin/reports/by/date', 'adminReportByDate')->name('adminReportByDate');
    });

    // Blog Categories Routes
    Route::view('/admin/blog/category/add', 'admin.blogCategories.CategoryAdd')->name('adminBlogCategoryAdd');
    Route::controller(BlogCategoryController::class)->group( function() {
        Route::get('/admin/blog/categories', 'adminBlogCategoriesAll')->name('adminBlogCategoriesAll');
        Route::post('/admin/blog/category/save', 'adminBlogCategorySave')->name('adminBlogCategorySave');
        Route::get('/admin/blog/category/edit/{id}', 'adminBlogCategoryEdit')->name('adminBlogCategoryEdit');
        Route::put('/admin/blog/category/update', 'adminBlogCategoryUpdate')->name('adminBlogCategoryUpdate');
        Route::get('/admin/blog/category/delete/{id}', 'adminBlogCategoryDelete')->name('adminBlogCategoryDelete');
    });

    // Admin Blog Post Routes
    Route::controller(BlogPostController::class)->group( function() {
        Route::get('/admin/blog/posts', 'adminBlogPostsAll')->name('adminBlogPostsAll');
        Route::get('/admin/blog/post/add', 'adminBlogPostAdd')->name('adminBlogPostAdd');
        Route::post('/admin/blog/post/save', 'adminBlogPostSave')->name('adminBlogPostSave');
        Route::get('/admin/blog/post/edit/{id}', 'adminBlogPostEdit')->name('adminBlogPostEdit');
        Route::put('/admin/blog/post/update', 'adminBlogPostUpdate')->name('adminBlogPostUpdate');
        Route::get('/admin/blog/post/delete/{id}', 'adminBlogPostDelete')->name('adminBlogPostDelete');
    });

    // Admin Reviews Routes
    Route::controller(ReviewController::class)->group( function () {
        Route::get('/admin/reviews/pending', 'adminReviewsPending')->name('adminReviewsPending');
        Route::get('/admin/reviews/published', 'adminReviewsPublished')->name('adminReviewsPublished');
        Route::get('/admin/reviews/approved/{id}', 'adminReviewApproved')->name('adminReviewApproved');
        Route::get('/admin/reviews/deleted/{id}', 'adminReviewDeleted')->name('adminReviewDeleted');
    });

    // Admin Website Setting Routes
    Route::controller(SettingController::class)->group( function () {
        Route::get('/admin/website/setting', 'adminWebsiteSettings')->name('adminWebsiteSettings');
        Route::put('/admin/website/setting/update', 'adminWebsiteSettingsUpdate')->name('adminWebsiteSettingsUpdate');
        // admin Website SEO Routes
        Route::get('/admin/website/seo', 'adminWebsiteSeo')->name('adminWebsiteSeo');
        Route::put('/admin/website/seo/update', 'adminWebsiteSeoUpdate')->name('adminWebsiteSeoUpdate');
    });

    // Admin Role and Permissions Routes
    Route::view('/admin/role/add', 'admin.rolePermissions.roles.roleAdd')->name('adminRoleAdd');
    Route::view('/admin/permission/add', 'admin.rolePermissions.permissions.permissionAdd')->name('adminPermissionAdd');
    Route::controller(RoleController::class)->group( function () {
        // Admin Role Routes
        Route::get('/admin/roles', 'adminRoles')->name('adminRoles');
        Route::post('/admin/role/save', 'adminRoleSave')->name('adminRoleSave');
        Route::get('/admin/role/edit/{id}', 'adminRoleEdit')->name('adminRoleEdit');
        Route::put('/admin/role/update', 'adminRoleUpdate')->name('adminRoleUpdate');
        Route::get('/admin/role/delete/{id}', 'adminRoleDelete')->name('adminRoleDelete');
        // Admin Permissions Routes
        Route::get('/admin/permissions', 'adminPermissions')->name('adminPermissions');
        Route::post('/admin/permission/save', 'adminPermissionSave')->name('adminPermissionSave');
        Route::get('/admin/permission/edit/{id}', 'adminPermissionEdit')->name('adminPermissionEdit');
        Route::put('/admin/permission/update', 'adminPermissionUpdate')->name('adminPermissionUpdate');
        Route::get('/admin/permission/delete/{id}', 'adminPermissionDelete')->name('adminPermissionDelete');
        // Admin Roles and Permissions Routes
        Route::get('/admin/roles/permissions', 'adminRolesPermissions')->name('adminRolesPermissions');
        Route::get('/admin/role/permission/add', 'adminRolePermissionAdd')->name('adminRolePermissionAdd');
        Route::post('/admin/role/permission/assign', 'adminRolePermissionAssign')->name('adminRolePermissionAssign');
        Route::get('/admin/role/permission/edit/{id}', 'adminRolePermissionEdit')->name('adminRolePermissionEdit');
        Route::post('/admin/role/permission/update', 'adminRolePermissionUpdate')->name('adminRolePermissionUpdate');
        Route::get('/admin/role/permission/delete/{roleId}', 'adminRolePermissionDelete')->name('adminRolePermissionDelete');
    });
});

// Vendor Routes
Route::middleware('auth', 'role:vendor')->group( function() {
    Route::controller(VendorController::class)->group( function () {
        Route::get('/vendor/dashboard', 'vendorDashboard')->name('vendorDashboard');
        Route::get('/vendor/profile', 'vendorProfile')->name('vendorProfile');
        Route::put('/vendor/profile/update', 'vendorProfileUpdate')->name('vendorProfileUpdate');
        Route::get('/vendor/password/change', 'vendorPasswordChange')->name('vendorPasswordChange');
        Route::get('/vendor/logout', 'vendorLogout')->name('vendorLogout');
    });

    // Vendor Products Routes
    Route::controller(VendorProductController::class)->group( function() {
        Route::get('/vendor/products', 'vendorProductsAll')->name('vendorProductsAll');
        Route::get('/vendor/product/add', 'vendorProductAdd')->name('vendorProductAdd');
        Route::get('/vendor/product/getSubcategory/{id}', 'vendorProductSubcategory')->name('vendorProductSubcategory');
        Route::post('/vendor/product/save', 'vendorProductSave')->name('vendorProductSave');
        Route::get('/vendor/product/edit/{id}', 'vendorProductEdit')->name('vendorProductEdit');
        Route::put('/vendor/product/update', 'vendorProductUpdate')->name('vendorProductUpdate');
        Route::put('/vendor/product/update/multiImage', 'vendorProductUpdateMultiImage')->name('vendorProductUpdateMultiImage');
        Route::get('/vendor/product/delete/multiImage/{id}', 'vendorProductDeleteMultiImage')->name('vendorProductDeleteMultiImage');
        Route::get('/vendor/product/status/update/{id}', 'vendorProductStatusUpdate')->name('vendorProductStatusUpdate');
        Route::get('/vendor/product/delete/{id}', 'vendorProductDelete')->name('vendorProductDelete');
    });

    // Vendor Orders Routes
    Route::controller(VendorOrderController::class)->group( function() {
        Route::get('/vendor/orders/all', 'vendorOrdersAll')->name('vendorOrdersAll');
        Route::get('/vendor/orders/return', 'vendorOrdersReturn')->name('vendorOrdersReturn');
        Route::get('/vendor/order/details/{orderID}', 'vendorOrdersDetails')->name('vendorOrdersDetails');
    });
});

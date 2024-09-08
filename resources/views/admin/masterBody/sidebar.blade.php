<div class="sidebar-wrapper" data-simplebar="true">
    <div class="sidebar-header">
        <div>
            <img src="{{ asset('backend/assets/images/logo-icon.png') }}" class="logo-icon" alt="logo icon">
        </div>
        <div>
            <h4 class="logo-text">Admin</h4>
        </div>
        <div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
        </div>
    </div>
    <!--navigation-->
    <ul class="metismenu" id="menu">
        <li>
            <a href="{{ route('adminDashboard') }}">
                <div class="parent-icon"><i class='bx bx-home-circle'></i>
                </div>
                <div class="menu-title">Dashboard</div>
            </a>
        </li>

        <li class="menu-label">Products</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='lni lni-producthunt'></i>
                </div>
                <div class="menu-title">Products Manager</div>
            </a>
            <ul>
                @if (Auth::user()->can('brand.menu'))
                    <li> <a href="{{ route('adminBrandsAll') }}"><i class="bx bx-right-arrow-alt"></i>Brands</a></li>
                @endif
                @if (Auth::user()->can('category.menu'))
                    <li> <a href="{{ route('adminCategoriesAll') }}"><i class="bx bx-right-arrow-alt"></i>Main Categories</a></li>
                @endif
                <li> <a href="{{ route('adminSubCategoriesAll') }}"><i class="bx bx-right-arrow-alt"></i>Sub Categories</a></li>
                <li> <a href="{{ route('adminProductsAll') }}"><i class="bx bx-right-arrow-alt"></i>All Products</a></li>
            </ul>
        </li>

        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-store"></i>
                </div>
                <div class="menu-title">Stock Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminProductsAll') }}"><i class="bx bx-right-arrow-alt"></i>Total Stock</a></li>
            </ul>
        </li> --}}

        <li class="menu-label">Vendors</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Vendors Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('activeVendors') }}"><i class="bx bx-right-arrow-alt"></i>Active Vendors</a></li>
                <li> <a href="{{ route('inactiveVendors') }}"><i class="bx bx-right-arrow-alt"></i>Inactive Vendors</a></li>
            </ul>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="lni lni-cart-full"></i>
                </div>
                <div class="menu-title">Users Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminAllAdmins') }}"><i class="bx bx-right-arrow-alt"></i>Admins</a></li>
                <li> <a href="{{ route('adminAllVendors') }}"><i class="bx bx-right-arrow-alt"></i>Vendors</a></li>
                <li> <a href="{{ route('adminAllCustomers') }}"><i class="bx bx-right-arrow-alt"></i>Customers</a></li>
            </ul>
        </li>

        <li class="menu-label">Features</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="lni lni-delivery"></i>
                </div>
                <div class="menu-title">Shipping Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminDivisionsAll') }}"><i class="bx bx-right-arrow-alt"></i>Divisions</a></li>
                <li> <a href="{{ route('adminDistrictsAll') }}"><i class="bx bx-right-arrow-alt"></i>Districts</a></li>
                <li> <a href="{{ route('adminStatesAll') }}"><i class="bx bx-right-arrow-alt"></i>States</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-heart-square"></i>
                </div>
                <div class="menu-title">Coupon Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminCouponsAll') }}"><i class="bx bx-right-arrow-alt"></i>Coupons</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="bx bx-message-rounded-dots"></i>
                </div>
                <div class="menu-title">Reviews Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminReviewsPending') }}"><i class="bx bx-right-arrow-alt"></i>Pending</a></li>
                <li> <a href="{{ route('adminReviewsPublished') }}"><i class="bx bx-right-arrow-alt"></i>Published</a></li>
            </ul>
        </li>

        <li class="menu-label">E-Commrance</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="lni lni-cart-full"></i>
                </div>
                <div class="menu-title">Orders Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminOrdersPending') }}"><i class="bx bx-right-arrow-alt"></i>Pending Orders</a></li>
                <li> <a href="{{ route('adminOrdersConfirm') }}"><i class="bx bx-right-arrow-alt"></i>Confirm Orders</a></li>
                <li> <a href="{{ route('adminOrdersProcessing') }}"><i class="bx bx-right-arrow-alt"></i>Processing Orders</a></li>
                <li> <a href="{{ route('adminOrdersDelivered') }}"><i class="bx bx-right-arrow-alt"></i>Delivered Orders</a></li>
                <li> <a href="{{ route('adminOrdersReturn') }}" class="text-danger"><i class="bx bx-right-arrow-alt"></i>Returned Orders</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"> <i class="lni lni-cart-full"></i>
                </div>
                <div class="menu-title">Reports Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminReports') }}"><i class="bx bx-right-arrow-alt"></i>Orders Reports</a></li>
            </ul>
        </li>

        <li class="menu-label">Blogs</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class='bx bx-user-circle'></i>
                </div>
                <div class="menu-title">Blogs Manager</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminBlogCategoriesAll') }}"><i class="bx bx-right-arrow-alt"></i>Blog Categories</a></li>
                <li> <a href="{{ route('adminBlogPostsAll') }}"><i class="bx bx-right-arrow-alt"></i>Blog Posts</a></li>
            </ul>
        </li>

        <li class="menu-label">Settings</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-slideshow"></i>
                </div>
                <div class="menu-title">Home Page Setup</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminSlidesAll') }}"><i class="bx bx-right-arrow-alt"></i>All Slides</a></li>
                <li> <a href="{{ route('adminBannersAll') }}"><i class="bx bx-right-arrow-alt"></i>All Banners</a></li>
            </ul>
        </li>

        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title">Site Setting</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminWebsiteSettings') }}"><i class="bx bx-right-arrow-alt"></i>Website Details</a></li>
                <li> <a href="{{ route('adminWebsiteSeo') }}"><i class="bx bx-right-arrow-alt"></i>Website SEO</a></li>
            </ul>
        </li>

        <li class="menu-label">Roles & Permissions</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Roles & Permissions</div>
            </a>
            <ul>
                <li> <a href="{{ route('adminRoles') }}"><i class="bx bx-right-arrow-alt"></i>All Roles</a></li>
                <li> <a href="{{ route('adminPermissions') }}"><i class="bx bx-right-arrow-alt"></i>All Permissions</a></li>
                <li> <a href="{{ route('adminRolesPermissions') }}"><i class="bx bx-right-arrow-alt"></i>All Roles & Permissions</a></li>
            </ul>
        </li>

        {{-- <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-cog"></i>
                </div>
                <div class="menu-title"></div>
            </a>
            <ul>
                <li> <a href="{{ route('adminWebsiteSettings') }}"><i class="bx bx-right-arrow-alt"></i>Website Details</a></li>
                <li> <a href="{{ route('adminWebsiteSeo') }}"><i class="bx bx-right-arrow-alt"></i>Website SEO</a></li>
            </ul>
        </li> --}}


        <li class="menu-label">Pages</li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-lock"></i>
                </div>
                <div class="menu-title">Authentication</div>
            </a>
            <ul>
                <li> <a href="authentication-signin.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In</a>
                </li>
                <li> <a href="authentication-signup.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up</a>
                </li>
                <li> <a href="authentication-signin-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign In with Header & Footer</a>
                </li>
                <li> <a href="authentication-signup-with-header-footer.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Sign Up with Header & Footer</a>
                </li>
                <li> <a href="authentication-forgot-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Forgot Password</a>
                </li>
                <li> <a href="authentication-reset-password.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Reset Password</a>
                </li>
                <li> <a href="authentication-lock-screen.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Lock Screen</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="user-profile.html">
                <div class="parent-icon"><i class="bx bx-user-circle"></i>
                </div>
                <div class="menu-title">User Profile</div>
            </a>
        </li>
        <li>
            <a href="timeline.html">
                <div class="parent-icon"> <i class="bx bx-video-recording"></i>
                </div>
                <div class="menu-title">Timeline</div>
            </a>
        </li>
        <li>
            <a class="has-arrow" href="javascript:;">
                <div class="parent-icon"><i class="bx bx-error"></i>
                </div>
                <div class="menu-title">Errors</div>
            </a>
            <ul>
                <li> <a href="errors-404-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>404 Error</a>
                </li>
                <li> <a href="errors-500-error.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>500 Error</a>
                </li>
                <li> <a href="errors-coming-soon.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Coming Soon</a>
                </li>
                <li> <a href="error-blank-page.html" target="_blank"><i class="bx bx-right-arrow-alt"></i>Blank Page</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="faq.html">
                <div class="parent-icon"><i class="bx bx-help-circle"></i>
                </div>
                <div class="menu-title">FAQ</div>
            </a>
        </li>
        <li>
            <a href="pricing-table.html">
                <div class="parent-icon"><i class="bx bx-diamond"></i>
                </div>
                <div class="menu-title">Pricing</div>
            </a>
        </li>
        <li class="menu-label">Others</li>
        <li>
            <a href="https://themeforest.net/user/codervent" target="_blank">
                <div class="parent-icon"><i class="bx bx-support"></i>
                </div>
                <div class="menu-title">Support</div>
            </a>
        </li>
    </ul>
    <!--end navigation-->
</div>
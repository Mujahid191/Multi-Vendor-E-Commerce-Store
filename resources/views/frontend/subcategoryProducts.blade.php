@extends('frontend.master')
@section('title')
    {{ 'Easy Mart ' . $subcategory->subCategory_name  }}
@endsection
@section('content')
<div class="page-header mt-30 mb-50">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h4 class="mb-15">{{ $subcategory->subCategory_name }}</h4>
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> {{ $subcategory->category->category_name }}<span></span> {{ $subcategory->subCategory_name }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container mb-30">
    <div class="row flex-row-reverse">
        <div class="col-lg-4-5">
            <div class="shop-product-fillter">
                <div class="totall-product">
                    <p>We found <strong class="text-brand">{{ count($subcategory->products) }}</strong> items for you!</p>
                </div>
                <div class="sort-by-product-area">
                    <div class="sort-by-cover mr-10">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps"></i>Show:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">50</a></li>
                                <li><a href="#">100</a></li>
                                <li><a href="#">150</a></li>
                                <li><a href="#">200</a></li>
                                <li><a href="#">All</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="sort-by-cover">
                        <div class="sort-by-product-wrap">
                            <div class="sort-by">
                                <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                            </div>
                            <div class="sort-by-dropdown-wrap">
                                <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                            </div>
                        </div>
                        <div class="sort-by-dropdown">
                            <ul>
                                <li><a class="active" href="#">Featured</a></li>
                                <li><a href="#">Price: Low to High</a></li>
                                <li><a href="#">Price: High to Low</a></li>
                                <li><a href="#">Release Date</a></li>
                                <li><a href="#">Avg. Rating</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row product-grid">
                @foreach ($subcategory->products->where('status', 1) as $product)
                <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                    <div class="product-cart-wrap mb-30 wow animate__animated animate__fadeIn" data-wow-delay=".1s">
                        <div class="product-img-action-wrap">
                            <div class="product-img product-img-zoom">
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                                    <img class="default-img" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                                </a>
                            </div>
                            <div class="product-action-1">
                               <a aria-label="Add To Wishlist" class="action-btn wishlist-product" data-product-id="{{ $product->id }}"><i class="fi-rs-heart"></i></a>
                                <a aria-label="Compare" class="action-btn compare-product" data-product-id="{{ $product->id }}"><i class="fi-rs-shuffle"></i></a>
                                <a aria-label="Quick view" class="action-btn product-item" data-product-id="{{ $product->id }}" data-bs-toggle="modal" data-bs-target="#quickViewModal"><i class="fi-rs-eye"></i></a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if ( $product->discount_price == Null)
                                    <span class="new">New</span>
                                @else
                                    @php
                                        $discount = ($product->discount_price / $product->selling_price  * 100)  ;
                                    @endphp
                                    <span class="hot">Save {{ round($discount) }}%</span>
                                @endif
                            </div>
                        </div>
                        <div class="product-content-wrap">
                            <div class="product-category">
                                <a href="#">{{ $product->subcategory->subCategory_name }}</a>
                            </div>
                            <h2>
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                            </h2>
                            <div class="product-rate-cover">
                                <div class="product-rate d-inline-block">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                                <span class="font-small ml-5 text-muted"> (4.0)</span>
                            </div>
                            <div>
                                @if ( empty($product->user->name))
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">Owner</a></span>
                                @else
                                    <span class="font-small text-muted">By <a href="vendor-details-1.html">{{ $product->user->name }}</a></span>
                                @endif
                            </div>
                            <div class="product-card-bottom">
                                <div class="product-price">
                                    @if ( empty($product->discount_price ))
                                        <span>${{ $product->selling_price }}</span>
                                    @else
                                    @php
                                        $final_Price = $product->selling_price - $product->discount_price;
                                    @endphp
                                        <span>${{ $final_Price }}</span>
                                        <span class="old-price">${{ $product->selling_price }}</span>
                                    @endif
                                </div>
                                <div class="add-cart">
                                    <a class="add"  href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">Details </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end product card-->
                @endforeach
            </div>
            <!--product grid-->
            <div class="pagination-area mt-20 mb-20">
                <nav aria-label="Page navigation example">
                    <ul class="pagination justify-content-start">
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-left"></i></a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link dot" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">6</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#"><i class="fi-rs-arrow-small-right"></i></a>
                        </li>
                    </ul>
                </nav>
            </div>
            
            <!--End Deals-->

            
        </div>
        <div class="col-lg-1-5 primary-sidebar sticky-sidebar">
            <div class="sidebar-widget widget-category-2 mb-30">
                <h5 class="section-title style-1 mb-30">Categories</h5>
                <ul>
                    @foreach ($categories as $subcategory)
                    <li>
                        <a href="{{ route('categoryProducts', ['id' => $subcategory->id, 'slug' => $subcategory->category_slug ] )}}">
                            <img src="{{ asset('images/categories/' . $subcategory->category_image )}}" alt="" />
                            {{ $subcategory->category_name}}
                        </a>
                        <span class="count">{{ count($subcategory->products) }}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <!-- Product sidebar Widget -->
            <div class="sidebar-widget product-sidebar mb-30 p-30 bg-grey border-radius-10">
                <h5 class="section-title style-1 mb-30">New products</h5>

                @foreach ($products->take(3) as $product)
                <div class="single-post clearfix">
                    <div class="image">
                        <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                            <img class="default-img" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                        </a>
                    </div>
                    <div class="content pt-10">
                        <h6><a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h6>
                        <p class="price mb-0 mt-5">
                            @if ( empty($product->discount_price ))
                                <span>${{ $product->selling_price }}</span>
                            @else
                            @php
                                $final_Price = $product->selling_price - $product->discount_price;
                            @endphp
                                <span>${{ $final_Price }}</span>
                                <del class="old-price">${{ $product->selling_price }}</del>
                            @endif
                        </p>
                        <div class="product-rate">
                            <div class="product-rating" style="width: 90%"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="banner-img wow fadeIn mb-lg-0 animated d-lg-block d-none">
                <img src="assets/imgs/banner/banner-11.png" alt="" />
                <div class="banner-text">
                    <span>Oganic</span>
                    <h4>
                        Save 17% <br />
                        on <span class="text-brand">Oganic</span><br />
                        Juice
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
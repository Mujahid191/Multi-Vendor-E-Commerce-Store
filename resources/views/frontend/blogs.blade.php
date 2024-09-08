@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Blogs & News' }}
@endsection
@section('content')
<div class="page-header mt-30 mb-75">
    <div class="container">
        <div class="archive-header">
            <div class="row align-items-center">
                <div class="col-xl-3">
                    <h5 class="mb-15">Blogs & News</h5>
                    <div class="breadcrumb">
                        <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                        <span></span> Blogs & News
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="page-content mb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-9">
                <div class="shop-product-fillter mb-50 pr-30">
                    <div class="totall-product">
                        <h3>
                            <img class="w-36px mr-10" src="assets/imgs/theme/icons/category-1.svg" alt="" />
                            {{ empty($pageHeading->category_name) ? 'All Posts' : $pageHeading->category_name }}
                        </h3>
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
                                    <span><i class="fi-rs-apps-sort"></i>Sort:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span>Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Featured</a></li>
                                    <li><a href="#">Newest</a></li>
                                    <li><a href="#">Most comments</a></li>
                                    <li><a href="#">Release Date</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="loop-grid loop-list pr-30 mb-50">
                    @foreach ($blogs as $blog)
                        <article class="wow fadeIn animated hover-up mb-30 animated">
                            <div class="post-thumb" style="background-image: url({{ asset('images/blogs/' . $blog->image ) }})">
                                <div class="entry-meta">
                                    <a class="entry-meta meta-2" href="blog-category-grid.html"><i class="fi-rs-play-alt"></i></a>
                                </div>
                            </div>
                            <div class="entry-content-2 pl-50">
                                <h3 class="post-title mb-20">
                                    <a href="{{ route('blogPostDetails' , ['id' => $blog->id, 'slug' => $blog->slug]) }}">{{ $blog->title }}</a>
                                </h3>
                                <p class="post-exerpt mb-40">{{ $blog->short_description }}</p>
                                <div class="entry-meta meta-1 font-xs color-grey mt-10 pb-10">
                                    <div>
                                        <span class="post-on">{{ $blog->created_at->format('d F Y') }}</span>
                                        <span class="hit-count has-dot">126k Views</span>
                                    </div>
                                    <a href="{{ route('blogPostDetails' , ['id' => $blog->id, 'slug' => $blog->slug]) }}" class="text-brand font-heading font-weight-bold">Read more <i class="fi-rs-arrow-right"></i></a>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
                <div class="pagination-area mt-15 mb-sm-5 mb-lg-0">
                    <nav aria-label="Page navigation example">
                        {{ $blogs->links() }}
                    </nav>
                </div>
            </div>
            <div class="col-lg-3 primary-sidebar sticky-sidebar">
                <div class="widget-area">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Search…" />
                                <button type="submit"><i class="fi-rs-search"></i></button>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar-widget widget-category-2 mb-50">
                        <h5 class="section-title style-1 mb-30">Categories</h5>
                        <ul>
                            @foreach ($blogCategories as $item)
                            <li>
                                <a href="{{ route('blogPostByCategory', ['id' => $item->id , 'slug' => $item->category_slug ]) }}"> <img src="assets/imgs/theme/icons/category-1.svg" alt="" />{{ $item->category_name }}</a><span class="count">{{ count($item->BlogPost) }}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <!-- Product sidebar Widget -->
                    <div class="sidebar-widget product-sidebar mb-50 p-30 bg-grey border-radius-10">
                        <h5 class="section-title style-1 mb-30">Trending Now</h5>
                        @foreach ($products as $item)
                        @if ($loop->iteration <= 4)
                        <div class="single-post clearfix">
                            <div class="image">
                                <img src="{{ asset('images/products/thumbnails/' . $item->thumbnail ) }}" alt="#" />
                            </div>
                            <div class="content pt-10">
                                <h6><a href="{{ route('productDetails', ['id' => $item->id, 'slug' => $item->product_slug]) }}">{{ ucfirst($item->product_name )}}</a></h6>
                                @php
                                $finalPrice = $item->selling_price - $item->discount_price;
                                @endphp
                                <p class="price mb-0 mt-5">${{ $finalPrice }}</p>
                                <div class="product-rate">
                                    <div class="product-rating" style="width: 90%"></div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach
                    </div>
                    {{-- <div class="sidebar-widget widget_instagram mb-50">
                        <h5 class="section-title style-1 mb-30">Gallery</h5>
                        <div class="instagram-gellay">
                            <ul class="insta-feed">
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-1.jpg" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-2.jpg" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-3.jpg" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-4.jpg" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-5.jpg" alt="" /></a>
                                </li>
                                <li>
                                    <a href="#"><img class="border-radius-5" src="assets/imgs/shop/thumbnail-6.jpg" alt="" /></a>
                                </li>
                            </ul>
                        </div>
                    </div> --}}
                    <!--Tags-->
                    {{-- <div class="sidebar-widget widget-tags mb-50 pb-10">
                        <h5 class="section-title style-1 mb-30">Popular Tags</h5>
                        <ul class="tags-list">
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Cabbage</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Broccoli</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Smoothie</a>
                            </li>
                            <li class="hover-up">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Fruit</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Salad</a>
                            </li>
                            <li class="hover-up mr-0">
                                <a href="blog-category-grid.html"><i class="fi-rs-cross mr-10"></i>Appetizer</a>
                            </li>
                        </ul>
                    </div>
                    <div class="banner-img wow fadeIn mb-50 animated d-lg-block d-none">
                        <img src="assets/imgs/banner/banner-11.png" alt="" />
                        <div class="banner-text">
                            <span>Oganic</span>
                            <h4>
                                Save 17% <br />
                                on <span class="text-brand">Oganic</span><br />
                                Juice
                            </h4>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
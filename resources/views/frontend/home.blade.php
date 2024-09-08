@extends('frontend.master')
@section('content')
            <!--Start hero slider-->
            @include('frontend.homeSections.homeSlider')
            <!--End hero slider-->
    
            <!--Start category slider-->
            @include('frontend.homeSections.featureCategory')
            <!--End category slider-->
    
            <!--Start banners-->
            @include('frontend.homeSections.banner')
            <!--End banners-->
    
            <!--New Products Tabs-->
            @include('frontend.homeSections.newProducts')
            <!--Products Tabs-->
    
            {{-- Featured Producs Start --}}
            @include('frontend.homeSections.featureProducts')
            {{-- Featured Producs End --}}
            @foreach ($categories as $category)
            <section class="product-tabs section-padding position-relative">
                <div class="container">
                    <div class="section-title style-2 wow animate__animated animate__fadeIn">
                        <h3>{{ $category->category_name }} </h3>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">
                                @foreach ($category->products->where('status', 1)->take(4) as $product)

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
                                                <a href="#">{{ $product->category->category_name }}</a>
                                            </div>
                                            <h2>
                                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                            </h2>
                                            <div class="product-rate-cover">
                                                @php
                                                    $averageRating = $product->Review->avg('rating');
                                                    $allAverange = ($averageRating / 5) * 100; // Assuming the rating is on a scale from 1 to 5
                                                @endphp
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: {{ $allAverange }}%"></div>
                                                </div>
                                                <span class="font-small ml-5 text-muted">({{ number_format($averageRating, 1) }})</span>
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
                            <!--End product-grid-4-->
                        </div>
                    </div>
                    <!--End tab-content-->
                </div>
            </section>
            @endforeach
    
            {{-- Deals Section --}}
            @include('frontend.homeSections.dealsSection')
            <!--End 4 columns-->
    
            <!--Vendor List -->
            @include('frontend.homeSections.vendors')
            <!--End Vendor List -->
@endsection
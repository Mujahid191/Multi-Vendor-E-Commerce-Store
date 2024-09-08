@php
    $products = App\Models\Product::where('status', 1)->where('featured', 1)->latest()->get();
@endphp
<section class="section-padding pb-5">
    <div class="container">
        <div class="section-title wow animate__animated animate__fadeIn">
            <h3 class=""> Featured Products </h3>
             
        </div>
        <div class="row">
            <div class="col-lg-3 d-none d-lg-flex wow animate__animated animate__fadeIn">
                <div class="banner-img style-2">
                    <div class="banner-text">
                        <h2 class="mb-100">Bring nature into your home</h2>
                        <a href="shop-grid-right.html" class="btn btn-xs">Shop Now <i class="fi-rs-arrow-small-right"></i></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12 wow animate__animated animate__fadeIn" data-wow-delay=".4s">
                <div class="tab-content" id="myTabContent-1">
                    <div class="tab-pane fade show active" id="tab-one-1" role="tabpanel" aria-labelledby="tab-one-1">
                        <div class="carausel-4-columns-cover arrow-center position-relative">
                            <div class="slider-arrow slider-arrow-2 carausel-4-columns-arrow" id="carausel-4-columns-arrows"></div>
                            <div class="carausel-4-columns carausel-arrow-center" id="carausel-4-columns">
                            @foreach ($products as $product)
                                <div class="product-cart-wrap">
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
                                        @php
                                            $averageRating = $product->Review->avg('rating');
                                            $allAverange = ($averageRating / 5) * 100; // Assuming the rating is on a scale from 1 to 5
                                        @endphp
                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ $allAverange }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted">({{ number_format($averageRating, 1) }})</span>
                                        <div class="product-price mt-10">
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
                                        <div class="sold mt-15 mb-15">
                                            <div class="progress mb-5">
                                                <div class="progress-bar" role="progressbar" style="width: 50%" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                            <span class="font-xs text-heading"> Sold: 90/120</span>
                                        </div>
                                        <a class="btn w-100 hover-up" href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">Details</a>
                                    </div>
                                </div>
                                <!--End product Wrap-->
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--End tab-pane-->

                   
                </div>
                <!--End tab-content-->
            </div>
            <!--End Col-lg-9-->
        </div>
    </div>
</section>
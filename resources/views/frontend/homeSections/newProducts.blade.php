@php
    $categories = App\Models\Category::has('products')->orderBy('category_name', 'ASC')->get();
    $products = App\Models\Product::where('status', 1)->latest()->limit(10)->get();
@endphp
<section class="product-tabs section-padding position-relative">
    <div class="container">
        <div class="section-title style-2 wow animate__animated animate__fadeIn">
            <h3> New Products </h3>
            <ul class="nav nav-tabs links" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="nav-tab-one" data-bs-toggle="tab" data-bs-target="#tab-one" type="button" role="tab" aria-controls="tab-one" aria-selected="true">All</button>
                </li>
                @foreach ($categories as $category)
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="nav-tab-{{ $category->id }}" data-bs-toggle="tab" data-bs-target="#tab-{{ $category->id }}" type="button" role="tab" aria-controls="tab-{{ $category->id }}" aria-selected="false">{{ $category->category_name }}</button>
                    </li>
                @endforeach
            </ul>
        </div>
        <!--End nav-tabs-->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                <div class="row product-grid-4">
                    @foreach ($products as $product)
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
                                <h2><a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h2>
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
                                        <span class="font-small text-muted">By <a href="#">Owner</a></span>
                                    @else
                                        <span class="font-small text-muted">By <a href="#">{{ $product->user->name }}</a></span>
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
                                        <a class="add"  href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">Details</a>
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
            <!--En tab one-->
            @foreach ($categories as $category)
            <div class="tab-pane fade" id="tab-{{ $category->id }}" role="tabpanel" aria-labelledby="nav-tab-{{ $category->id }}">
                    <div class="row product-grid-4">
                        @foreach ($category->products->where('status', 1) as $product)
                            <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                <div class="product-cart-wrap mb-30" data-wow-delay=".1s">
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
                                                <span class="hot">Save{{ round($discount) }}%</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="product-content-wrap">
                                        <div class="product-category">
                                            <a href="shop-grid-right.html">{{ $product->category->category_name }}</a>
                                        </div>
                                        <h2><a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a></h2>
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
            @endforeach
            <!--En tab two-->
        </div>
        <!--End tab-content-->
    </div>
</section>
<section class="section-padding mb-30">
    <div class="container">
        <div class="row">

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay="0">
                <h4 class="section-title style-1 mb-30 animated animated"> Hot Deals </h4>
                <div class="product-list-small animated animated">
                    @foreach ($products->where('hot_deals', 1)->where('discount_price', '!=', NULL)->take(3) as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                                    <img class="default-img border" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                                </a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                </h6>
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
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-md-0 wow animate__animated animate__fadeInUp" data-wow-delay=".1s">
                <h4 class="section-title style-1 mb-30 animated animated">  Special Offer </h4>
                <div class="product-list-small animated animated">
                    @foreach ($products->where('special_offer', 1)->where('discount_price', '!=', NULL)->take(3) as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                                    <img class="default-img border" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                                </a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                </h6>
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
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-lg-block wow animate__animated animate__fadeInUp" data-wow-delay=".2s">
                <h4 class="section-title style-1 mb-30 animated animated">Recently added</h4>
                <div class="product-list-small animated animated">
                    @foreach ($products->take(3) as $product)
                    <article class="row align-items-center hover-up">
                        <figure class="col-md-4 mb-0">
                            <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                                <img class="default-img border" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                            </a>
                        </figure>
                        <div class="col-md-8 mb-0">
                            <h6>
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                            </h6>
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
                        </div>
                    </article>
                    @endforeach
                </div>
            </div>

            <div class="col-xl-3 col-lg-4 col-md-6 mb-sm-5 mb-md-0 d-none d-xl-block wow animate__animated animate__fadeInUp" data-wow-delay=".3s">
                <h4 class="section-title style-1 mb-30 animated animated"> Special Deals </h4>
                <div class="product-list-small animated animated">
                    @foreach ($products->where('special_deals', 1)->where('discount_price', '!=', NULL)->take(3) as $product)
                        <article class="row align-items-center hover-up">
                            <figure class="col-md-4 mb-0">
                                <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">
                                    <img class="default-img border" src="{{ asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="" />
                                </a>
                            </figure>
                            <div class="col-md-8 mb-0">
                                <h6>
                                    <a href="{{ route('productDetails', ['id' => $product->id, 'slug' => $product->product_slug]) }}">{{ $product->product_name }}</a>
                                </h6>
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
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
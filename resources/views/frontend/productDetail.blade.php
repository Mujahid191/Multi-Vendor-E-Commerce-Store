@extends('frontend.master')
@section('title')
    {{ 'Easy Mart ' . $product->product_name }}
@endsection
@section('content')
<link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/rating.css') }}">
@php
    $reviews = \App\Models\Review::where('product_id', $product->id)->where('status', 1)->latest()->get();
    $averageRating = $reviews->avg('rating');
    $allAverange = ($averageRating / 5) * 100; // Assuming the rating is on a scale from 1 to 5
@endphp
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> <a href="#">{{ $product->category->category_name }}</a> <span></span> {{ $product->product_name }}
        </div>
    </div>
</div>
{{-- Page Content --}}
<div class="container mb-30">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="product-detail accordion-detail">
                <div class="row mb-50 mt-30">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                @foreach ($multiImages as $image)
                                    <figure class="border-radius-10">
                                        <img src="{{ asset('images/products/multiImages/' . $image->image_name )}}" alt="product image" />
                                    </figure>
                                @endforeach
                            </div>
                            <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails">
                                @foreach ($multiImages as $image)
                                <div><img src="{{ asset('images/products/multiImages/' . $image->image_name )}}" alt="product image" /></div>
                                @endforeach
                            </div>
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30">
                            <div class="product-badges product-badges-position product-badges-mrg">
                                @if ( $product->discount_price == Null)
                                    <span class="stock-status out-stock">New</span>
                                @else
                                    @php
                                        $discount = ($product->discount_price / $product->selling_price  * 100)  ;
                                    @endphp
                                    <span class="stock-status out-stock">Save {{ round($discount) }}%</span>
                                @endif
                            </div>
                            <h2 class="title-detail">{{ $product->product_name }}</h2>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: {{ $allAverange }}%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> ({{ count($reviews )}} reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    @if ($product->discount_price == NULL)
                                        <span class="current-price text-brand">${{ $product->selling_price }}</span>
                                    @else
                                    @php
                                        $final_price = $product->selling_price - $product->discount_price;
                                        $discount = ($product->discount_price / $product->selling_price) * 100;
                                        @endphp
                                        <span class="current-price text-brand">${{ $final_price }}</span>
                                        <span>
                                            <span class="save-price font-md color3 ml-15">{{ round($discount) }}% Off</span>
                                            <span class="old-price font-md ml-15">${{ $product->selling_price }}</span>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="short-desc mb-30">
                                <p class="font-lg">{{ $product->short_description }}</p>
                            </div>
                            @if ( $sizes != [""])
                                <div class="attr-detail attr-size mb-20">
                                    <strong class="mr-10" style="width: 45px">Size </strong>
                                    <select class="nice-select w-25" id="productSize">
                                        @foreach ($sizes as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <div class="attr-detail attr-size mb-20 d-none">
                                    <strong class="mr-10" style="width: 45px">Size </strong>
                                    <select class="nice-select w-25" id="productSize">
                                    </select>
                                </div>
                            @endif

                            @if ( $colors != [""])
                                <div class="attr-detail attr-size mb-20">
                                    <strong class="mr-10" style="width: 45px">Colour </strong>
                                    <select class="nice-select w-25" id="productColor">
                                        @foreach ($colors as $item)
                                            <option value="{{ $item }}">{{ $item }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @else
                                <div class="attr-detail attr-size mb-20 d-none">
                                    <strong class="mr-10" style="width: 45px">Colour </strong>
                                    <select class="nice-select w-25" id="productColor">
                                    </select>
                                </div>
                            @endif
                            
                            <div class="detail-extralink mb-50">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1" id="productQuantity">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="DetailproductId" value="{{ $product->id }}">
                                    <button type="submit" class="button button-add-to-cart" onclick="productAddToCart()"><i class="fi-rs-shopping-cart"></i>Add to cart</button>

                                    <a aria-label="Add To Wishlist" class="action-btn hover-up wishlist-product" data-product-id="{{ $product->id }}"><i class="fi-rs-heart"></i></a>
                                    <a aria-label="Compare" class="action-btn hover-up" href="shop-compare.html"><i class="fi-rs-shuffle"></i></a>
                                </div>
                            </div>
                            @if ( empty($product->user_id))
                                <p>Sold By: <a href="#"><b>Owner</b></a></p>
                            @else
                                <p>Sold By: <a href="#"><b>{{ $product->user->name }}</b></a></p>
                            @endif
                            <hr>
                            <div class="font-xs">
                            <ul class="mr-50 float-start">
                                @if ( !empty($product->brand_id))
                                    <li class="mb-5">Brand: <span class="text-brand">{{ $product->brand->brand_name }}</span></li>
                                    @else
                                    <li class="mb-5">Brand: <span class="text-brand">No Brand</span></li>
                                @endif
                                <li class="mb-5">Category: <a href="#"> {{ $product->category->category_name }}</a></li>
                                @if ( !empty($product->subcategory_id ))
                                    <li class="mb-5">Sub Category: <span class="text-brand">{{ $product->subcategory->subCategory_name }}</span></li>
                                    @else
                                    <li class="mb-5">Sub Category: <span class="text-brand">No Sub Category</span></li>
                                @endif
                            </ul>
                            <ul class="float-start">
                                <li class="mb-5">Code: <a href="#">{{ $product->product_code }}</a></li>
                                <li>Stock:<span class="in-stock text-brand ml-5">( {{ $product->product_quantity }} ) Items In Stock</span></li>
                                <li class="mb-5">Tags:
                                    @foreach ($tags as $item)
                                        <a href="#" rel="tag">{{ $item }},</a>
                                    @endforeach
                                </li>
                            </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
                <div class="product-info">
                    <div class="tab-style3">
                        <ul class="nav nav-tabs text-uppercase">
                            <li class="nav-item">
                                <a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description">Description</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info">Additional info</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Vendor-info-tab" data-bs-toggle="tab" href="#Vendor-info">Vendor</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews">Reviews ({{ count($reviews )}})</a>
                            </li>
                        </ul>
                        <div class="tab-content shop_info_tab entry-main-content">
                            <div class="tab-pane fade show active" id="Description">
                                <p>{!! $product->long_description !!}</p>
                            </div>
                            <div class="tab-pane fade" id="Additional-info">
                                <table class="font-md">
                                    <tbody>
                                        <tr class="stand-up">
                                            <th>Stand Up</th>
                                            <td>
                                                <p>35″L x 24″W x 37-45″H(front to back wheel)</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-wo-wheels">
                                            <th>Folded (w/o wheels)</th>
                                            <td>
                                                <p>32.5″L x 18.5″W x 16.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="folded-w-wheels">
                                            <th>Folded (w/ wheels)</th>
                                            <td>
                                                <p>32.5″L x 24″W x 18.5″H</p>
                                            </td>
                                        </tr>
                                        <tr class="door-pass-through">
                                            <th>Door Pass Through</th>
                                            <td>
                                                <p>24</p>
                                            </td>
                                        </tr>
                                        <tr class="frame">
                                            <th>Frame</th>
                                            <td>
                                                <p>Aluminum</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-wo-wheels">
                                            <th>Weight (w/o wheels)</th>
                                            <td>
                                                <p>20 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="weight-capacity">
                                            <th>Weight Capacity</th>
                                            <td>
                                                <p>60 LBS</p>
                                            </td>
                                        </tr>
                                        <tr class="width">
                                            <th>Width</th>
                                            <td>
                                                <p>24″</p>
                                            </td>
                                        </tr>
                                        <tr class="handle-height-ground-to-handle">
                                            <th>Handle height (ground to handle)</th>
                                            <td>
                                                <p>37-45″</p>
                                            </td>
                                        </tr>
                                        <tr class="wheels">
                                            <th>Wheels</th>
                                            <td>
                                                <p>12″ air / wide track slick tread</p>
                                            </td>
                                        </tr>
                                        <tr class="seat-back-height">
                                            <th>Seat back height</th>
                                            <td>
                                                <p>21.5″</p>
                                            </td>
                                        </tr>
                                        <tr class="head-room-inside-canopy">
                                            <th>Head room (inside canopy)</th>
                                            <td>
                                                <p>25″</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_color">
                                            <th>Color</th>
                                            <td>
                                                <p>Black, Blue, Red, White</p>
                                            </td>
                                        </tr>
                                        <tr class="pa_size">
                                            <th>Size</th>
                                            <td>
                                                <p>M, S</p>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="tab-pane fade" id="Vendor-info">
                                <div class="vendor-logo d-flex mb-30 align-items-center">
                                    @if ( empty($product->user_id))
                                        <img class="rounded" src="{{ asset('backend/assets/images/no_image.jpg') }}" alt="user image">
                                    @else
                                        <img class="rounded" src="{{ asset('images/users/'. $product->user->image ) }}" alt="user image">
                                    @endif
                                    <div class="vendor-name ml-15">
                                        <h6>
                                            @if ( empty($product->user_id))
                                                <a href="#">Owner</a>
                                            @else
                                                <a href="{{ route('vendorDetails', $product->user_id ) }}">{{ $product->user->name }}</a>
                                            @endif
                                        </h6>
                                        <div class="product-rate-cover text-end">
                                            @php
                                                $averageRating = $product->user->products->flatMap->Review->avg('rating');
                                                $TotalReviews = $product->user->products->flatMap->Review->count('rating');
                                                $allAverage = ($averageRating / 5) * 100; // Assuming the rating is on a scale from 1 to 5
                                            @endphp

                                            <div class="product-rate d-inline-block">
                                                <div class="product-rating" style="width: {{ $allAverage }}%"></div>
                                            </div>
                                            <span class="font-small ml-5 text-muted">({{ $TotalReviews }})</span>
                                        </div>
                                    </div>
                                </div>
                                <ul class="contact-infor mb-50">
                                    @if ( !empty($product->user_id))
                                    <li><img src="assets/imgs/theme/icons/icon-location.svg" alt="" /><strong>Address: </strong> 
                                        <span> {{ $product->user->address }}</span></li>
                                    <li><img src="assets/imgs/theme/icons/icon-contact.svg" alt="" /><strong>Contact Seller:</strong>
                                        <span>{{ $product->user->phone }}</span></li>
                                    @endif
                                </ul>
                                {{-- <div class="d-flex mb-55">
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Rating</p>
                                        <h4 class="mb-0">{{ round($allAverage ) }}%</h4>
                                    </div>
                                    <div class="mr-30">
                                        <p class="text-brand font-xs">Ship on time</p>
                                        <h4 class="mb-0">100%</h4>
                                    </div>
                                    <div>
                                        <p class="text-brand font-xs">Chat response</p>
                                        <h4 class="mb-0">89%</h4>
                                    </div>
                                </div> --}}
                                @if ( !empty($product->user_id))
                                <p>{{ $product->user->shop_info }}</p>
                                @endif
                            </div>
                            <div class="tab-pane fade" id="Reviews">
                                <!--Comments-->
                                <div class="comments-area">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h4 class="mb-30">Customer questions & answers</h4>
                                            <div class="comment-list">
                                                @foreach ($reviews as $item)
                                                <div class="single-comment justify-content-between d-flex mb-30">
                                                    <div class="user justify-content-between d-flex">
                                                        <div class="thumb text-center">
                                                            <img src="{{ empty($item->User->image) ?  asset('backend/assets/images/no_image.jpg') : 
                                                            asset('images/users/' . $item->User->image) }}" alt="" /> <br>
                                                            <a href="#" class="font-heading text-brand">{{ $item->User->name }}</a>
                                                        </div>
                                                        <div class="desc w-100">
                                                            <div class="d-flex align-items-center justify-content-between mb-10">
                                                                    <span class="font-xs text-muted">{{ \Carbon\Carbon::parse($item->created_at)->format('F j, Y \a\t g:i a') }}
                                                                    </span>
                                                                <div class="product-rate ms-5">
                                                                    @php
                                                                        $widthPercentage = ($item->rating / 5) * 100; // Calculate the width based on the rating
                                                                    @endphp
                                                                    <div class="product-rating" style="width: {{ $widthPercentage }}%"></div>
                                                                </div>
                                                            </div>
                                                            <p class="mb-10">{{ $item->comment }} <a href="#" class="reply">Reply</a></p>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <h4 class="mb-30">Customer reviews</h4>
                                            <div class="d-flex mb-30">
                                                <div class="product-rate d-inline-block mr-15">
                                                    <div class="product-rating" style="width: {{ $allAverange }}%"></div>
                                                </div>
                                                <h6>{{ number_format($averageRating, 1) }} out of 5</h6>
                                            </div>
                                            @for ($i = 5; $i >= 1; $i--)
                                                @php
                                                    $countStars = $reviews->where('rating', $i)->count();
                                                    $percentage = $countStars > 0 ? ($countStars / $reviews->count()) * 100 : 0;
                                                @endphp

                                                <div class="progress mb-20">
                                                    <span>{{ $i }} star</span>
                                                    <div class="progress-bar" role="progressbar" style="width: {{ $percentage }}%" aria-valuenow="{{ $percentage }}" aria-valuemin="0" aria-valuemax="100">{{ round($percentage) }}%</div>
                                                </div>
                                            @endfor
                                            <a href="#" class="font-xs text-muted">How are ratings calculated?</a>
                                        </div>
                                    </div>
                                </div>
                                <!--comment form-->
                                <div class="comment-form">
                                    <h4 class="mb-15">Add a review</h4>
                                    <div class="row">
                                        <div class="col-lg-8 col-md-12">
                                            <form class="form-contact comment_form needs-validation" action="{{ route('userReviewSave') }}" method="POST" id="commentForm" novalidate>
                                                @csrf
                                                <div class="my-rating-6 mb-20"></div>
                                                <input type="hidden" name="rating" id="rating" required>
                                                <div class="invalid-feedback">Please select Rating.</div>
                                                <input type="hidden" name="user_id" value="{{ empty(Auth::user()->id) ? '' : Auth::user()->id }}">
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9" required placeholder="Write Comment"></textarea>
                                                            <div class="invalid-feedback">Please Write Comment.</div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="button button-contactForm">Submit Review</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-60">
                    <div class="col-12">
                        <h2 class="section-title style-1 mb-30">Related products</h2>
                    </div>
                    <div class="col-12">
                        <div class="row related-products">
                        @foreach ($relatedProduct as $product)
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
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modelJs')
<script src="{{ asset('frontend/assets/js/plugins/rating.js') }}"></script>
<script>
    function productAddToCart() {
    let quantity = document.getElementById('productQuantity').value;
    let color = document.getElementById('productColor').value;
    let size = document.getElementById('productSize').value;
    let productID = document.getElementById('DetailproductId').value;
    const data = {productID, quantity, color, size};
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    fetch('/product/add/cart',{
        'method' : 'POST',
        'body' : JSON.stringify(data),
        headers: {
        'Content-type' : 'application/json',
        'X-CSRF-TOKEN': csrfToken,
        }
    })
    .then( (response) => response.json())
    .then( (result) =>{
        miniCartData();
    }).catch( (error) => {
        window.location.href = '/login';
    })
}

$(".my-rating-6").starRating({
  useFullStars: true,
//   initialRating: 4,
//   strokeColor: '#894A00',
  strokeWidth: 10,
  starSize: 25,
  callback: function(currentRating, $el){
            $('#rating').val(currentRating);
        }
});

// Bootstrap Validation
(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
        if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
        }

        form.classList.add('was-validated')
        }, false)
    })
})();
</script>
@endpush
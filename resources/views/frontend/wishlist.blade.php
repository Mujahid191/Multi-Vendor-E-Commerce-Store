@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Wishlist' }}
@endsection
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Wishlist
        </div>
    </div>
</div>
<div class="container mb-30 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <div class="mb-30">
                <h6 class="text-body">There are <span class="text-brand" id="totalWishlistItems">5</span> products in this list</h6>
            </div>
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="" />
                                <label class="form-check-label" for="exampleCheckbox11"></label>
                            </th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Stock Status</th>
                            <th scope="col">Action</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody id="wishlistBody">
                            {{-- <tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                                    <label class="form-check-label" for="exampleCheckbox1"></label>
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#" /></td>
                                <td class="product-des product-name">
                                    <h6><a class="product-name mb-10" href="shop-product-right.html">Hello</a></h6>
                                    <div class="product-rate-cover">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: 90%"></div>
                                        </div>
                                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">$2.51</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <span class="stock-status in-stock mb-0"> In Stock </span>
                                </td>
                                <td class="text-right" data-title="Cart">
                                    <button class="btn btn-sm">Add to cart</button>
                                </td>
                                <td class="action text-center" data-title="Remove">
                                    <a href="#" class="text-body"><i class="fi-rs-trash"></i></a>
                                </td>
                            </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modelJs')
<script>
    function wishlistProducts() {
    fetch('/wishlist/all/products',{
        'method' : 'GET',
    }).then( (response) => response.json())
    .then( (wishlistItems) => {
        let tr = '';
        Object.values(wishlistItems).forEach(wishlistItem => {
            tr += `
                <tr class="pt-30">
                    <td class="custome-checkbox pl-30">
                        <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="" />
                        <label class="form-check-label" for="exampleCheckbox1"></label>
                    </td>
                    <td class="image product-thumbnail pt-40"><img src="{{ asset('images/products/thumbnails') }}/${wishlistItem.products.thumbnail}" alt="#" /></td>
                    <td class="product-des product-name">
                        <h6><a class="product-name mb-10" href="/product/details/${wishlistItem.products.id}/${wishlistItem.products.product_slug}">${ wishlistItem.products.product_name }</a></h6>
                        ${(() => {
                            let stars = 0;
                            wishlistItem.products.review.forEach(e => {
                                stars += e.rating;
                            });
                            let AverageRating = stars / wishlistItem.products.review.length;

                            return `
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: ${!isNaN(AverageRating) && AverageRating !== undefined ? (AverageRating / 5) * 100 : 0 }%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted">(${!isNaN(AverageRating) && AverageRating !== undefined ? AverageRating.toFixed(1) : 0 })</span>
                                </div>
                            `;
                        })()}
                    </td>
                    <td class="price" data-title="Price">
                        ${ wishlistItem.products.discount_price == null ? 
                            `<h4 class="text-brand">$${wishlistItem.products.selling_price}</h4>`
                            : `
                            <h4 class="text-brand">$${(wishlistItem.products.selling_price) - (wishlistItem.products.discount_price)}</h4>
                            <del class="text-muted fw-bold fs-5">$${wishlistItem.products.selling_price}</del>`
                        }
                    </td>
                    <td class="text-center detail-info" data-title="Stock">
                        ${ wishlistItem.products.product_quantity <= 0 ? 
                            `<span class="stock-status out-stock mb-0"> Out Stock </span>`
                            : 
                            ` <span class="stock-status in-stock mb-0"> In Stock </span>`
                        }
                    </td>
                    <td class="text-right" data-title="Cart">
                        <button class="btn btn-sm">Add to cart</button>
                    </td>
                    <td class="action text-center" data-title="Remove">
                        <a onclick='productRemoveWishlist(${wishlistItem.id})' class="text-body"><i class="fi-rs-trash"></i></a>
                    </td>
                </tr>
            `;

            });
            document.getElementById('wishlistBody').innerHTML = tr;
            document.getElementById('totalWishlistItems').innerHTML = wishlistItems.length;
        })
    }
    wishlistProducts();

    function productRemoveWishlist(id){
        fetch(`/product/remove/wishlist/${id}`, {
            'method' : 'GET',
        }).then( (response) => response.json())
        .then( (data) =>{
            miniCartData();
            wishlistProducts();
        })
    }
</script>
@endpush
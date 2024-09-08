@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Compare Product' }}
@endsection
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> Compare
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-xl-10 col-lg-12 m-auto">
            <h6 class="text-body mb-20">There are <span class="text-brand" id="totalCompareItems">0</span> products to compare</h6>
            <div class="table-responsive">
                <table class="table text-center table-compare">
                    <tbody id="compareBody">
                        <tr class="pr_image" id="image">
                            {{-- <td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>
                            <td class="row_img"><img src="{{ asset('frontend/assets/imgs/shop/product-2-1.jpg') }}" alt="compare-img" /></td>
                            <td class="row_img"><img src="{{ asset('frontend/assets/imgs/shop/product-1-1.jpg') }}" alt="compare-img" /></td>
                            <td class="row_img"><img src="{{ asset('frontend/assets/imgs/shop/product-3-1.jpg') }}" alt="compare-img" /></td> --}}
                        </tr>
                        <tr class="pr_title" id="name">
                            {{-- <td class="text-muted font-sm fw-600 font-heading">Name</td>
                            <td class="product_name">
                                <h6><a href="shop-product-full.html" class="text-heading">J.Crew Mercantile Women's Short</a></h6>
                            </td>
                            <td class="product_name">
                                <h6><a href="shop-product-full.html" class="text-heading">Amazon Essentials Women's Tanks</a></h6>
                            </td>
                            <td class="product_name">
                                <h6><a href="shop-product-full.html" class="text-heading">Amazon Brand - Daily Ritual Wom</a></h6>
                            </td> --}}
                        </tr>
                        <tr class="pr_price" id="pprice">
                            {{-- <td class="text-muted font-sm fw-600 font-heading">Price</td>
                            <td class="product_price">
                                <h4 class="price text-brand">$15.00</h4>
                            </td> --}}
                        </tr>
                        <tr class="pr_rating" id="rating">
                            {{-- <td class="text-muted font-sm fw-600 font-heading">Rating</td>
                            <td>
                                <div class="rating_wrap">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="rating_num">(121)</span>
                                </div>
                            </td> --}}
                        </tr>
                        <tr class="pr_stock" id="pstock">
                            {{-- <td class="text-muted font-sm fw-600 font-heading">Stock status</td>
                            <td class="row_stock"><span class="stock-status in-stock mb-0">In Stock</span></td> --}}
                        </tr>
                        {{-- <tr class="pr_weight">
                            <td class="text-muted font-sm fw-600 font-heading">Weight</td>
                            <td class="row_weight">320 gram</td>
                            <td class="row_weight">370 gram</td>
                            <td class="row_weight">380 gram</td>
                        </tr>
                        <tr class="pr_dimensions">
                            <td class="text-muted font-sm fw-600 font-heading">Dimensions</td>
                            <td class="row_dimensions">N/A</td>
                            <td class="row_dimensions">N/A</td>
                            <td class="row_dimensions">N/A</td>
                        </tr> --}}
                        <tr class="pr_add_to_cart" id="pDetail">
                            {{-- <td class="text-muted font-sm fw-600 font-heading">Buy now</td>
                            <td class="row_btn">
                                <button class="btn btn-sm"><i class="fi-rs-shopping-bag mr-5"></i>Add to cart</button>
                            </td> --}}
                        </tr>
                        <tr class="pr_remove text-muted" id="premove">
                            {{-- <td class="text-muted font-md fw-600">Action</td>
                            <td class="row_remove">
                                <a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                            </td> --}}
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modelJs')
<script>
    function compareProducts() {
    fetch('/compare/all/products',{
        'method' : 'GET',
    }).then( (response) => response.json())
    .then( (compareItems) => {
        let image = `<td class="text-muted font-sm fw-600 font-heading mw-200">Preview</td>`;
        let name = `<td class="text-muted font-sm fw-600 font-heading">Name</td>`;
        let price = `<td class="text-muted font-sm fw-600 font-heading">Price</td>`;
        let stock = `<td class="text-muted font-sm fw-600 font-heading">Stock status</td>`;
        let pDetail = `<td class="text-muted font-sm fw-600 font-heading">Details</td>`
        let rating = `<td class="text-muted font-sm fw-600 font-heading">Rating</td>`
        let premove = `<td class="text-muted font-sm fw-600 font-heading">Action</td>`
        Object.values(compareItems).forEach(compareItem => {
            let shortenedName = compareItem.products.product_name.substring(0, 13);
                image += `
                <td class="row_img"><img src="{{ asset('images/products/thumbnails') }}/${ compareItem.products.thumbnail }" alt="compare-img" width=130/></td>
                `;
                name += `
                <td class="product_name">
                    <h6><a href="/product/details/${compareItem.products.id}/${compareItem.products.product_slug}" class="text-heading">${ shortenedName }..</a></h6>
                </td>
                `;
                price += `
                <td class="product_price">
                    ${ compareItem.products.discount_price == null ? 
                        `<h4 class="price text-brand">$${ compareItem.products.selling_price }</h4>`
                        : `
                        <h4 class="text-brand">$${(compareItem.products.selling_price) - (compareItem.products.discount_price)}</h4>
                        <del class="text-muted fw-bold fs-5">$${compareItem.products.selling_price}</del>`
                    }
                </td>
                `;
                stock += `
                <td class="row_text font-xs">
                    ${ compareItem.products.product_quantity <= 0 ? 
                        `<span class="stock-status out-stock mb-0">Out of stock</span>`
                        : 
                        `<span class="stock-status in-stock mb-0">In Stock</span>`
                    }
                </td>
                `;
                pDetail +=`
                <td class="row_btn">
                    <a href="/product/details/${compareItem.products.id}/${compareItem.products.product_slug}" class="btn btn-sm">Details</a>
                </td>
                `;
                let stars = 0;
                compareItem.products.review.forEach(e =>{
                    stars += e.rating;
                })
                let AverageRating = stars / compareItem.products.review.length;
                rating += `
                <td>
                    <div class="rating_wrap">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width: ${!isNaN(AverageRating) && AverageRating !== undefined ? (AverageRating / 5) * 100 : 0 }%"></div>
                        </div>
                        <span class="rating_num text-muted">(${!isNaN(AverageRating) && AverageRating !== undefined ? AverageRating.toFixed(1) : 0 })</span>
                    </div>
                </td>
                `;
                premove += `
                <td class="row_remove">
                    <a onclick='productRemoveCompare(${ compareItem.id })' class="text-muted"><i class="fi-rs-trash mr-5"></i><span>Remove</span> </a>
                </td>
                `
            });
            document.getElementById('image').innerHTML = image;
            document.getElementById('name').innerHTML = name;
            document.getElementById('pprice').innerHTML = price;
            document.getElementById('pstock').innerHTML = stock;
            document.getElementById('pDetail').innerHTML = pDetail;
            document.getElementById('rating').innerHTML = rating;
            document.getElementById('premove').innerHTML = premove;
            document.getElementById('totalCompareItems').innerHTML = compareItems.length;
        });
    }
    compareProducts();

    function productRemoveCompare(id){
        fetch(`/product/remove/compare/${id}`, {
            'method' : 'GET',
        }).then( (response) => response.json())
        .then( (data) =>{
            miniCartData();
            compareProducts();
        });
    }
</script>
@endpush
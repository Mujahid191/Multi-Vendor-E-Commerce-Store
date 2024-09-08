@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Cart' }}
@endsection
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            {{-- <span></span> Shop --}}
            <span></span> Cart
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    {{-- <div class="row">
        <div class="col-lg-8 mb-40">
            <h1 class="heading-2 mb-10">Your Cart</h1>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are <span class="text-brand">3</span> products in your cart</h6>
                <h6 class="text-body"><a href="#" class="text-muted"><i class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
            </div>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive shopping-summery">
                <table class="table table-wishlist">
                    <thead>
                        <tr class="main-heading">
                            <th class="custome-checkbox start pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox11" value="">
                                <label class="form-check-label" for="exampleCheckbox11"></label>
                            </th>
                            <th scope="col" colspan="2">Product</th>
                            <th scope="col">Price</th>
                            <th scope="col">Size</th>
                            <th scope="col">Colour</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col" class="end">Remove</th>
                        </tr>
                    </thead>
                    <tbody id="mainCartBody">
                        {{-- <tr class="pt-30">
                            <td class="custome-checkbox pl-30">
                                <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                                <label class="form-check-label" for="exampleCheckbox1"></label>
                            </td>
                            <td class="image product-thumbnail pt-40"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                            <td class="product-des product-name">
                                <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="shop-product-right.html">Field Roast Chao Cheese Creamy Original</a></h6>
                                <div class="product-rate-cover">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width:90%">
                                        </div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (4.0)</span>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h5 class="text-body">$2.51 </h5>
                            </td>
                            <td class="price" data-title="Price">
                                <h5 class="text-body">Small </h5>
                            </td>
                            <td class="price" data-title="Price">
                                <h5 class="text-body">Black</h5>
                            </td>
                            <td class="text-center detail-info" data-title="Stock">
                                <div class="detail-extralink mr-15">
                                    <div class="detail-qty border radius">
                                        <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                        <input type="text" name="quantity" class="qty-val" value="1" min="1">
                                        <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                    </div>
                                </div>
                            </td>
                            <td class="price" data-title="Price">
                                <h5 class="text-brand">$2.51 </h5>
                            </td>
                            <td class="action text-center" data-title="Remove"><a href="#" class="text-body"><i class="fi-rs-trash"></i></a></td>
                        </tr> --}}
                    </tbody>
                </table>
            </div>
           

            <div class="row mt-50">

                    <div class="col-lg-5">
                    <div class="p-40" id="coupon_area">
                        <h4 class="mb-10">Apply Coupon</h4>
                        <p class="mb-10"><span class="font-lg text-muted">Using A Promo Code?</p>
                        <p class="mb-20"><span class="font-lg text-danger" id="coupon_error"></p>
                            <div class="d-flex justify-content-between">
                                <input class="font-medium mr-15 coupon" name="Coupon" id="coupon" placeholder="Enter Your Coupon">
                                <button class="btn" onclick="couponApply()"><i class="fi-rs-label mr-10"></i>Apply</button>
                            </div>
                    </div>
                </div>


                <div class="col-lg-7">
                     <div class="divider-2 mb-30"></div>
             


                    <div class="border p-md-4 cart-totals ml-30">
                <div class="table-responsive">
                    <table class="table no-border">
                        <tbody>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end" id="total_Price">$0</h4>
                                </td>
                            </tr>
                            <tr>
                                <td scope="col" colspan="2">
                                    <div class="divider-2 mt-10 mb-10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Coupon Discount</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h5 class="text-brand text-end" id="discount_price1">0</h5><tr></tr>
                                </td>
                                <td scope="col" colspan="2">
                                    <div class="divider-2 mt-10 mb-10"></div>
                                </td>
                            </tr>
                            <tr>
                                <td class="cart_total_label">
                                    <h6 class="text-muted">Sub Total</h6>
                                </td>
                                <td class="cart_total_amount">
                                    <h4 class="text-brand text-end" id="subtotal">$0</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <a href="{{ route('checkout') }}" class="btn mb-20 w-100">Proceed To CheckOut<i class="fi-rs-sign-out ml-15"></i></a>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('modelJs')
<script>
    function mainCartData(result) {
    let products = result['products'];
    let totalProducts = result['totalProducts'];
    let discount = result['discount'];
    let totalPrice = result['totalPrice'];
    let subtotal = result['subtotal'];
    document.getElementById('total_Price').innerText = '$' + totalPrice;
    document.getElementById('subtotal').innerText = '$' + subtotal;
    document.getElementById('discount_price1').innerText = '$' + discount;
    let tr = '';
    Object.values(products).forEach(product => {
            tr += `
            <tr class="pt-30">
                <td class="custome-checkbox pl-30">
                    <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox1" value="">
                    <label class="form-check-label" for="exampleCheckbox1"></label>
                </td>
                <td class="image product-thumbnail pt-40"><a href="/product/details/${product.id}/${product.name}"><img alt="Nest" src="{{ asset('images/products/thumbnails/${product.options.thumbnail}') }}" /></a></td>
                <td class="product-des product-name">
                    <h6 class="mb-5"><a class="product-name mb-10 text-heading" href="/product/details/${product.id}/${product.name}">${product.name}</a></h6>
                    <div class="product-rate-cover">
                        <div class="product-rate d-inline-block">
                            <div class="product-rating" style="width:90%">
                            </div>
                        </div>
                        <span class="font-small ml-5 text-muted"> (4.0)</span>
                    </div>
                </td>
                <td class="price" data-title="Price">
                    <h5 class="text-body">$${product.price} </h5>
                </td>
                <td class="price" data-title="Price">
                    ${product.options.size == null ? '--' : `<h5 class="text-body">${product.options.size}</h5>`}
                </td>
                <td class="price" data-title="Price">
                    ${product.options.color == null ? '--' : `<h5 class="text-body">${product.options.color}</h5>`}
                </td>
                <td class="text-center detail-info" data-title="Stock">
                    <div class="detail-extralink mr-15">
                        <div class="detail-qty border radius">
                            <a class="qty-down" onclick='event.preventDefault(); productQuantity("${product.rowId}", -1)'>
                            <i class="fi-rs-angle-small-down"></i></a>
                            <input type="text" name="quantity" class="qty-val" value="${product.qty}" min="1">
                            <a class="qty-up" onclick='event.preventDefault(); productQuantity("${product.rowId}", +1)'><i class="fi-rs-angle-small-up"></i></a>
                        </div>
                    </div>
                </td>
                <td class="price" data-title="Price">
                    <h5 class="text-brand">$${product.subtotal} </h5>
                </td>
                <td class="action text-center" data-title="Remove"><a onclick='productRemoveCart("${product.rowId}")' class="text-body"><i class="fi-rs-trash"></i></a></td>
            </tr>
            `
        });
        document.getElementById('mainCartBody').innerHTML = tr;
    }
    // product Quantity Controll
    function productQuantity(rowId,quantity){
        fetch(`/product/quantity/${rowId}/${quantity}`, {
            'method' : 'GET',
        }).then( (response) => response.json())
        .then( (data) =>{
            miniCartData();
        })
    }
    // Coupon apply function
    function couponApply(){
        let coupon = document.getElementById('coupon').value;
        fetch('/coupon/apply/' + coupon,{
            'Method' : 'GET',
        }).then( (response) => response.json())
        .then( (couponResponse) =>{
            if( couponResponse.success){
                document.getElementById('coupon_area').innerHTML = `<h4 class="text-brand mb-10">${couponResponse.success}</h4>`
                miniCartData();
            }else{
                document.getElementById('coupon_error').innerText = couponResponse.error;
            }
        })
    }
</script>
@endpush
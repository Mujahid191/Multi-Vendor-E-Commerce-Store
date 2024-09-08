@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Checkout' }}
@endsection
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
            <span></span> Checkout
        </div>
    </div>
</div>
<div class="container mb-30 mt-20">
    <div class="row">
        <div class="col-lg-8 mb-40">
            <h3 class="heading-2 mb-10">Checkout</h3>
            <div class="d-flex justify-content-between">
                <h6 class="text-body">There are products in your cart</h6>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-7">
            <div class="row">
                <form action="{{ route('checkoutDetails') }}" method="POST" enctype='multipart/form-data'>
                    @csrf
                    <h4 class="mb-30">Shipping Details</h4>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <input type="text" required="" name="shipping_name" value="{{ Auth::user()->name }}" placeholder="User Name *">
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="email" required="" name="shipping_email" value="{{ Auth::user()->email }}" placeholder="Email *">
                        </div>
                    </div>
                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select class="form-control select-active" name="division" onchange="loadDistrict()" id="division">
                                    <option value="">Select Division</option>
                                    @foreach ($divisions as $division)
                                        <option value="{{ $division->id }}">{{ $division->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="shipping_phone" value="{{ Auth::user()->phone }}"  placeholder="Phone*">
                        </div>
                    </div>

                    <div class="row shipping_calculator">
                    <div class="form-group col-lg-6">
                        <div class="custom_select">
                            <select class="form-control select-active" name="district" id="district" onchange="loadState()">
                                <option disabled selected>Select District</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-6">
                        <input required="" type="text" name="postCode" placeholder="Post Code *">
                    </div>
                    </div>
                    <div class="row shipping_calculator">
                        <div class="form-group col-lg-6">
                            <div class="custom_select">
                                <select class="form-control select-active" name="state" id="states">
                                    <option value="">Select State</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-lg-6">
                            <input required="" type="text" name="shipping_address" placeholder="Address *">
                        </div>
                    </div>
                    <div class="form-group mb-30">
                        <textarea rows="5" name="info" placeholder="Additional information"></textarea>
                    </div>
                
            </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Billing Details</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border" id="checkoutTableBody">
                            <tbody>
                                {{-- <tr>
                                    <td class="image product-thumbnail"><img src="assets/imgs/shop/product-1-1.jpg" alt="#"></td>
                                    <td>
                                        <h6 class="w-160 mb-5"><a href="shop-product-full.html" class="text-heading">Yidarton Women Summer Blue</a></h6></span>
                                        <div class="product-rate-cover">
                                        <strong>Color : </strong>
                                        <strong>Size : </strong>
                                        </div>
                                    </td>
                                    <td>
                                        <h6 class="text-muted pl-20 pr-20">x 1</h6>
                                    </td>
                                    <td>
                                        <h4 class="text-brand">$13.3</h4>
                                    </td>
                                </tr> --}}
                            </tbody>
                        </table>
                        <table class="table no-border">
                            <tbody>
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Subtotal</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="subTotalCheckout">$0</h4>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Coupon Discount</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="couponDiscount">$0</h4>
                                    </td>
                                </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Grand Total</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end" id="grandTotal">$0</h4>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="payment ml-30">
                    <h4 class="mb-30">Payment</h4>
                    <div class="payment_option">
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios3" value="stripe" checked="">
                            <label class="form-check-label" for="exampleRadios3" data-bs-toggle="collapse" data-target="#bankTranfer" aria-controls="bankTranfer">Stripe</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios4" value="cashOnDelivery" checked="">
                            <label class="form-check-label" for="exampleRadios4" data-bs-toggle="collapse" data-target="#checkPayment" aria-controls="checkPayment">Cash on delivery</label>
                        </div>
                        <div class="custome-radio">
                            <input class="form-check-input" required="" type="radio" name="payment_option" id="exampleRadios5" value="online_gateway" checked="">
                            <label class="form-check-label" for="exampleRadios5" data-bs-toggle="collapse" data-target="#paypal" aria-controls="paypal">Online Gateway</label>
                        </div>
                    </div>                    
                    <div class="payment-logo d-flex">
                        <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-paypal.svg') }}" alt="">
                        <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-visa.svg') }}" alt="">
                        <img class="mr-15" src="{{ asset('frontend/assets/imgs/theme/icons/payment-master.svg') }}" alt="">
                        <img src="{{ asset('frontend/assets/imgs/theme/icons/payment-zapper.svg') }}" alt="">
                    </div>
                    <button type="submit" class="btn btn-fill-out btn-block mt-30">Place an Order<i class="fi-rs-sign-out ml-15"></i></button>
                </div>
        </form>
        </div>
    </div>
</div>
@endsection
@push('modelJs')
<script>
    function checkoutProduct(result) {
    let products = result['products'];
    let totalProducts = result['totalProducts'];
    let subTotalCheckout = result['totalPrice'];
    let couponDiscount = result['discount'];
    let grandTotal = result['subtotal'];
    document.getElementById('subTotalCheckout').innerText = '$' + subTotalCheckout;
    document.getElementById('couponDiscount').innerText = '$' + couponDiscount;
    document.getElementById('grandTotal').innerText = '$' + grandTotal;
    let tr = '';
    Object.values(products).forEach(product => {
            tr += `
            <tr>
                <td class="image product-thumbnail"><a href="/product/details/${product.id}/${product.name}"><img alt="Nest" src="{{ asset('images/products/thumbnails/${product.options.thumbnail}') }}" width='90' /></a></td>
                <td>
                    <h6 class="w-160 mb-5"><a href="/product/details/${product.id}/${product.name}">${product.name}</a></h6></span>
                    <div class="product-rate-cover">
                        <strong>Color : ${product.options.color == null ? '--' : `${product.options.color}`}</strong>
                        <br>
                        <strong>Size : ${product.options.size == null ? '--' : `${product.options.size}`}</strong>
                    </div>
                </td>
                <td>
                    <h6 class="text-muted pl-20 pr-20">x ${product.qty}</h6>
                </td>
                <td>
                    <h4 class="text-brand">$${product.subtotal}</h4>
                </td>
            </tr>
            `
        });
        document.getElementById('checkoutTableBody').innerHTML = tr;
    }
    // load District function
    function loadDistrict(){
        let division = document.getElementById('division').value;
        fetch('/load/district/' + division)
        .then( (response) => response.json())
        .then( (districts) =>{
            let district = `<option disabled selected>Select District</option>`
            Object.values(districts).forEach(item => {
                district +=`
                    <option value="${ item.id }">${ item.district_name }</option>
                `
            });
            document.getElementById('district').innerHTML = district;
        })
    }
    // Load State by District
    function loadState() {
        let district = document.getElementById('district').value;
        fetch('/load/state/' + district)
        .then( (response) => response.json())
        .then( (states) =>{
            let state = `<option disabled selected>Select State</option>`
            Object.values(states).forEach(item => {
                state +=`
                    <option value="${ item.id }">${ item.state_name }</option>
                `
            });
            document.getElementById('states').innerHTML = state;
        })
    }
</script>
@endpush
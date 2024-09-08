@extends('frontend.master')

@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="index.html" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a> 
            <span></span> Cash on Delivery
        </div>
    </div>
</div>
<div class="container mb-80 mt-50">
    <div class="row">
        <div class="col-lg-8 mb-20">
            <h3 class="heading-2 mb-10">Cash on Delivery</h3>
        </div>
    </div>
    <div>
        <form action="{{ route('orderDetailSave') }}" method="POST">
            @csrf
            <input type="hidden" name="shipping_name" value="{{ $data['shipping_name'] }}">
            <input type="hidden" name="shipping_email" value="{{ $data['shipping_email'] }}">
            <input type="hidden" name="division" value="{{ $data['division'] }}">
            <input type="hidden" name="shipping_phone" value="{{ $data['shipping_phone'] }}">
            <input type="hidden" name="district" value="{{ $data['district'] }}">
            <input type="hidden" name="postCode" value="{{ $data['postCode'] }}">
            <input type="hidden" name="state" value="{{ $data['state'] }}">
            <input type="hidden" name="shipping_address" value="{{ $data['shipping_address'] }}">
            <input type="hidden" name="info" value="{{ $data['info'] }}">
            <div class="row">
                <div class="col-lg-6">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Billing Details</h4>
                            <h6 class="text-muted">Subtotal</h6>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${{ $data['totalPrice'] }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Coupon Discount</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${{ $data['discount'] }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Grand Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${{ $data['subtotal'] }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="border p-40 cart-totals ml-30 mb-50">
                        <div class="d-flex align-items-end justify-content-between mb-30">
                            <h4>Confirm Order</h4>
                            <h6 class="text-muted">Subtotal</h6>
                        </div>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Grand Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${{ $data['subtotal'] }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td><a href="{{ route('checkout') }}" class="btn mt-10 w-100">Cancal</a></td>
                                        <td><button type="submit" class="btn btn-fill-out btn-block mt-10 w-100">Confirmed</button></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
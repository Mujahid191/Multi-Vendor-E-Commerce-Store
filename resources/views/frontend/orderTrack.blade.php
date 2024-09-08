@extends('frontend.master')
@section('title')
    {{ 'Easy Mart Order Track'}}
@endsection
@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    @import url('https://fonts.googleapis.com/css?family=Open+Sans&display=swap');.card{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;min-width: 0;word-wrap: break-word;background-color: #fff;background-clip: border-box;border: 1px solid rgba(0, 0, 0, 0.1);border-radius: 0.10rem}.card-header:first-child{border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0}.card-header{padding: 0.75rem 1.25rem;margin-bottom: 0;background-color: #fff;border-bottom: 1px solid rgba(0, 0, 0, 0.1)}.track{position: relative;background-color: #ddd;height: 7px;display: -webkit-box;display: -ms-flexbox;display: flex;margin-bottom: 60px;margin-top: 50px}.track .step{-webkit-box-flex: 1;-ms-flex-positive: 1;flex-grow: 1;width: 25%;margin-top: -18px;text-align: center;position: relative}.track .step.active:before{background: #3BB77E}.track .step::before{height: 7px;position: absolute;content: "";width: 100%;left: 0;top: 18px}.track .step.active .icon{background: #3BB77E;color: #fff}.track .icon{display: inline-block;width: 40px;height: 40px;line-height: 40px;position: relative;border-radius: 100%;background: #ddd}.track .step.active .text{font-weight: 400;color: #000}.track .text{display: block;margin-top: 7px}.itemside{position: relative;display: -webkit-box;display: -ms-flexbox;display: flex;width: 100%}.itemside .aside{position: relative;-ms-flex-negative: 0;flex-shrink: 0}.img-sm{width: 80px;height: 80px;padding: 7px}ul.row, ul.row-sm{list-style: none;padding: 0}.itemside .info{padding-left: 15px;padding-right: 7px}.itemside .title{display: block;margin-bottom: 5px;color: #212529}p{margin-top: 0;margin-bottom: 1rem}.btn-warning{color: #ffffff;background-color: #3BB77E;border-color: #3BB77E;border-radius: 1px}.btn-warning:hover{color: #ffffff;background-color: #3BB77E;border-color: #3BB77E;border-radius: 1px}
</style>
<div class="container mb-30">
    <article class="card">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> <a href="#">Order Tracking</a> <span></span> Tracking Details
                </div>
            </div>
        </div>
        <div class="card-body">
            <h6 class="mb-20 mt-10">Invoice No: <span class="text-danger">{{ $order->invoice_number }}</span></h6>
            <article class="card">
                <div class="card-body row">
                    <div class="col"> <strong>Reciever Details:</strong> 
                        <br> Name : <strong>{{ $order->User->name }}</strong>
                        <br> Phone : <strong>{{ $order->phone }}</strong>
                        <br> Email : <strong>{{ $order->email }}</strong>
                    </div>
                    <div class="col"> <strong>Address Details:</strong> 
                        <br> Division : <strong>{{ $order->Division->name }}</strong>
                        <br> District : <strong>{{ $order->District->district_name }}</strong>
                        <br> State : <strong>{{ $order->State->state_name }}</strong>
                    </div>
                    <div class="col"> <strong>Order Details:</strong> 
                        <br> Amount : <strong>${{ $order->amount }}</strong>
                        <br> Payment : <strong>{{ ucwords($order->payment_type) }}</strong>
                        <br> Order Date : <strong>{{ $order->order_date }}</strong>
                    </div>
                    {{-- <div class="col"> <strong>Tracking #:</strong> <br> BD045903594059 </div> --}}
                </div>
            </article>
            <div class="track">
                <div class="step @if($order->status == 'pending' || $order->status == 'confirm' || $order->status == 'processing' || $order->status == 'delivered') active @endif">
                    <span class="icon"> <i class="fa fa-spinner"></i> </span>
                    <span class="text">Order Pending</span>
                </div>
                <div class="step @if($order->status == 'confirm' || $order->status == 'processing' || $order->status == 'delivered') active @endif">
                    <span class="icon"> <i class="fa fa-check"></i> </span>
                    <span class="text">Order Confirm</span>
                </div>
                <div class="step @if($order->status == 'processing' || $order->status == 'delivered') active @endif">
                    <span class="icon"> <i class="fa fa-truck"></i> </span>
                    <span class="text">Order Processing</span>
                </div>
                <div class="step @if($order->status == 'delivered') active @endif">
                    <span class="icon"><i class="fa fa-check"></i> </span>
                    <span class="text">Order Delivered</span>
                </div>
                
            </div>
            <hr>
            <hr>
            <a href="{{ route('userDashboard') }}" class="btn" data-abc="true"> <i class="fa fa-chevron-left"></i> Back to orders</a>
        </div>
    </article>
</div>
@endsection
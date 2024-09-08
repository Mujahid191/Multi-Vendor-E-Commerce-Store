@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Report Order Details</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Order: <span class="text-danger">{{ $order->invoice_number }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminReports') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="p-40 cart-totals ml-30">
                        <h5 class="fw-bold">Shipping Details</h5>
                        <hr>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="">
                                            <h6>Name</h6>
                                        </td>
                                        <td class="">
                                            <h6>{{ $order->name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Phone</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->phone }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Email</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->email }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Division</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->Division->name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">District</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->District->district_name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">State</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->State->state_name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Post Code</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->post_code }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Address</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->address }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Order Date</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->order_date }}</h6>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="p-40 cart-totals ml-30 mb-50">
                        <h5 class="fw-bold">Order Details</h5>
                            <hr>
                        <div class="divider-2 mb-30"></div>
                        <div class="table-responsive order_table checkout">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6>Name</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->name }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Phone</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->phone }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Payment Mathod</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ ucwords($order->payment_type) }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Invoice:</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-brand p-1">{{ $order->invoice_number }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="">Order Amout:</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="text-danger p-1">${{ $order->amount }}</h6>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="p-1">Status</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h6 class="badge bg-success">{{ ucwords($order->status) }}</h6>
                                        </td>
                                    </tr>

                                    @if ($order->status !== 'delivered')
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="p-1"></h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                @if ($order->status == 'pending')
                                                    <a href="{{ route('adminOrderStatus', ['orderID' => $order->id, 'status' => 'confirm']) }}" class="btn btn-success">Order Confirm</a>
                                                    @elseif ($order->status == 'confirm')
                                                    <a href="{{ route('adminOrderStatus', ['orderID' => $order->id, 'status' => 'processing']) }}" class="btn btn-success">Order Processing</a>
                                                    @elseif ($order->status == 'processing')
                                                    <a href="{{ route('adminOrderStatus', ['orderID' => $order->id, 'status' => 'delivered']) }}" class="btn btn-success">Order Delivered</a>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    @if ($order->return_reason != Null)
                                        <tr>
                                            <td class="cart_total_label">
                                                <h6 class="p-1">Return Order</h6>
                                            </td>
                                            <td class="cart_total_amount">
                                                @if ($order->return_order == 1)
                                                    <h6 class="badge bg-info fs-6 fw-normal">Pending</h6>
                                                    @elseif ($order->return_order == 2)
                                                    <h6 class="badge bg-success fs-6 fw-normal">Accepted</h6>
                                                    @elseif ($order->return_order == 3)
                                                    <h6 class="badge bg-danger fs-6 fw-normal">Rejected</h6>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Return Reason</td>
                                            <td><p class="text-danger">{{ $order->return_reason }}</p></td>
                                        </tr>
                                        </div>
                                        <tr>
                                            <td>
                                                <h6 class="p-1">Return</h6>
                                            </td>
                                            <td>
                                                <a href="{{ route('adminOrderReturnApproval', ['orderID' => $order->id, 'status' => 'rejected']) }}" class="btn btn-danger">Reject</a>
                                                <a href="{{ route('adminOrderReturnApproval', ['orderID' => $order->id, 'status' => 'accepted']) }}" class="btn btn-success">Accept</a>
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-30">
        <div class="col-lg-12">
            <div class="card radius-10">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div>
                            <h5 class="mb-0">Orders Summary</h5>
                        </div>
                        <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
                        </div>
                    </div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Product</th>
                                    <th>Vendor</th>
                                    <th>Code</th>
                                    <th>Colour</th>
                                    <th>Size</th>
                                    <th>Price</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orderItems as $item)
                                    <tr>
                                        <td><img src="{{ asset('images/products/thumbnails/' . $item->product->thumbnail) }}" alt="Product Image" width="50"></td>
                                        <td><h6 class="font-14">{{ $item->product->product_name }}</h6></td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->product->product_code }}</td>
                                        @if ( $item->color == Null)
                                            <td>--</td>
                                        @else
                                            <td>{{ $item->color }}</td>
                                        @endif
                                        @if ( $item->size == Null)
                                            <td>--</td>
                                        @else
                                            <td>{{ $item->size }}</td>
                                        @endif
                                        {{-- <td><span class="text-danger fw-bold">{{ $item->qty }} </span> x ${{ $item->price }} = </td> --}}
                                        <td>{{ $item->qty }} x ${{ $item->price }} 
                                            = <span class="text-brand fw-bold">${{ $item->qty * $item->price }} </span></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
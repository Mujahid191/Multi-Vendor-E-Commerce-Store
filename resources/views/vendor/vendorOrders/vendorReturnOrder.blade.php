@extends('vendor.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Returned Orders</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Orders</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($returnOrders as $item )
                        @if ($item->Order->return_reason !== Null)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->Order->invoice_number }}</td>
                                <td>{{ ucwords($item->Product->product_name) }}</td>
                                <td>${{ $item->price }}</td>
                                <td>{{ ucwords($item->Order->payment_type) }}</td>
                                <td>
                                    @if ($item->Order->return_order == 1)
                                        <span class="badge bg-info p-1">Pending</span>
                                        @elseif ($item->Order->return_order == 2)
                                        <span class="badge bg-success p-1">Accepted</span>
                                        @elseif ($item->Order->return_order == 3)
                                        <span class="badge bg-danger p-1">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('vendorOrdersDetails', $item->order_id  ) }}" class="btn btn-warning btn-sm"><i class="lni lni-eye"></i></a>
                                </td>
                            </tr>
                        @endif
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Invoice</th>
                            <th>Name</th>
                            <th>Amount</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
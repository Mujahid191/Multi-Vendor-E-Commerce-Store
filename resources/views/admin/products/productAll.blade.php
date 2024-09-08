@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Products</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Products <span class="badge bg-success p-2">{{ count($products) }}</span></li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminProductAdd') }}" class="btn btn-primary">Add Product</a>
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
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td>
                                    <img src="{{ empty($item->thumbnail) ? asset('backend/assets/images/no_image.jpg') :
                                    asset('images/products/thumbnails/' . $item->thumbnail) }}" alt="Brand Picture" width="50" class="border">
                                 </td>
                                <td>{{ $item->product_name }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>
                                    @if ($item->discount_price == NULL)
                                        <span class="badge bg-info p-2">No Discount</span>
                                        @else
                                        @php
                                            $discount = ($item->discount_price * 100 /$item->selling_price );
                                        @endphp
                                        <span class="badge bg-danger p-2">{{ round($discount) }}%</span>
                                    @endif
                                </td>
                                <td>{{ $item->product_quantity }}</td>
                                <td>
                                    @if ( $item->status == 1)
                                    <a href="{{ route('adminProductStatusUpdate', $item->id ) }}" title="Product Hide" 
                                        class="btn btn-success btn-sm"><i class="lni lni-eye"></i>
                                    </a>
                                    @else
                                        <a href="{{ route('adminProductStatusUpdate', $item->id ) }}" title="Product Show" 
                                            class="btn btn-danger btn-sm"><i class="bx bx-hide"></i>
                                        </a>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('adminProductEdit', $item->id ) }}" title="Edit Product" class="btn btn-warning btn-sm">
                                        <i class="bx bx-edit"></i>
                                    </a>
                                    <a href="{{ route('adminProductDelete', $item->id ) }}" title="Delete Product" class="btn btn-danger btn-sm ms-2" id="delete">
                                        <i class="bx bx-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Quantity</th>
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
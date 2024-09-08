@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendors</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Vendors</li>
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
                            <th>Image</th>
                            <th>Comment</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($reviews as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td><img src="{{ asset('images/products/thumbnails/' . $item->Product->thumbnail ) }}" alt="Shop Picture" width="40" class="border"></td>
                                <td>{{ Str::limit(ucfirst($item->comment), 25) }}</td>
                                <td>{{ Str::limit($item->Product->product_name, 25) }}</td>
                                <td>{{ $item->User->name }}</td>
                                <td>
                                    <button class="btn btn-success btn-sm radius-30 px-2">Published</button>
                                </td>
                                <td>
                                    <a href="{{ route('adminReviewDeleted', $item->id ) }}" id="delete" class="btn btn-danger btn-sm radius-30 px-3">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Shop Name</th>
                            <th>Username</th>
                            <th>Join Date</th>
                            <th>Email</th>
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
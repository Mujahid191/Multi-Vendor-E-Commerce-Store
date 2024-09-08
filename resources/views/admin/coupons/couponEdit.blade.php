@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Coupon</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminCouponsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminCouponUpdate') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf
            @method('put')

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Coupon Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="hidden" name="id" value="{{ $coupon->id }}">
                <input type="text" name="coupon_name" class="form-control" value="{{ $coupon->coupon_name }}" required>
                <div class="invalid-feedback">Please Enter Coupon Name.</div>
              </div>
            </div>
            
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Coupon Discount</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="coupon_discount" class="form-control" value="{{ $coupon->coupon_discount }}" placeholder="0%" required>
                <div class="invalid-feedback">Please Enter Coupon Discount.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Coupon validity</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="date" name="coupon_validity" class="form-control" value="{{ $coupon->coupon_validity }}" min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" required>
                <div class="invalid-feedback">Please Enter Select Date.</div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Update Coupon</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection
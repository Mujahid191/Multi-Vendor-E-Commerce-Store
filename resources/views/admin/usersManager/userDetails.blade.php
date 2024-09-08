@extends('admin.master')
@section('content')
<style>
    .select2-search__field{
	display: none !important;
}
</style>
<div class="page-content"> 
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">Customer Profile</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
        </ol>
      </nav>
    </div>
  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form method="post" action="{{ route('vendorStatus') }}">
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Username</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="hidden" name="id" class="form-control" value="{{ $customer->id }}" />
                        <input type="text" name="username" class="form-control" value="{{ $customer->username }}" disabled />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Shop Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="name" class="form-control" value="{{ $customer->name }}" disabled />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="email" class="form-control" value="{{ $customer->email }}" disabled/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phone" class="form-control" value="{{ $customer->phone }}" disabled/>
                    </div>
                  </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="address" class="form-control" value="{{ $customer->address }}" disabled/>
                    </div>
                </div>
  

                {{-- <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Vendor Status</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <div class="mb-3 select2-sm">
                        <select name="vendor_status" class="single-select">
                            <option {{ $customer->status == 'active' ? 'selected' : '' }} value="active">Active</option>
                            <option {{ $customer->status == 'inactive' ? 'selected' : '' }} value="inactive">Inactive</option>
                        </select>
                      </div>
                    </div>
                  </div> --}}

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Preview</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img id="preview" class="border" src="{{ empty( $customer->image ) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $customer->image) }}" alt="profile Picture" width="100">
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
                    </div>
                </div> --}}
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
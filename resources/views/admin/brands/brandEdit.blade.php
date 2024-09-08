@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Brand</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Edit Brand</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminBrandsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminBrandUpdate') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Brand Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="hidden" name="id" value="{{ $brand->id }}"/>
                <input type="text" name="brand_name" class="form-control" required value="{{ $brand->brand_name }}"/>
                <div class="invalid-feedback">Please Enter Brand Name.</div>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Brand Image</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="file" name="new_image" onchange="showImage()" id="image" class="form-control" />
                <input type="hidden" name="old_image" value="{{ $brand->brand_image }}">
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Preview</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <img id="preview" class="border" src="{{ empty($brand->brand_image) ?  asset('backend/assets/images/no_image.jpg') : 
                asset('images/brands/' . $brand->brand_image) }}" alt="Brand Picture" width="100">
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Update Brand</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection
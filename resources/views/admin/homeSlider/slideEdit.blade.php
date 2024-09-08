@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Slide</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Slide Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminSlidesAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminSlideUpdate') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf
            @method('put')
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Slide Title</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="hidden" name="id" value="{{ $slide->id }}"/>
                <input type="text" name="title" class="form-control" required value="{{ $slide->title }}"/>
                <div class="invalid-feedback">Please Enter Slide Title.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Slide Description</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="description" class="form-control" required autocomplete="off" value="{{ $slide->description }}"/>
                <div class="invalid-feedback">Please Enter Slide Description.</div>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Slide Image</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="file" name="new_image" onchange="showImage()" id="image" class="form-control" />
                <input type="hidden" name="old_image" value="{{ $slide->image }}">
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Preview</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <img id="preview" class="border" src="{{ empty($slide->image) ?  asset('backend/assets/images/no_image.jpg') : 
                asset('images/homeSlider/' . $slide->image) }}" alt="Slide Picture" width="100">
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Update Slide</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection
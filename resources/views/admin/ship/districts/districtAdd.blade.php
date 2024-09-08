@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">New Districts</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Districts</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminDistrictsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminDistrictSave') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Division Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <select name="division" class="single-select" required>
                  <option selected disabled>Select Division</option>
                  @foreach ($divisions as $item)
                    <option value="{{ $item->id}}">{{ $item->name}}</option>
                  @endforeach
                </select>
                <div class="invalid-feedback">Please select Division.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">District Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="district_name" class="form-control" required/>
                <div class="invalid-feedback">Please Enter District Name.</div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Add District</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection
@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">New Division</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Division</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminDivisionsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminStateSave') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Division Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <select name="division" class="single-select" onchange="loadDistrict()" id="division" required>
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
                <select name="district" class="single-select" id="district" required>
                  <option selected disabled>Select Districts</option>
                  {{-- @foreach ($districts as $item)
                    <option value="{{ $item->id}}">{{ $item->district_name}}</option>
                  @endforeach --}}
                </select>
                <div class="invalid-feedback">Please select District.</div>
              </div>
            </div>


            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">State Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="state_name" class="form-control" required/>
                <div class="invalid-feedback">Please Enter State Name.</div>
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Add Division</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
@endsection
@push('pageJs')
  <script>
    function loadDistrict() {
      let id = document.getElementById('division').value;
      fetch('/admin/state/getDistrict/' + id,{
      'method' : 'GET',
    }).then((response) => response.json())
    .then((data) =>{
        var option = `<option selected disabled value="0">Select District</option>`;
        data.forEach(e => {
			  option += `<option value="${e.id}">${e.district_name}</option>`;
		});
        document.getElementById("district").innerHTML = option;
    })
    .catch((error) => {
      console.log(error);
    });
  }
  </script>
@endpush
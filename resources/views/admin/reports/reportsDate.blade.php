@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Reports Search</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Get Reports By</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="row">
        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('adminReportByDate') }}"  method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Reports By Date</label>
                            <input type="date" name="date" class="form-control" required>
                            <div class="invalid-feedback">Please select date.</div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-sm">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('adminReportByDate') }}"  method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Report By Month</label>
                            <input type="month" name="month" class="form-control" required>
                            <div class="invalid-feedback">Please select Month.</div>
                        </div>
                        <button type="submit" class="btn btn-info btn-sm">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('adminReportByDate') }}"  method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Report By Year</label>
                            <input type="year" name="year" class="form-control" name="" id="datepicker" required>
                            <div class="invalid-feedback">Please select year.</div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-sm">Search</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-6">
            <div class="card radius-10">
                <div class="card-body">
                    <form action="{{ route('adminReportByDate') }}"  method="POST" class="needs-validation" novalidate>
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Report By User</label>
                            <select name="user_id" class="single-select" required>
                                <option disabled selected>Select Vendor</option>
                                @foreach ($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-sm">Search</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>
<script>
$("#datepicker").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years",
    autoclose:true //to close picker once year is selected
});
</script>
@endsection
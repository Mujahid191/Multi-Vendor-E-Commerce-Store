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
    <div class="breadcrumb-title pe-3">Admin Profile</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Profile Details</li>
        </ol>
      </nav>
    </div>
    <div class="ms-auto">
      <a href="{{ route('adminAllAdmins') }}" class="btn btn-primary">Back</a>
  </div>
  </div>
  <!--end breadcrumb-->
  <div class="container">
    <div class="main-body">
      <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <form method="post" action="{{ route('adminNewAdminUpdate') }}"  class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="hidden" name="id" value="{{ $admin->id }}" class="form-control" required/>
                        <input type="text" name="name" value="{{ $admin->name }}" class="form-control" required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">User Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="username" value="{{ $admin->username }}" class="form-control" required />
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="email" value="{{ $admin->email }}" class="form-control" required/>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phone" value="{{ $admin->phone }}" class="form-control" required/>
                    </div>
                  </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="address" value="{{ $admin->address }}" class="form-control" required/>
                    </div>
                </div>

                {{-- <div class="row mb-3">
                  <div class="col-sm-3">
                      <h6 class="mb-0">Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                      <input type="password" name="password" class="form-control" required/>
                  </div>
              </div> --}}

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Admin Role</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <div class="mb-3 select2-sm">
                        <select name="role" class="single-select">
                          @foreach ($roles as $role)
                            <option {{ $admin->roles->contains($role) ? 'selected' : '' }} value="{{ $role->name }}">{{ $role->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

                {{-- <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Preview</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img id="preview" class="border" src="{{ empty( $customer->image ) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $customer->image) }}" alt="profile Picture" width="100">
                    </div>
                </div> --}}

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-primary px-4">Update Admin</button>
                    </div>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
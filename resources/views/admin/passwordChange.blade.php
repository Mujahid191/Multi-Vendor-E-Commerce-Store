@extends('admin.master')
@section('content')
<div class="page-content"> 
  <!--breadcrumb-->
  <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
    <div class="breadcrumb-title pe-3">User Profile</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">User Profilep</li>
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
              <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Current Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input id="current_password" name="current_password" type="password" class="form-control" placeholder="Current Password" />
                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="list-unstyled text-danger m-0 p-0" />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">New Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input id="password" name="password" type="password" class="form-control" placeholder="New Password" />
                    <x-input-error :messages="$errors->updatePassword->get('password')" class="list-unstyled text-danger m-0 p-0" />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Confirm Password</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password"/>
                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="list-unstyled text-danger m-0 p-0" />
                  </div>
                </div>
  
                <div class="row">
                  <div class="col-sm-3"></div>
                  <div class="col-sm-9 text-secondary">
                    <button type="submit" class="btn btn-primary px-3 mb-3">Update Password</button>
                    @if (session('status') === 'password-updated')
                        <p
                            class="alert alert-success"
                        >{{ __('Password Update Successfully.') }}</p>
                    @endif
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
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
    <div class="breadcrumb-title pe-3">Settings</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">Website Details</li>
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
              <form method="post" action="{{ route('adminWebsiteSettingsUpdate') }}" enctype='multipart/form-data' class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Support Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="hidden" name="id" class="form-control" value="{{ $siteDetails->id }}" />
                        <input type="text" name="support_phone" class="form-control" value="{{ $siteDetails->support_phone }}" required/>
                        <div class="invalid-feedback">Please Enter Support Phone.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="phone" class="form-control" value="{{ $siteDetails->phone }}" required/>
                      <div class="invalid-feedback">Please Enter Phone.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="email" name="email" class="form-control" value="{{ $siteDetails->email }}" required/>
                      <div class="invalid-feedback">Please Enter Email.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Facebook</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="facebook" class="form-control" value="{{ $siteDetails->facebook }}"/>
                    </div>
                </div>
  
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Twitter</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="twitter" class="form-control" value="{{ $siteDetails->twitter }}" required/>
                        <div class="invalid-feedback">Please insert Twitter Link.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">YouTube</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="youtube" class="form-control" value="{{ $siteDetails->youtube }}" required/>
                        <div class="invalid-feedback">Please insert YouTube Link.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Instagram</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" name="instagram" class="form-control" value="{{ $siteDetails->instagram }}" required/>
                        <div class="invalid-feedback">Please insert Instagram Link.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="address" class="form-control" required>{{ $siteDetails->address}}</textarea>
                        <div class="invalid-feedback">Please Enter Address.</div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Copyright</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="copyright" class="form-control" required>{{ $siteDetails->copyright }}</textarea>
                        <div class="invalid-feedback">Please Enter Copyright.</div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Logo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="file" name="new_logo" onchange="showImage()" id="image" class="form-control" />
                      <input type="hidden" name="old_logo" value="{{ $siteDetails->logo }}">
                    </div>
                  </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Preview</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <img id="preview" class="border" src="{{ empty( $siteDetails->logo ) ? asset('backend/assets/images/no_image.jpg') : asset('images/logo/' . $siteDetails->logo) }}" alt="Logo" width="180" height="100">
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-9 text-secondary">
                        <button type="submit" class="btn btn-primary px-4">Save Changes</button>
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
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
    <div class="breadcrumb-title pe-3">Website SEO</div>
    <div class="ps-3">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb mb-0 p-0">
          <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">SEO Details</li>
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
              <form method="post" action="{{ route('adminWebsiteSeoUpdate') }}" enctype='multipart/form-data' class="needs-validation" novalidate>
                @csrf
                @method('put')
                <div class="row mb-3">
                    <div class="col-sm-3">
                        <h6 class="mb-0">Title</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="hidden" name="id" class="form-control" value="{{ $seo->id }}" />
                        <input type="text" name="title" class="form-control" value="{{ $seo->title }}" required/>
                        <div class="invalid-feedback">Please Enter Website Title.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Author</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="author" class="form-control" value="{{ $seo->author }}" required/>
                      <div class="invalid-feedback">Please Enter Author Name.</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Keywords</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input type="text" name="keywords" class="form-control" value="{{ $seo->keywords }}" required/>
                      <div class="invalid-feedback">Please Enter keywords.</div>
                    </div>
                </div>


                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Description</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <textarea name="description" class="form-control" required>{{ $seo->description }}</textarea>
                        <div class="invalid-feedback">Please Enter Description.</div>
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
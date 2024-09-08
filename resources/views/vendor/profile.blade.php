@extends('vendor.master')
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
        <div class="col-lg-4">
          <div class="card">
            <div class="card-body">
              <div class="d-flex flex-column align-items-center text-center">
                <img src="{{ empty( $user->image ) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $user->image) }}" alt="Admin" class="rounded-circle p-1 bg-primary" width="100">
                <div class="mt-3">
                  <h4>{{ $user->name }}</h4>
                  <p class="text-secondary mb-1">Full Stack Developer</p>
                  <p class="text-muted font-size-sm">{{ $user->address }}</p>
                </div>
              </div>
              <hr class="mt-3" />
              <ul class="list-group list-group-flush">
                <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe me-2 icon-inline"><circle cx="12" cy="12" r="10"></circle><line x1="2" y1="12" x2="22" y2="12"></line><path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path></svg>Website</h6>
                  <span class="text-secondary">https://codervent.com</span>
                </li>
                <li class="list-group-item mt-3 d-flex justify-content-between align-items-center flex-wrap">
                  <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook me-2 icon-inline text-primary"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path></svg>Facebook</h6>
                  <span class="text-secondary">codervent</span>
                </li>
              </ul>
            </div>
          </div>
        </div>
        <div class="col-lg-8">
          <div class="card">
            <div class="card-body">
              <form action="{{ route('vendorProfileUpdate') }}" method="POST" enctype='multipart/form-data'>
                @csrf
                @method('put')
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Username</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="hidden" name="id" class="form-control" value="{{ $user->id }}" />
                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" disabled />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Shop Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="email" class="form-control" value="{{ $user->email }}" />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Phone</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}" />
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Address</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}" />
                  </div>
                </div>

                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Shop Info</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <textarea name="shop_info" cols="shop_info" rows="3" class="form-control">{{ $user->shop_info }}</textarea>
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Image</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <input type="file" name="new_image" onchange="showImage()" id="image" class="form-control" />
                    <input type="hidden" name="old_image" value="{{ $user->image }}">
                  </div>
                </div>
  
                <div class="row mb-3">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Preview</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    <img id="preview" class="border" src="{{ empty( $user->image ) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $user->image) }}" alt="profile Picture" width="100">
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
<script>
  const showImage = () =>{
      let image = document.getElementById('image');
      let preview = document.getElementById('preview');
      console.log(preview);
      if(image.files && image.files[0]){
          const reader = new FileReader();
          reader.onload = function(e){
              preview.src = e.target.result;
          }
          reader.readAsDataURL(image.files[0]);
      }
  }
</script>
@endsection
@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">New Blog Post</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Post Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminBlogPostsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminBlogPostSave') }}" method="POST" enctype='multipart/form-data' class="needs-validation" novalidate>
            @csrf

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Category</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <select name="blog_category" class="single-select" required>
                  <option value="" disabled selected>Select Category</option>
                    @foreach ($blogCategories as $category)
                      <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                    @endforeach
                </select>                
                <div class="invalid-feedback">Please Select Category.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Title</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="title" class="form-control" required/>
                <div class="invalid-feedback">Please Enter Post Title.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Short Description</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="text" name="short_description" class="form-control" required/>
                <div class="invalid-feedback">Please Enter Short Description.</div>
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Long Description</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <textarea id="mytextarea" name="long_description" placeholder="Long Description" required></textarea>
                <div class="invalid-feedback">Please Enter Long Description.</div>
              </div>
            </div>
  
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Post Image</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <input type="file" name="post_image" onchange="showImage()" id="image" class="form-control" />
              </div>
            </div>

            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">Preview</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <img id="preview" class="border" src="{{ asset('backend/assets/images/no_image.jpg') }}" alt="post Picture" width="100">
              </div>
            </div>
  
            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Add Post</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.1/tinymce.min.js" integrity="sha512-w6swBvhbLNSmqMCzeK2Z4tqh/AbmGA/dQHEVqvJ9vt7L3x9TL0rCz1cFow50AfeNbkeGu6jk8k5PAVHHrMWhfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
// Long Description form
  tinymce.init({
    selector: '#mytextarea'
  });
</script>
@endsection
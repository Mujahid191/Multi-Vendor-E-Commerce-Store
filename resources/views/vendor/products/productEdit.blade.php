@extends('vendor.master')
@section('content')
{{-- <style>
  .select2-search__field{
display: none !important;
}
</style> --}}
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Product</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('vendorDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Product Details</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('vendorProductsAll') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
      <div class="card-body p-4">
        <form method="POST" action="{{ route('vendorProductUpdate') }}" enctype='multipart/form-data' class="needs-validation" novalidate>
          @csrf
          @method('put')
          <div class="row">
            <div class="col-lg-8">
              <div class="border border-3 p-4 rounded">
                <div class="mb-3">
                  <label class="form-label">Product Name</label>
                  <input type="hidden" name="id" value="{{ $product->id }}">
                  <input type="text" class="form-control" name="product_name" value="{{ $product->product_name }}" required>
                  <div class="invalid-feedback">Please enter Product Name.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Product Tags</label>
                  <input type="text" class="form-control" name="tags" data-role="tagsinput" value="{{ $product->tags }}" required>
                  <div class="invalid-feedback">Please Enter Tags.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Product Color</label>
                  <input type="text" class="form-control" name="color" data-role="tagsinput" value="{{ $product->product_color }}">
                </div>

                <div class="mb-3">
                  <label class="form-label">Product Size</label>
                  <input type="text" class="form-control" name="size" data-role="tagsinput" value="{{ $product->product_size }}">
                </div>

                <div class="mb-3">
                  <label class="form-label">Short Description</label>
                    <textarea class="form-control" name="short_description" placeholder="Short Description" required>{{ $product->short_description }}</textarea>
                  <div class="invalid-feedback">Please Enter short description.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Long Description</label>
                    <textarea id="mytextarea" name="long_description" placeholder="Long Description">{{ $product->long_description }}</textarea>
                  <div class="invalid-feedback">Please Enter product complete details.</div>
                </div>

                <div class="mb-3">
                  <label class="form-label">Product Thumbnail</label>
                  <input type="file" name="new_thumbnail" onchange="showImage()" id="image" class="form-control"/>
                  <input type="hidden" name="old_thumbnail" value="{{ $product->thumbnail }}">
                </div>

                <div class="mb-3">
                  <img id="preview" class="border" src="{{ empty($product->thumbnail) ? asset('backend/assets/images/no_image.jpg') : 
                  asset('images/products/thumbnails/' .$product->thumbnail) }}" alt="Product Picture" width="100">
                </div>

              </div>
            </div>
            <div class="col-lg-4">
              <div class="border border-3 p-4 rounded">
                <div class="row g-3">
                  <div class="col-md-6">
                    <label for="inputPrice" class="form-label">Product Price</label>
                    <input type="text" name="price" class="form-control" id="inputPrice" value="{{ $product->selling_price }}" required>
                  <div class="invalid-feedback">Please Enter product Price.</div>
                  </div>
                  <div class="col-md-6">
                  <label for="inputCompareatprice" class="form-label">Discount Price</label>
                  <input type="text" class="form-control" name="discount" id="inputCompareatprice" value="{{ $product->discount_price }}" required>
                  <div class="invalid-feedback">Please Enter Discount Price.</div>
                  </div>
                  <div class="col-md-12">
                  <label for="inputCostPerPrice" class="form-label">Product Code</label>
                  <input type="text" class="form-control" name="code" id="inputCostPerPrice" value="{{ $product->product_code }}" required>
                  <div class="invalid-feedback">Please Enter product Code.</div>
                  </div>
                  <div class="col-md-12">
                  <label for="inputStarPoints" class="form-label">Product Quantity</label>
                  <input type="text" class="form-control" name="quantity" id="inputStarPoints" value="{{ $product->product_quantity }}" required>
                  <div class="invalid-feedback">Please Enter Total Quantity.</div>
                  </div>
                  <div class="col-12">
                    <label for="inputProductType" class="form-label">Product Brand</label>
                    <div class="mb-3 select2-sm">
                      <select name="brand" class="single-select">
                        <option disabled selected>Select Brand</option>
                        @foreach ($brands as $item)
                          <option {{ $product->brand_id == $item->id ? 'selected' : '' }} value="{{ $item->id}}">{{ $item->brand_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                  <label for="inputVendor" class="form-label">Product Category</label>
                    <div class="mb-3 select2-sm">
                      <select name="category" class="single-select" onchange="getSubcategories()" id="mainCategory">
                        <option selected disabled>Select Category</option>
                        @foreach ($categories as $item)
                          <option {{ $product->category_id == $item->id ? 'selected' : '' }} value="{{ $item->id}}">{{ $item->category_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="col-12">
                    <label for="inputCollection" class="form-label">Product Sub Category</label>
                    <div class="mb-3 select2-sm">
                      <select name="subcategory" class="single-select" id="subCategory">
                        @foreach ($subcategory as $item)
                          <option {{ $product->subcategory_id == $item->id ? 'selected' : '' }} value="{{ $item->id}}">{{ $item->subCategory_name}}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                  <div class="col-12">
                    <label for="inputCollection" class="form-label">Vendor</label>
                    <div class="mb-3 select2-sm">
                      <select name="vendor" class="single-select">
                          <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" name="featured_id" type="checkbox" value="1" id="featured"
                       {{ $product->featured == 1 ? 'checked' : '' }}>
                      <label class="form-check-label" for="featured">Featured</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" name="hot_deals" type="checkbox" value="1" id="hot_deals"
                      {{ $product->hot_deals == 1 ? 'checked' : '' }}>
                      <label class="form-check-label" for="hot_deals">Hot Deals</label>
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" name="special_deals" type="checkbox" value="1" id="special_deals"
                      {{ $product->special_deals == 1 ? 'checked' : '' }}>
                      <label class="form-check-label" for="special_deals">Special Deals</label>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                      <input class="form-check-input" name="special_offer" type="checkbox" value="1" id="special_offer"
                      {{ $product->special_offer == 1 ? 'checked' : '' }}>
                      <label class="form-check-label" for="special_offer">Special Offer</label>
                    </div>
                  </div>

                  <div class="col-12">
                    <div class="d-grid">
                      <button type="submit" class="btn btn-primary">Save Product</button>
                    </div>
                  </div>
                  
                </div> 
              </div>
            </div>
          </div><!--end row-->
        </form>
      </div>
    </div>

    <div class="breadcrumb-title mb-3 pe-3">Product Images</div>
    <div class="card">
      <div class="card-body">
        <form method="POST" action="{{ route('vendorProductUpdateMultiImage') }}" enctype='multipart/form-data'>
          @csrf
          @method('put')
          <table class="table mb-0">
            <thead>
              <tr>
                <th>Sr.</th>
                <th>Image</th>
                <th>Choose Image</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach ( $multiImages as $key => $image )
                <tr>
                  <th>{{ $key+1 }}</th>
                  <td>
                    <img src="{{ empty($image->image_name) ? asset('backend/assets/images/no_image.jpg') :
                     asset('images/products/multiImages/' . $image->image_name ) }}" alt="Product Image" width="50" class="border"></td>
                  <td>
                    <input type="file" name="multi_image[{{ $image->id }}]" class="form-control w-50">
                  </td>
                  <td>
                    <button type="submit" class="btn btn-warning btn-sm">Update</button>
                    <a href="{{ route('vendorProductDeleteMultiImage', $image->id ) }}" class="btn btn-danger btn-sm ms-3" id="delete">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </form>
      </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.8.1/tinymce.min.js" integrity="sha512-w6swBvhbLNSmqMCzeK2Z4tqh/AbmGA/dQHEVqvJ9vt7L3x9TL0rCz1cFow50AfeNbkeGu6jk8k5PAVHHrMWhfA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
  const showMultiImages = () => {
      let image = document.getElementById('MultiImages');
      let previewContainer = document.getElementById('preview_container');

      if (previewContainer) {
          // Clear existing previews
          previewContainer.innerHTML = '';

          if (image.files && image.files.length > 0) {
              image.files.forEach(file => {
                  const reader = new FileReader();
                  const img = document.createElement('img');
                  img.className = 'preview-image'; // Optional: Apply a class for styling
                  reader.onload = function (e) {
                      img.src = e.target.result;
                  };
                  reader.readAsDataURL(file);

                  // Append the img element to the container
                  previewContainer.appendChild(img);
              });
          }
      }
  }
// Long Description form
  tinymce.init({
    selector: '#mytextarea'
  });

  // Get Sub Categories
  function getSubcategories () {
    const id = document.getElementById('mainCategory').value;
    fetch('/vendor/product/getSubcategory/' + id,{
      'method' : 'GET',
    })
    .then((response) => response.json())
    .then((data) =>{
        var option = `<option selected disabled value="0">Select Sub Category</option>`;
        data.forEach(e => {
			  option += `<option value="${e.id}">${e.subCategory_name}</option>`;
		});
        document.getElementById("subCategory").innerHTML = option;
    })
    .catch((error) => {
      console.log(error);
    });
  }
  // window.onload(getSubcategories());
</script>
@endsection
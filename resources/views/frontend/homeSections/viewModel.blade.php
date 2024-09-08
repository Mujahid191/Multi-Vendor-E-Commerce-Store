<div class="modal fade custom-modal" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                        <div class="detail-gallery">
                            <span class="zoom-icon"><i class="fi-rs-search"></i></span>
                            <!-- MAIN SLIDES -->
                            <div class="product-image-slider">
                                <figure class="border-radius-10">
                                    <img src="" alt="product image" id="thumbnail"/>
                                </figure>
                            </div>
                            {{-- <!-- THUMBNAILS -->
                            <div class="slider-nav-thumbnails" id="slider">
                                <div><img src="" alt="product image" /></div>
                            </div> --}}
                        </div>
                        <!-- End Gallery -->
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                        <div class="detail-info pr-30 pl-30" id="detail_data">
                            <span class="stock-status out-stock"> Sale Off </span>
                            <h3 class="title-detail"><a href="shop-product-right.html" class="text-heading" id="pname"></a></h3>
                            <div class="product-detail-rating">
                                <div class="product-rate-cover text-end">
                                    <div class="product-rate d-inline-block">
                                        <div class="product-rating" style="width: 90%"></div>
                                    </div>
                                    <span class="font-small ml-5 text-muted"> (32 reviews)</span>
                                </div>
                            </div>
                            <div class="clearfix product-price-cover">
                                <div class="product-price primary-color float-left">
                                    <span class="current-price text-brand" id="price"></span>
                                    <span>
                                        <span class="save-price font-md color3 ml-15" id="discount_percentage"></span>
                                        <span class="old-price font-md ml-15" id="discount_price"></span>
                                    </span>
                                </div>
                            </div>

                            <div class="attr-detail attr-size mb-20" id="sizes">
                                <strong class="mr-10" style="width: 45px" >Size </strong>
                                <select class="nice-select w-25" id="size">
                                </select>
                            </div>

                            <div class="attr-detail attr-size mb-20" id="colors">
                                <strong class="mr-10" style="width: 45px">Colour </strong>
                                <select class="nice-select w-25" id="color">
                                </select>
                            </div>

                            <div class="detail-extralink mb-30">
                                <div class="detail-qty border radius">
                                    <a href="#" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>
                                    <input type="text" name="quantity" class="qty-val" value="1" min="1" id="quantity">
                                    <a href="#" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>
                                </div>
                                <div class="product-extra-link2">
                                    <input type="hidden" id="modelProductId" value="">
                                    <button type="submit" class="button button-add-to-cart" onclick="modalAddToCart()"><i class="fi-rs-shopping-cart"></i>Add to cart</button>
                                </div>
                            </div>
                            <div class="font-xs">
                                <ul class="mr-50 float-start">
                                    <li class="mb-5">Brand: <span class="text-brand" id="brand"></span></li>
                                    <li class="mb-5">Category: <span class="text-brand" id="category"></span></li>
                                    <li class="mb-5">By: <span class="text-brand" id="shop_name"></span></li>
                                </ul>

                                <ul class="float-start">
                                    <li class="mb-5">Code: <span class="text-brand" id="code"></span></li>
                                    <li class="mb-5">Stock: <span class="text-brand" id="stock"></span></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Detail Info -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('modelJs')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add click event listener to each product item
        var productItems = document.querySelectorAll('.product-item');
        
        productItems.forEach(function (productItem) {
            productItem.addEventListener('click', function (event) {
                event.preventDefault();
                // Get the product ID from the data attribute
                var productId = productItem.getAttribute('data-product-id');
                // Fetch product data from the server
                fetch('/quick/view/products/' + productId)
                    .then(response => response.json())
                    .then(data => {
                        // Update the quick view modal content with the fetched data
                        updateQuickViewModal(data);
                    })
                    .catch(error => console.error('Error fetching product data:', error));
            });
        });
    });
    function updateQuickViewModal(data) {
        // All Variables
        let price = document.getElementById('price');
        let discount_price = document.getElementById('discount_price');
        let discount_percentage = document.getElementById('discount_percentage');
        let brand = document.getElementById('brand');
        let shop = document.getElementById('shop_name');
        let colors = document.getElementById('colors');
        let sizes = document.getElementById('sizes');
        let stock = document.getElementById('stock');
        let productID = document.getElementById('modelProductId');  

        var product = data['product'];
        // Update other elements as needed
        document.getElementById('pname').innerText = product.product_name;
        document.getElementById('category').innerText = product.category.category_name;
        document.getElementById('code').innerText = product.product_code;
        document.getElementById('quantity').value = 1;
        productID.value = product.id;
        document.getElementById('thumbnail').src = "{{ asset('images/products/thumbnails/') }}/" + product.thumbnail;
        // Brand Condition
        product.brand_id == null ? brand.innerText = "No Brand" : brand.innerText = product.brand.brand_name;

        // price condition
        if( product.discount_price !== null){
            price.innerText = '$' + (product.selling_price - product.discount_price);
            discount_percentage.innerText = Math.round((product.discount_price / product.selling_price) * 100) + "%";
            discount_price.innerText = '$' + product.selling_price;
        }else{
            price.innerText = '$' + product.selling_price;
            discount_percentage.innerText = '';
            discount_price.innerText = '';
        }
        // Sub Category
        if(product.user.name == null){
            shop.innerText = 'Owner';
        }else{
            shop.innerText = product.user.name;
        }

        // Stock
        if( product.product_quantity > 0){
            stock.innerText = product.product_quantity + ' Items';
        }else{
            stock.innerText = 'Sold Out';
        }
        // color
        if( product.product_color == null) {
            document.getElementById('color').innerHTML = '';
            colors.style.display = 'none';
        }else{
            colors.style.display = 'block';
            document.getElementById('color').innerHTML = '';
            data['colors'].forEach( (e) => {
               document.getElementById('color').innerHTML +=  `<option value="${e}">${e}</option>`;
            })
        }

        // sizes
        if( product.product_size == null) {
            document.getElementById('size').innerHTML = '';
            sizes.style.display = 'none';
        }else{
            sizes.style.display = 'block';
            document.getElementById('size').innerHTML = '';
            data['sizes'].forEach( (e) => {
               document.getElementById('size').innerHTML +=  `<option value="${e}">${e}</option>`;
            })
        }
    }

    function modalAddToCart() {
        let quantity = document.getElementById('quantity').value;
        let color = document.getElementById('color').value;
        let size = document.getElementById('size').value;
        let productID = document.getElementById('modelProductId').value;
        const data = {productID, quantity, color, size};
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        fetch('/product/add/cart',{
            'method' : 'POST',
            'body' : JSON.stringify(data),
            headers: {
			'Content-type' : 'application/json',
            'X-CSRF-TOKEN': csrfToken,
			}
        })
        .then( (response) => response.json())
        .then( (result) =>{
            miniCartData();
            document.getElementById('quickViewModal').click();
        }).catch( (error) => {
            window.location.href = '/login';
        })
    }
</script>
@endpush
@extends('frontend.master')
@section('content')
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
            <span></span> My Account
        </div>
    </div>
</div>
<div class="page-content pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 m-auto">
                <div class="row">
                    <div class="col-md-3">
                        <div class="dashboard-menu">
                            <ul class="nav flex-column" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#return_orders" role="tab" aria-controls="return_orders" aria-selected="false"><i class="fi-rs-shopping-bag mr-10"></i>Return Orders</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="track-orders-tab" data-bs-toggle="tab" href="#track-orders" role="tab" aria-controls="track-orders" aria-selected="false"><i class="fi-rs-shopping-cart-check mr-10"></i>Track Your Order</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="address-tab" data-bs-toggle="tab" href="#address" role="tab" aria-controls="address" aria-selected="true"><i class="fi-rs-marker mr-10"></i>My Address</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="fi-rs-user mr-10"></i>Account details</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password" role="tab" aria-controls="change-password" aria-selected="true"><i class="fi-rs-user mr-10"></i>Change Password</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content account dashboard-content pl-50">
                            <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                                @if (session('status') === 'password-updated')
                                    <p class="alert alert-success">{{ __('Password Update Successfully.') }}</p>
                                @elseif (session('status') === 'profile-updated')
                                    <p class="alert alert-success">{{ __('Profile Update Successfully.') }}</p>
                                @elseif (session('status') === 'invoice-invalid')
                                    <p class="alert alert-danger">{{ __('Your Invoice number is Invalid.') }}</p>
                                @endif
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Hello {{ $user->name }}</h3>
                                    </div>
                                    <div class="card-body">
                                        <p>
                                            From your account dashboard. you can easily check &amp; view your <a href="#">recent orders</a>,<br />
                                            manage your <a href="#">shipping and billing addresses</a> and <a href="#">edit your password and account details.</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                            {{-- All user order --}}
                            <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Your Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Status</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($orders as $key => $order)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $order->invoice_number }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ ucwords($order->payment_type) }}</td>
                                                            <td>${{ $order->amount }} for <span class="text-danger fw-bold">{{ count($order->OrderItem) }}</span> Items</td>
                                                            <td><span class="badge bg-brand">{{ ucwords($order->status) }}</span>
                                                                @if ($order->return_reason !== Null)
                                                                <span class="badge bg-danger">Return</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('userOrderDetails', $order->id ) }}" class="btn-small" title="View"><i class="fi-rs-eye fs-6"></i></a>
                                                                <a href="{{ route('userInvoiceDownload', $order->id) }}" class="btn-small ml-20" title="Invoice Downlaod"><i class="fi-rs-download fs-6"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- user return orders --}}
                            <div class="tab-pane fade" id="return_orders" role="tabpanel" aria-labelledby="orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Return Orders</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Order</th>
                                                        <th>Date</th>
                                                        <th>Payment</th>
                                                        <th>Total</th>
                                                        <th>Return</th>
                                                        <th>Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($returnOrders as $key => $order)
                                                        <tr>
                                                            <td>{{ $key+1 }}</td>
                                                            <td>{{ $order->invoice_number }}</td>
                                                            <td>{{ $order->order_date }}</td>
                                                            <td>{{ ucwords($order->payment_type) }}</td>
                                                            <td>${{ $order->amount }} for <span class="text-danger fw-bold">{{ count($order->OrderItem) }}</span> Items</td>
                                                            <td>
                                                                @if ($order->return_order == 1)
                                                                    <span class="badge bg-info">Pending</span>
                                                                    @elseif ($order->return_order == 2)
                                                                    <span class="badge bg-brand">Success</span>
                                                                    @elseif ($order->return_order == 3)
                                                                    <span class="badge bg-danger">Rejected</span>
                                                                @endif
                                                            </td>
                                                            <td>
                                                                <a href="{{ route('userOrderDetails', $order->id ) }}" class="btn-small" title="View"><i class="fi-rs-eye fs-6"></i></a>
                                                                <a href="{{ route('userInvoiceDownload', $order->id) }}" class="btn-small ml-20" title="Invoice Downlaod"><i class="fi-rs-download fs-6"></i></a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="track-orders" role="tabpanel" aria-labelledby="track-orders-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="mb-0">Orders Tracking</h3>
                                    </div>
                                    <div class="card-body contact-from-area">
                                        <p>To track your order please enter your OrderID in the box below and press "Track" button. This was given to you on your receipt and in the confirmation email you should have received.</p>
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <form class="contact-form-style mt-30 mb-50" action="{{ route('userOrderTrack') }}" method="post">
                                                    @csrf
                                                    <div class="input-style mb-20">
                                                        <label>Invoice Number</label>
                                                        <input name="invoice_number" placeholder="Enter your invoice number" type="text" />
                                                    </div>
                                                    <button class="submit bg-brand submit-auto-width" type="submit">Track Order</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="card mb-3 mb-lg-0">
                                            <div class="card-header">
                                                <h3 class="mb-0">Billing Address</h3>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    3522 Interstate<br />
                                                    75 Business Spur,<br />
                                                    Sault Ste. <br />Marie, MI 49783
                                                </address>
                                                <p>New York</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="mb-0">Shipping Address</h5>
                                            </div>
                                            <div class="card-body">
                                                <address>
                                                    4299 Express Lane<br />
                                                    Sarasota, <br />FL 34249 USA <br />Phone: 1.941.227.4444
                                                </address>
                                                <p>Sarasota</p>
                                                <a href="#" class="btn-small">Edit</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Account Details</h5>
                                    </div>
                                    <div class="card-body">

                                        <form method="POST" action="{{ route('userUpdate') }}" enctype='multipart/form-data'>
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="form-group col-md-6">
                                                    <label>Full Name <span class="required">*</span></label>
                                                    <input class="form-control" name="name" type="text" value="{{ $user->name }}" />
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Username <span class="required">*</span></label>
                                                    <input class="form-control" name="username" type="text" value="{{ $user->username }}" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Email Address <span class="required">*</span></label>
                                                    <input class="form-control" name="email" type="email" value="{{ $user->email }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Phone <span class="required">*</span></label>
                                                    <input class="form-control" name="phone" type="text" value="{{ $user->phone }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Address <span class="required">*</span></label>
                                                    <input class="form-control" name="address" type="text" value="{{ $user->address }}" />
                                                </div>
                                                <div class="form-group col-md-12">
                                                    <label>Image <span class="required">*</span></label>
                                                    <input type="file" name="new_image" onchange="showImage()" id="image" class="form-control" style="height: 37px" />
                                                    <input type="hidden" name="old_image" value="{{ $user->image }}">
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label class="form-label w-100">Preview</label>
                                                    <img id="preview" class="border" src="{{ empty( $user->image ) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $user->image) }}" alt="profile Picture" width="100">
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="change-password" role="tabpanel" aria-labelledby="change-password-tab">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Change Password</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="post" action="{{ route('password.update') }}" class="needs-validation" novalidate>
                                            @csrf
                                            @method('put')
                                            <div class="row">
                                                <div class="form-group">
                                                    <label>Current Password <span class="required">*</span></label>
                                                    <input id="current_password" name="current_password" type="password" class="form-control" placeholder="Current Password" required/>
                                                    <div class="invalid-feedback">Please Enter Current Password.</div>
                                                    <x-input-error :messages="$errors->updatePassword->get('current_password')" class="list-unstyled text-danger m-0 p-0" />
                                                </div>

                                                <div class="form-group">
                                                    <label>New Password <span class="required">*</span></label>
                                                    <input id="password" name="password" type="password" class="form-control" placeholder="New Password" required/>
                                                    <div class="invalid-feedback">Please Enter New Password.</div>
                                                    <x-input-error :messages="$errors->updatePassword->get('password')" class="list-unstyled text-danger m-0 p-0" />
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label>Confirm Password <span class="required">*</span></label>
                                                    <input id="password_confirmation" name="password_confirmation" type="password" class="form-control" placeholder="Confirm Password" required/>
                                                    <div class="invalid-feedback">Please Enter Confirm Password.</div>
                                                    <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="list-unstyled text-danger m-0 p-0" />
                                                </div>

                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-fill-out submit font-weight-bold" name="submit" value="Submit">Save Change</button>
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
        </div>
    </div>
</div>
<script>
    const showImage = () =>{
        let image = document.getElementById('image');
        let preview = document.getElementById('preview');
        if(image.files && image.files[0]){
            const reader = new FileReader();
            reader.onload = function(e){
                preview.src = e.target.result;
            }
            reader.readAsDataURL(image.files[0]);
        }
    }

    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
    })();
  </script>
@endsection

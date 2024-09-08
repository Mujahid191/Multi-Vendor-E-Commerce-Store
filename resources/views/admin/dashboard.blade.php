@extends('admin.master')
@section('content')
<div class="page-content">

  <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    @php
        $date = date('d-m-y');
        $orders = \App\Models\Order::latest()->limit(10)->get();
        $pendingOrders = \App\Models\Order::where('status', 'pending')->count();
        $todayOrdersTotalAmount = \App\Models\Order::where('order_date', $date)->sum('amount');
        $todayOrdersAverageAmount = \App\Models\Order::where('order_date', $date)->avg('amount');

        $month = date('F');
        $monthOrdersTotalAmount = \App\Models\Order::where('order_month', $month)->sum('amount');
        $monthOrdersAverageAmount = \App\Models\Order::where('order_month', $month)->avg('amount');
        
        $year = date('Y');
        $yearOrdersTotalAmount = \App\Models\Order::where('order_year', $year)->sum('amount');
        $yearOrdersAverageAmount = \App\Models\Order::where('order_year', $year)->avg('amount');
        
        $Vendors = \App\Models\User::where('role', 'vendor')->count();
        $Users = \App\Models\User::where('role', 'user')->count();

    @endphp

    <div class="col">
        <div class="card radius-10 bg-gradient-deepblue">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="mb-0 text-white">${{ $todayOrdersTotalAmount }}</h5>
                    <div class="ms-auto">
                        <i class='bx bx-dollar fs-3 text-white'></i>
                    </div>
                </div>
                <div class="progress my-3 bg-light-transparent" style="height:3px;">
                    <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                </div>
                <div class="d-flex align-items-center text-white">
                    <p class="mb-0">Today Sale</p>
                    {{-- <p class="mb-0 ms-auto">+{{ $todayOrdersAverageAmount }}%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
                </div>
            </div>
        </div>
    </div>

    <div class="col">
        <div class="card radius-10 bg-gradient-orange">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">${{ $monthOrdersTotalAmount }}</h5>
                <div class="ms-auto">
                    <i class='bx bx-dollar fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">{{ $month }} Sale</p>
                {{-- <p class="mb-0 ms-auto">+{{ $monthOrdersAverageAmount }}%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
            </div>
        </div>
    </div>
    </div>

    <div class="col">
    <div class="card radius-10 bg-gradient-ohhappiness">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">${{ $yearOrdersTotalAmount }}</h5>
                <div class="ms-auto">
                    <i class='bx bx-dollar fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">{{ $year }} Sale</p>
                {{-- <p class="mb-0 ms-auto">+{{ $yearOrdersTotalAmount }}%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
            </div>
        </div>
    </div>
    </div>

    <div class="col">
        <div class="card radius-10 bg-gradient-ibiza">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">{{ $pendingOrders }}</h5>
                <div class="ms-auto">
                <i class='bx bx-cart fs-3 text-white'></i>
                    {{-- <i class='bx bx-envelope fs-3 text-white'></i> --}}
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Pending Orders</p>
                {{-- <p class="mb-0 ms-auto">+2.2%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
            </div>
        </div>
    </div>
    </div>

    <div class="col">
    <div class="card radius-10 bg-gradient-ohhappiness">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">{{ $Vendors }}</h5>
                <div class="ms-auto">
                    <i class='bx bx-group fs-3 text-white'></i>
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Total Vendors</p>
                {{-- <p class="mb-0 ms-auto">+{{ $yearOrdersTotalAmount }}%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
            </div>
        </div>
    </div>
    </div>
    <div class="col">
    <div class="card radius-10 bg-gradient-deepblue">
        <div class="card-body">
            <div class="d-flex align-items-center">
                <h5 class="mb-0 text-white">{{ $Users }}</h5>
                <div class="ms-auto">
                    <i class='bx bx-group fs-3 text-white'></i>
                    {{-- <i class='bx bx-cart fs-3 text-white'></i> --}}
                </div>
            </div>
            <div class="progress my-3 bg-light-transparent" style="height:3px;">
                <div class="progress-bar bg-white" role="progressbar" style="width: 55%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <div class="d-flex align-items-center text-white">
                <p class="mb-0">Today Customers</p>
                {{-- <p class="mb-0 ms-auto">+{{ $todayOrdersAverageAmount }}%<span><i class='bx bx-up-arrow-alt'></i></span></p> --}}
            </div>
        </div>
    </div>
    </div>
  </div><!--end row-->

  <div class="row">
    <div class="card radius-10">
      <div class="card-body">
          <div class="d-flex align-items-center">
              <div>
                  <h5 class="mb-0">Orders Summary</h5>
              </div>
              <div class="font-22 ms-auto"><i class="bx bx-dots-horizontal-rounded"></i>
              </div>
          </div>
          <hr>
          <div class="table-responsive">
              <table class="table align-middle mb-0">
                  <thead class="table-light">
                      <tr>
                          <th>No.</th>
                          <th>Invoice</th>
                          <th>Customer</th>
                          <th>Date</th>
                          <th>Price</th>
                          <th>Status</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $order)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $order->invoice_number }}</td>
                        <td>{{ $order->User->name }}</td>
                        <td>{{ $order->order_date }}</td>
                        <td>${{ $order->amount }}</td>
                        <td>
                            @if ($order->status == 'pending')
                                <div class="badge rounded-pill bg-light-secondary text-secondary w-100">Pending</div>
                                @elseif ($order->status == 'confirm')
                                <div class="badge rounded-pill bg-light-info text-info w-100">Confirm</div>
                                @elseif ($order->status == 'processing')
                                <div class="badge rounded-pill bg-light-warning text-dark w-100">Processing</div>
                                @elseif ($order->status == 'delivered')
                                <div class="badge rounded-pill bg-light-success text-success w-100">Delivered</div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('adminOrderDetails', $order->id ) }}" class="btn bg-light-warning btn-sm"><i class="lni lni-eye"></i></a>
                        </td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>

</div>
    
@endsection
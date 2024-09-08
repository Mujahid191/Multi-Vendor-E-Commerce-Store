@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Vendors</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Vendors</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image</th>
                            <th>Shop Name</th>
                            <th>Join Date</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vendors as $key => $item )
                            <tr>
                                <td>{{ $key+1 }}</td>
                                <td><img src="{{ empty($item->image) ? asset('backend/assets/images/no_image.jpg') : asset('images/users/' . $item->image) }}" alt="Shop Picture" width="40" class="border"></td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->created_at->format('Y') }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    @if($item->last_active_at >= now()->subSeconds(30))
                                        <button class="btn btn-success btn-sm radius-30 px-3">Online</button>
                                    @elseif ($item->last_active_at < now()->subSeconds(30) && $item->last_active_at != Null)
                                        @php
                                        $lastActiveTime = new \Carbon\Carbon($item->last_active_at);
                                        $timeDifference = $lastActiveTime->diffForHumans();
                                        @endphp               
                                        <span class="badge bg-danger radius-30 p-2">{{ $timeDifference }}</span>
                                    @else
                                    <span class="badge bg-danger radius-30 p-2">Offline</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('adminVendorDetails', $item->id ) }}" class="btn btn-info btn-sm radius-30 px-3">Vendors Details</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Image</th>
                            <th>Shop Name</th>
                            <th>Join Date</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
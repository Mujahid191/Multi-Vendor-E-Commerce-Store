@extends('admin.master')
@section('content')
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Roles & Permissions</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Roles & Permissions</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminRolePermissionAdd') }}" class="btn btn-primary">Add Role & Permission</a>
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
                            <th>Role Name</th>
                            <th>Permission Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $item )
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucwords($item->name) }}</td>
                                <td>
                                @foreach ( $item->permissions as $permission )
                                    <span class="badge bg-danger">{{ ucwords($permission->name ) }}</span>
                                @endforeach
                                </td>
                                <td>
                                    <a href="{{ route('adminRolePermissionEdit', $item->id ) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="{{ route('adminRolePermissionDelete', $item->id ) }}" class="btn btn-danger btn-sm ms-3" id="delete">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Sr.No</th>
                            <th>Role Name</th>
                            <th>Permission Name</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
@extends('admin.master')
@section('content')

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Edit Permission</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="{{ route('adminDashboard') }}"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">New Permission Name</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <a href="{{ route('adminRolesPermissions') }}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="card">
        <div class="card-body">
          <form action="{{ route('adminRolePermissionUpdate') }}" method="POST" class="needs-validation" novalidate>
            @csrf
            <div class="row mb-3">
              <div class="col-sm-3">
                <h6 class="mb-0">All Roles</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <select name="role" class="single-select" required>
                  <option disabled selected>Select Role</option>

                  @foreach ($roles as $role)
                    <option {{ $rolePermission->id == $role->id ? 'selected' : '' }} value="{{ $role->id }}">{{ $role->name }}</option>
                  @endforeach

                </select>
                <div class="invalid-feedback">Please select Role.</div>
              </div>
            </div>
            <div class="row mb-3">
                <div class="col-sm-3">
                    <h6 class="mb-0">All Permissions</h6>
                </div>
                <div class="col-sm-9 text-secondary">
                    <!-- Master Checkbox for Select All -->
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="selectAll">
                        <label class="form-check-label" for="selectAll">Select All</label>
                    </div>

                    <!-- Individual Permissions Checkboxes -->
                    @foreach ($permissions as $permission)
                        <div class="form-check">
                            <input {{ $rolePermission->permissions->contains($permission) ? 'checked' : '' }} class="form-check-input permission-checkbox" name="permission_ids[]" type="checkbox" value="{{ $permission->id }}" id="{{ $permission->id }}">
                            <label class="form-check-label" for="{{ $permission->id }}">{{ ucwords($permission->name) }}</label>
                        </div>
                    @endforeach

                    <div class="invalid-feedback">Please Select at least one permission.</div>
                </div>
            </div>


            <div class="row">
              <div class="col-sm-3"></div>
              <div class="col-sm-9 text-secondary">
                <button type="submit" class="btn btn-primary px-4">Assign Role Permission</button>
              </div>
            </div>
          </form>
  
        </div>
      </div>
</div>
<script>
  // JavaScript (without jQuery)
  document.getElementById('selectAll').addEventListener('change', function () {
      var checkboxes = document.querySelectorAll('.permission-checkbox');
      checkboxes.forEach(function (checkbox) {
          checkbox.checked = document.getElementById('selectAll').checked;
      });
  });

  // If you are using jQuery
  /*
  $('#selectAll').change(function () {
      $('.permission-checkbox').prop('checked', $(this).prop('checked'));
  });
  */
</script>
@endsection
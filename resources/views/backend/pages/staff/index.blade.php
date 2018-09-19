@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Staff</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Staffs</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Staff</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Staff</button>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($staffs) > 0)
                @foreach($staffs as $staff)
                  <tr>
                    <td>{{ $staff->name }}</td>
                    <td>{{ $staff->phone }}</td>
                    <td>{{ $staff->address }}</td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $staff->id }}" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade" id="editModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Staff</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.staff.update', $staff->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" name="name" id="name" class="form-control" value="{{ $staff->name }}" placeholder="Staff Name" required>
                                </div>

                                <div class="form-group">
                                  <label for="phone">Phone</label>
                                  <input type="text" name="phone" id="phone" class="form-control" value="{{ $staff->phone }}" placeholder="Staff Phone" required>
                                </div>

                                <div class="form-group">
                                  <label for="address">Address</label>
                                  <input type="text" name="address" id="address" class="form-control" value="{{ $staff->address }}" placeholder="Staff Address" required>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Edit Staff</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $staff->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $staff->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this staff ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.staff.delete', $staff->id) }}" method="post">
                                @csrf
                                <button type="submit" class="btn btn-outline-danger btn-sm"><i class="fa fa-trash"></i> Confirm</button>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>
                    </td>
                  </tr>
                @endforeach
              @endif
            </tbody>
          </table>
        </div>
      </div><!-- end card-->
    </div>
  </div>

  <!-- Add Modal -->
  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Add Staff</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.staff.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Staff Name" required>
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" name="phone" id="phone" class="form-control" placeholder="Staff Phone" required>
            </div>

            <div class="form-group">
              <label for="address">Address</label>
              <input type="text" name="address" id="address" class="form-control" placeholder="Staff Address" required>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Staff</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  @endsection

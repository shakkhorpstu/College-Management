@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Subject</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Subjects</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Subjects</span>
        <button class="btn btn-success btn-sm float-right" data-toggle="modal" data-target="#addModal">Add Subject</button>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Name</th>
                <th>Class</th>
                <th>Department</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($subjects) > 0)
                @foreach($subjects as $subject)
                  <tr>
                    <td>{{ $subject->name }}</td>
                    <td>{{ $subject->class }}</td>
                    <td>{{ $subject->department->name }}</td>
                    <td>
                      <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#editModal{{ $subject->id }}" title="Edit Branch"><i class="fa fa-fw fa-edit"></i>Edit</button>
                      <!-- Add Modal -->
                      <div class="modal fade" id="editModal{{ $subject->id }}" tabindex="-1" role="dialog" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Edit Subject</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body">
                              <form action="{{ route('admin.subject.update', $subject->id) }}" method="post">
                                @csrf
                                <div class="form-group">
                                  <label for="name">Name</label>
                                  <input type="text" name="name" id="name" class="form-control" value="{{ $subject->name }}" required>
                                </div>

                                <div class="form-group">
                                  <label for="department_id">Department</label>
                                  <select class="form-control" id="department_id" name="department_id" required>
                                    @foreach ($departments as $department)
                                      <option value="{{ $department->id }}" {{ ($department->id == $subject->department_id) ? 'selected' : '' }}>{{ $department->name }}</option>
                                    @endforeach
                                  </select>
                                </div>

                                <div class="form-group">
                                  <label for="class">Class</label>
                                  <input type="number" name="class" id="class" class="form-control" placeholder="eg. 5" value="{{ $subject->class }}" required>
                                </div>

                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" class="btn btn-primary">Edit Subject</button>
                                </div>
                              </form>
                            </div>
                          </div>
                        </div>
                      </div>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $subject->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $subject->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Are you sure want to delete this subject ?</h5>
                              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                              </button>
                            </div>
                            <div class="modal-body">Please confirm if you want to delete</div>
                            <div class="modal-footer">
                              <button class="btn btn-outline-secondary btn-sm" type="button" data-dismiss="modal">Cancel</button>
                              <form class="" action="{{ route('admin.subject.delete', $subject->id) }}" method="post">
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
          <h5 class="modal-title">Add Subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('admin.subject.store') }}" method="post">
            @csrf
            <div class="form-group">
              <label for="name">Name</label>
              <input type="text" name="name" id="name" class="form-control" placeholder="Subject Name" required>
            </div>

            <div class="form-group">
              <label for="department_id">Department</label>
              <select class="form-control" id="department_id" name="department_id" required>
                <option value="">Select Department</option>
                @foreach ($departments as $department)
                  <option value="{{ $department->id }}">{{ $department->name }}</option>
                @endforeach
              </select>
            </div>

            <div class="form-group">
              <label for="class">Class</label>
              <input type="number" name="class" id="class" class="form-control" placeholder="eg. 5" required>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Add Subject</button>
            </div>
          </form>
        </div>
      </div>
    </div>

  @endsection

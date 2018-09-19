@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Teacher</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Teacher</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Teachers</span>
        <a class="btn btn-success btn-sm float-right" href="{{ route('admin.teacher.create') }}">Add Teacher</a>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <h4 class="mb-4 text-danger">All teachers default password 123456</h4>
            <thead>
              <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Subject</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Image</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($teachers) > 0)
                @foreach($teachers as $teacher)
                  <tr>
                    <td>{{ $teacher->name }}</td>
                    <td>{{ $teacher->department->name }}</td>
                    <td>{{ $teacher->subject->name }}</td>
                    <td>{{ $teacher->email }}</td>
                    <td>{{ $teacher->phone }}</td>
                    <td>{{ $teacher->address }}</td>
                    <td><a href="{{ asset('public/images/teachers/'.$teacher->image) }}" target="_blank"><img src="{{ asset('public/images/teachers/'.$teacher->image) }}" alt="" style="width: 50px; height: 50px;"></a></td>
                    <td>
                      <a href="{{ route('admin.teacher.edit', $teacher->id) }}" class="btn btn-primary btn-sm" title="Edit Teacher"><i class="fa fa-fw fa-edit"></i></a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $teacher->id }}" title="Delete Teacher"><i class="fa fa-fw fa-trash"></i></button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $teacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <form class="" action="{{ route('admin.teacher.delete', $teacher->id) }}" method="post">
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

  @endsection

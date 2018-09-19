@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Subject Teacher</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Teacher Subject</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fa fa-table"></i> <span class="ml-2">Teacher's Subject</span>
        <a class="btn btn-success btn-sm float-right" href="{{ route('admin.subjectTeacher.create') }}">Add Teacher's Subject</a>
      </div>

      <div class="card-body">
        @include('backend.partials.message')
        <div class="table-responsive">
          <table id="admin-data-table" class="table table-bordered table-hover display">
            <thead>
              <tr>
                <th>Subject</th>
                <th>Class</th>
                <th>Teacher</th>
                <th>File</th>
                <th>Manage</th>
              </tr>
            </thead>
            <tbody>
              @if(count($subjectTeachers) > 0)
                @foreach($subjectTeachers as $subjectTeacher)
                  <tr>
                    <td>{{ $subjectTeacher->subject->name }}</td>
                    <td>{{ $subjectTeacher->subject->class }}</td>
                    <td>{{ $subjectTeacher->teacher->name }}</td>
                    <td>
                      @if($subjectTeacher->file)
                        <a href="{{ asset('public/files/'.$subjectTeacher->file) }}" target="_blank">View File</a>
                      @else
                        {{ "No File Yet" }}
                      @endif
                    </td>
                    <td>
                      <a href="{{ route('admin.subjectTeacher.edit', $subjectTeacher->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-edit"></i>Edit</a>

                      <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{ $subjectTeacher->id }}" title="Delete Branch"><i class="fa fa-fw fa-trash"></i>Delete</button>
                      <!-- Delete Modal-->
                      <div class="modal fade" id="deleteModal{{ $subjectTeacher->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                              <form class="" action="{{ route('admin.subjectTeacher.delete', $subjectTeacher->id) }}" method="post">
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

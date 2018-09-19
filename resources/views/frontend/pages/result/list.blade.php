@extends('frontend.layouts.master')

@section('content')
    <div class="container mt-5 mb-5 p-5">
      <div class="row">
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <a href="{!! route('student.result.termList', ['11', '1']) !!}">Class - 11, Term - 1</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <a href="{!! route('student.result.termList', ['11', '2']) !!}">Class - 11, Term - 2</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <a href="{!! route('student.result.termList', ['11', '3']) !!}">Class - 11, Term - 3</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <a href="{!! route('student.result.termList', ['12', '1']) !!}">Class - 12, Term - 1</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card dashboard-card">
            <div class="card-body">
              <a href="{!! route('student.result.termList', ['12', '2']) !!}">Class - 12, Term - 2</a>
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection

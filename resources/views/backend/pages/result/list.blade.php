@extends('backend.layouts.master')

@section('content')

  <div class="row">
    <div class="col-xl-12">
      <div class="breadcrumb-holder">
        <h1 class="main-title float-left">Result</h1>
        <ol class="breadcrumb float-right">
          <li class="breadcrumb-item">Home</li>
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
          <li class="breadcrumb-item active">Result</li>
        </ol>
        <div class="clearfix"></div>
      </div>
    </div>
  </div>


  <div class="row">
    <a href="{{ route('admin.result.publish') }}" class="btn btn-success btn-sm mb-2 mt-2">Publish Result</a>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <a href="{!! route('admin.result.termList', ['11', '1']) !!}">Class - 11, Term - 1</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <a href="{!! route('admin.result.termList', ['11', '2']) !!}">Class - 11, Term - 2</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <a href="{!! route('admin.result.termList', ['11', '3']) !!}">Class - 11, Term - 3</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <a href="{!! route('admin.result.termList', ['12', '1']) !!}">Class - 12, Term - 1</a>
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card dashboard-card">
        <div class="card-body">
          <a href="{!! route('admin.result.termList', ['12', '2']) !!}">Class - 12, Term - 2</a>
        </div>
      </div>
    </div>
  </div>

  @endsection

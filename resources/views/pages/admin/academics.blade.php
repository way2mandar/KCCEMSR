@extends('layouts.master2')
@section('pre')
  @php
  $title = "Academics";
  $menu_item = 'academics';
@endphp
@endsection
@section('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap3-wysihtml5.min.css') }}">
@endsection
@section('content')
  <section class="content-header">
    <h1>
      Academics
      <small>Manage Academics</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route("admin_dashboard")}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a class="active"><i class="fa fa-dashboard"></i> Academics</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-10">
        @if ($action == "curriculum-plan")
          @include('forms.curriculum-plan')
        @endif
        @if ($action == "staff-notices")
          @include('forms.staff-notices')
        @endif
        @if ($action == "exam-results")
          @include('forms.exam-results')
        @endif
        @if ($action == "publications")
          @include('forms.publications')
        @endif
      </div>
      <div class="col-sm-2">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <ul class="nav nav-pills nav-stacked">
              <li class="{{$action=="curriculum-plan"?"active":""}}"><a href="{{route("admin_academics", "curriculum-plan")}}">Curriculum Plan</a></li>
              <li class="{{$action=="staff-notices"?"active":""}}"><a href="{{route("admin_academics", "staff-notices")}}">Staff Notices</a></li>
              <li class="{{$action=="exam-results"?"active":""}}"><a href="{{route("admin_academics", "exam-results")}}">Exam Results</a></li>
              <li class="{{$action=="publications"?"active":""}}"><a href="{{route("admin_academics", "publications")}}">Publications</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
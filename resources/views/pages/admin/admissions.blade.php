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
      Admissions
      <small>Manage Admissions</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="{{route("admin_dashboard")}}"><i class="fa fa-dashboard"></i> Dashboard</a></li>
      <li><a class="active"><i class="fa fa-dashboard"></i> Admissions</a></li>
    </ol>
  </section>
  <section class="content">
    <div class="row">
      <div class="col-xs-10">
        @include('forms.admissions', compact('action','action_name'))
      </div>
      <div class="col-sm-2">
        <div class="box box-primary">
          <div class="box-header">
            <h3 class="box-title"></h3>
          </div>
          <div class="box-body">
            <ul class="nav nav-pills nav-stacked">
              @for ($i=0; $i < count($admission_list); $i++)
                <li class="{{$action==$admission_list[$i]?'active':''}}"><a href="{{route("admin_admissions", $admission_list[$i])}}">{{$admission_name_list[$i]}}</a></li>
              @endfor
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

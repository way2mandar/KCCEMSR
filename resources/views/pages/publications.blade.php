@extends('layouts.master')
@section('pre')
	@php
	$title = "Publications / News Letter";
	$menu_item = 'about';
@endphp
@endsection
@section('content')
	<div class="container main-content">
		@php
		$publication = App\Publication::all();
		$total = count($publication);
		@endphp
		@for ($i=0; $i < $total; $i++)
			<div class="section clearfix object-non-visible" data-animation-effect="fadeIn">
				<div class="row">
					@if ($i/2 == 0)
						<div class="col-md-6">
							<img src="{{$publication[$i]->getUrl()}}"/>
						</div>
						<div class="col-md-6">
							<h2 class="title"><span>{{$publication[$i]->name}}</span></h2>
							{{$publication[$i]->description}}
						</div>
					@else
						<div class="col-md-6">
							<h2 class="title"><span>{{$publication[$i]->name}}</span></h2>
							{{$publication[$i]->description}}
						</div>
						<div class="col-md-6">
							<img src="{{$publication[$i]->getUrl()}}"/>
						</div>
					@endif
				</div>
			</div>
			<div class="space" style="margin-top:50px"></div>
		@endfor
	</div>
@endsection
@section('post')
@endsection

@extends('layouts.default')


@section('title')
{{ env('SITE_NAME')." - ".env('SITE_MOTTO') }}
@endsection


@section('body-class')landing-page @endsection

@section('content')

<!-- Main section -->
	<div id="main">
		
		
		@if (!Auth::guest())
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&v=3"></script>
		<div id="map-canvas">
			
		</div>
		<div class="bottom-bar cf" style="z-index: 9999;">
			<a class="btn red-btn start-btn" id="prayer_control" href="#">Start</a>
		</div>
		
		@else
		
		<div class="landing-logo">
			<img src="{{ asset('img/logo.png') }}" alt="City Pray" />
		</div>
			
		<div class="bottom-bar cf">
			<a class="btn gray-btn" href="{{ url('/auth/login') }}">Logare</a>
			<a class="btn red-btn" href="{{ url('/auth/register') }}">Inregistrare</a>
		</div>
		@endif
	</div>
	
@endsection

@section('scripts')
	@if (!Auth::guest())
		<script type="text/javascript" src="{{ asset('js/maps.api.js') }}"></script>		
	@endif
@endsection

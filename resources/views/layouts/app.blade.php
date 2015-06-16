<!DOCTYPE html>
<html lang="en">
<head>
    <title>{{ $title }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
	
    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500' rel='stylesheet' type='text/css'>
    
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/styles.css') }}" />
</head>
<body class="landing-page">
	<!-- Mobile menu -->
	<div class="mobile-menu-inner">
		<nav class="mobile-menu">
			<ul>
				<li class="active"><a href="{{ url('/') }}">Home</a></li>
				<li><a href="#">Global Map</a></li>
				<li><a href="#">Motive</a></li>
				<li><a href="#">Despre Noi</a></li>
				<li><a href="{{ url('/contact/') }}">Contact</a></li>
			</ul>
		</nav>
	</div>
	<!-- /Mobile menu -->
	
	<!-- Profile menu -->
	<div class="profile-menu-inner">
		<div class="profil-img">
			
		</div>
		<nav class="mobile-menu">
			<ul>
				<li><a href="#">My Profile,</a></li>
				<li><a href="#">Security</a></li>
				<li><a href="{{ url('/auth/logout/') }}">Log Out</a></li>
			</ul>
		</nav>
	</div>
	<!-- /Mobile menu -->
	
	<div class="main-inner @if(!Auth::guest()) turndark @endif">
		<!-- Header -->
		<header id="header">
			<a class="menu-btn" href="#">
				<span class="menu-line first-line"></span>
				<span class="menu-line last-line"></span>
			</a>
			
			<a class="profile-btn" href="#"></a>
		</header>
		<!-- /Header -->
		
		<!-- Main section -->
		<div id="main">
			
			
			@if (!Auth::guest())
			<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true&v=3"></script>
			<div id="map-canvas">
				
			</div>
			<script type="text/javascript" src="{{ asset('js/maps.api.js') }}"></script>
			
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
		
		<!-- Footer -->
		<footer id="footer">
		</footer>
		<!-- /Footer -->
	</div>
	
	<!-- Google CDN's jQuery -->
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	
	<!-- JS -->
    <script type="text/javascript" src="{{ asset('js/scripts.js') }}"></script>
</body>
</html>
{{ dd($username) }}

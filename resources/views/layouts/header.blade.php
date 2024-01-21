<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Fashion Fiesta">
	<link rel="icon" href="{{ asset('../assets/img/logo.png') }}" type="image/png">
	<title>Fashion Fiesta</title>

	<!-- Favicons-->
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
	<link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
	<link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

	<!-- GOOGLE WEB FONT -->
	<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800" rel="stylesheet">

	<!-- BASE CSS -->
	<link href="{{URL('cssMain/bootstrap.min.css')}}" rel="stylesheet">
	<link href="{{URL('cssMain/style.css')}}" rel="stylesheet">
	<link href="{{URL('cssMain/vendors.css')}}" rel="stylesheet">

	<!-- YOUR CUSTOM CSS -->
	<link href="{{URL('cssMain/custom.css')}}" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>

	<link rel="stylesheet" href="{{URL('font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

	<div id="page">

		<header class="header menu_fixed">
			<div id="preloader">
				<div data-loader="circle-side"></div>
			</div><!-- /Page Preload -->
			<div id="logo">
				<a href="{{URL('/')}}">
					<img src="{{URL('..\assets\img\logo.png')}}" width="90" data-retina="true" alt="" class="logo_normal">
					<img src="{{URL('..\assets\img\logo-black.png')}}" width="70" data-retina="true" alt="" class="logo_sticky">
				</a>
			</div>
			@if(auth()->user())
			@if(auth()->user()->role=='user')
			<ul id="top_menu">
				<li><a href="{{URL('/orders')}}" class="cart-menu-btn d-none d-sm-block" title="Orders"></a></li>
				<li><a href="{{URL('/wishlist')}}" class="wishlist_bt_top d-none d-sm-block" title="Wishlist"></a></li>
			</ul>
			@endif
			@endif
			<!-- /top_menu -->
			<a href="#menu" class="btn_mobile">
				<div class="hamburger hamburger--spin" id="hamburger">
					<div class="hamburger-box">
						<div class="hamburger-inner">
						</div>
					</div>
				</div>
			</a>
			<nav id="menu" class="main-menu">
				<ul>
					<li>
						<span><a href="{{URL('/')}}">Home</a></span>
					</li>
					<li>
						<span><a href="{{URL('/aboutus')}}">About Us</a></span>
					</li>
					<li>
						<span><a href="{{URL('/services')}}">Services</a></span>
					</li>
					@if(auth()->user())
					<li class="nav-item dropdown">
						<span><a class="nav-link" data-toggle="dropdown" href="#">
								{{ auth()->user()->name }}</a></span>
						<ul>
							<li><a href="#">
									{{ auth()->user()->email }}
								</a></li>
							<!-- Authentication -->
							<li>
								<form method="POST" action="{{ route('logout') }}">
									@csrf
									<a href="route('logout')" onclick="event.preventDefault();
											this.closest('form').submit();">
										{{ __('Logout') }}
									</a>
								</form>
							</li>
						</ul>
					</li>
					@else
					<li>
						<span><a href="#">Account</a></span>
						<ul>
							<li><a href="{{URL('/signin')}}">SignIn</a></li>
							<li><a href="{{URL('/signup')}}">SignUp</a></li>
						</ul>
					</li>
					@endif
					<li>
						<span><a href="{{URL('/contactus')}}">Contact Us</a></span>
					</li>

				</ul>
			</nav>
		</header>
		<!-- /header -->
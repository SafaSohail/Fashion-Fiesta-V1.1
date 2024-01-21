<!-- Header -->

<div class="header">
			
	<!-- Logo -->
	<div class="header-left">
		<a href="{{route('admin.dashboard')}}" class="logo">
			<img src="@if(!empty(AppSettings::get('logo'))) {{asset('storage/'.AppSettings::get('logo'))}} @else{{asset('assets/img/logo.png')}} @endif" alt="Logo">
		</a>
		<a href="{{route('admin.dashboard')}}" class="logo logo-small">
			<img src="{{asset('assets/img/logo-small.png')}}" alt="Logo" width="30" height="30">
		</a>
	</div>
	<!-- /Logo -->
	
	<a href="javascript:void(0);" id="toggle_btn">
		<i class="fe fe-text-align-left"></i>
	</a>
	
	
	
	<!-- Mobile Menu Toggle -->
	<a class="mobile_btn" id="mobile_btn">
		<i class="fa fa-bars"></i>
	</a>
	<!-- /Mobile Menu Toggle -->
	
	<!-- Header Right Menu -->
	<ul class="nav user-menu">

		
		<!-- User Menu -->
		<li class="nav-item dropdown has-arrow">
			<a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
				<span class="user-img"><img class="rounded" src="@if(!empty(auth()->user()->avatar)){{asset('storage/users/'.auth()->user()->avatar)}}@endif" width="31" alt="avatar"></span>
			</a>
			<div class="dropdown-menu">
				<div class="user-header">
					<div class="avatar avatar-sm">
						<img src="@if(!empty(auth()->user()->avatar)){{asset('storage/users/'.auth()->user()->avatar)}}@endif" alt="User Image" class="avatar-img rounded">
					</div>
					<div class="user-text">
						<h6>{{auth()->user()->name}}</h6>
					</div>
				</div>
				
				<a class="dropdown-item" href="{{route('admin.profile')}}">My Profile</a>
				<a class="dropdown-item" href="{{route('admin.logout')}}">Logout</a>
			</div>
		</li>
		<!-- /User Menu -->
		
	</ul>
	<!-- /Header Right Menu -->
	
</div>
<!-- /Header -->
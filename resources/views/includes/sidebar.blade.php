<!-- Sidebar -->
<div class="sidebar" id="sidebar">
	<div class="sidebar-inner slimscroll">
		<div id="sidebar-menu" class="sidebar-menu">
			
			<ul>
				<li class="menu-title"> 
					<span>Main</span>
				</li>
				<li class="{{ Request::routeIs('admin.dashboard') ? 'active' : '' }}"> 
					<a href="{{route('admin.dashboard')}}"><i class="fe fe-home"></i> <span>Dashboard</span></a>
				</li>
				
				@if(auth()->user()->role=='admin')
				<li class="{{ Request::routeIs('admin.tailors') ? 'active' : '' }}"> 
					<a href="{{route('admin.tailors')}}"><i class="fe fe-layout"></i> <span>Tailors</span></a>
				</li>
				<li class="{{ Request::routeIs('admin.users') ? 'active' : '' }}"> 
					<a href="{{route('admin.users')}}"><i class="fe fe-layout"></i> <span>Users</span></a>
				</li>
				<li class="{{ Request::routeIs('admin.orders') ? 'active' : '' }}"> 
					<a href="{{route('admin.orders')}}"><i class="fas fa-list"></i> <span>Orders</span></a>
				</li>
				<li class="{{ Request::routeIs('admin.profile') ? 'active' : '' }}"> 
					<a href="{{route('admin.profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				</li>
				@endif
				
				@if(auth()->user()->role=='tailor' && auth()->user()->status =='Approved')
				<li class="{{ Request::routeIs('admin.features') ? 'active' : '' }}"> 
					<a href="{{route('admin.features')}}"><i class="fe fe-layout"></i> <span>Features</span></a>
				</li>
				
				<li class="{{ Request::routeIs('admin.reviews') ? 'active' : '' }}"> 
					<a href="{{route('admin.reviews')}}"><i class="fe fe-layout"></i> <span>Reviews</span></a>
				</li>

				<li class="{{ Request::routeIs('admin.orders') ? 'active' : '' }}"> 
					<a href="{{route('admin.orders')}}"><i class="fas fa-list"></i> <span>Orders</span></a>
				</li>
				
				<li class="{{ Request::routeIs('admin.profile') ? 'active' : '' }}"> 
					<a href="{{route('admin.profile')}}"><i class="fe fe-user-plus"></i> <span>Profile</span></a>
				</li>
				@endif

			
			</ul>
		</div>
	</div>
</div>
<!-- /Sidebar -->